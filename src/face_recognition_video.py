from __future__ import absolute_import
from __future__ import division
from __future__ import print_function

import os
import pickle
import time
import sys
import cv2
import numpy as np
import tensorflow as tf
import tensorflow.compat.v1 as tf
tf.disable_v2_behavior()
from scipy import misc
import requests
import facenet
from align import detect_face

input_video = 1
modeldir = r'E:\DBMS\src\facenet-weights\20180402-114759.pb'
classifier_filename = r'E:\\DBMS\src\facenet-weights\Hackathon-SVM-new.pkl'
npy=''
train_img=r'E:\\Hackathon_AI\dataset\aligned'

cv2_version = cv2.__version__
if(cv2_version == "2.4.9"):
	fourcc = cv2.cv.CV_FOURCC(*'XVID')
else:
	fourcc = cv2.VideoWriter_fourcc(*'XVID')

with tf.Graph().as_default():
	gpu_options = tf.GPUOptions(per_process_gpu_memory_fraction=0.0)
	sess = tf.Session(config=tf.ConfigProto(gpu_options=gpu_options, log_device_placement=False))
	# sess = tf.Session()
	with sess.as_default():
		pnet, rnet, onet = detect_face.create_mtcnn(sess, npy)

		minsize = 20  # minimum size of face
		threshold = [0.8, 0.8, 0.8]  # three steps's threshold
		factor = 0.709  # scale factor
		margin = 32
		frame_interval = 3
		batch_size = 1000
		image_size = 160
		input_image_size = 160

		ClassNames = os.listdir(train_img)
		ClassNames.sort()

		print('Loading Model')
		#facenet.load_model(modeldir)

		### added codes
		with tf.gfile.FastGFile(modeldir, 'rb') as f:
			graph_def = tf.GraphDef()
			graph_def.ParseFromString(f.read())
			_ = tf.import_graph_def(graph_def, name='')

		

		images_placeholder = tf.get_default_graph().get_tensor_by_name("input:0")
		embeddings = tf.get_default_graph().get_tensor_by_name("embeddings:0")
		phase_train_placeholder = tf.get_default_graph().get_tensor_by_name("phase_train:0")
		embedding_size = embeddings.get_shape()[1]


		classifier_filename_exp = os.path.expanduser(classifier_filename)
		with open(classifier_filename_exp, 'rb') as infile:
		    (model, class_names) = pickle.load(infile)#infile,encoding='iso-8859-1')

		video_capture = cv2.VideoCapture(1)
		#width = int(video_capture.get(cv2.CAP_PROP_FRAME_WIDTH))   # float
		#height = int(video_capture.get(cv2.CAP_PROP_FRAME_HEIGHT)) # float
		width = 940
		height = 680
		#fourcc = cv2.VideoWriter_fourcc(*'MP4V')
		out = cv2.VideoWriter(time.strftime("%b %d %Y %H:%M:%S")+".mp4",fourcc, 25.0, (width,height))
		c = 0		# 

		print('Start Recognition')
		ing = 0
		count = 1
		prevTime = 0
		while (True):			#True
			ret, frame = video_capture.read()
			ing+=1
			print(ing)
			if ret == False:
				break
			#frame = cv2.resize(frame, (0,0), fx=0.5, fy=0.5)    #resize frame (optional)

			curTime = time.time()+1    # calc fps
			timeF = frame_interval

			if (c % timeF == 0):
				find_results = []

				if frame.ndim == 2:
					frame = facenet.to_rgb(frame)
				frame = frame[:, :, 0:3]
				bounding_boxes, _ = detect_face.detect_face(frame, minsize, pnet, rnet, onet, threshold, factor)
				nrof_faces = bounding_boxes.shape[0]
				print('Detected_FaceNum: %d' % nrof_faces)

				if nrof_faces > 0:
					det = bounding_boxes[:, 0:4]
					img_size = np.asarray(frame.shape)[0:2]

					cropped = []
					scaled = []
					scaled_reshape = []
					bb = np.zeros((nrof_faces,4), dtype=np.int32)

					for i in range(nrof_faces):
						emb_array = np.zeros((1, embedding_size))

						bb[i][0] = det[i][0]
						bb[i][1] = det[i][1]
						bb[i][2] = det[i][2]
						bb[i][3] = det[i][3]

						# inner exception
						if bb[i][0] <= 0 or bb[i][1] <= 0 or bb[i][2] >= len(frame[0]) or bb[i][3] >= len(frame):
							print('Face is very close!')
							continue

						cropped.append(frame[bb[i][1]:bb[i][3], bb[i][0]:bb[i][2], :])
						cropped[i] = facenet.flip(cropped[i], False)
						# scaled.append(misc.imresize(cropped[i], (image_size, image_size), interp='bilinear'))
						scaled.append(cv2.resize(cropped[i],(image_size,image_size),interpolation=cv2.INTER_CUBIC))
						scaled[i] = cv2.resize(scaled[i], (input_image_size,input_image_size),
									           interpolation=cv2.INTER_CUBIC)
						scaled[i] = facenet.prewhiten(scaled[i])
						scaled_reshape.append(scaled[i].reshape(-1,input_image_size,input_image_size,3))
						feed_dict = {images_placeholder: scaled_reshape[i], phase_train_placeholder: False}
						emb_array[0, :] = sess.run(embeddings, feed_dict=feed_dict)
						predictions = model.predict_proba(emb_array)
						#print(predictions)
						best_class_indices = np.argmax(predictions, axis=1)
						best_class_probabilities = predictions[np.arange(len(best_class_indices)), best_class_indices]
						# print("predictions")
						print(ClassNames[best_class_indices[0]],' with accuracy ',best_class_probabilities)

						cv2.rectangle(frame, (bb[i][0], bb[i][1]), (bb[i][2], bb[i][3]), (0, 255, 0), 2)    #boxing face
						# print(best_class_probabilities)
						
						if best_class_probabilities> 0.50:		#0.43	
							#plot result idx under box
							text_x = bb[i][0]
							text_y = bb[i][3] + 20
							print('Result Indices: ', best_class_indices[0])
							#print(ClassNames)
							for H_i in ClassNames:
								if ClassNames[best_class_indices[0]] == H_i:
									result_names = ClassNames[best_class_indices[0]]
									cv2.putText(frame, result_names, (text_x, text_y), cv2.FONT_HERSHEY_COMPLEX_SMALL,
											2, (0, 0, 255), thickness=2, lineType=2)
									if count==1:		
										url = 'https://attendance.mananraj.in/api-new'
										myobj = {"name": result_names }	# "Manan"	result_names
										x = requests.post(url, json = myobj)
										#print(x.text)	
										device_api = x.json()
										# print(type(device_api))
										# print(device_api)										
										print('x value:',device_api['r'])
										if(device_api['r']==1):
											msg = "attendance recorded, DBMS LAB"
										elif(device_api['r']==2):
											msg = "No class now"
										else:
											msg = "Already Marked, DBMS LAB"
										print(msg)
										# out.write(frame)
										# cv2.imshow('Video', frame)
										# cv2.waitKey(5000)
										# if cv2.waitKey(25) & 0xFF == ord('q'):
										# 	break
										# i = False
										count = 0
									print("printing api response outside block:",msg)
									cv2.putText(frame, msg, (100,100),cv2.FONT_HERSHEY_COMPLEX_SMALL,
											2, (255, 0, 0), thickness=2, lineType=2)
						else:
							text_x = bb[i][0]
							text_y = bb[i][3] + 20
							result_names = 'Not registered user'
							cv2.putText(frame, result_names, (text_x, text_y), cv2.FONT_HERSHEY_COMPLEX_SMALL, 2, (0, 0, 255), thickness=2, lineType=2)                			 
				else:
					print('Alignment Failure')
			# c+=1
			#out.write(frame)
			cv2.imshow('Video', frame)
			if cv2.waitKey(25) & 0xFF == ord('q'):
			    break

		video_capture.release()
		out.release()
		cv2.destroyAllWindows()
