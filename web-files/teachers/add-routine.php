<?php
session_start();
error_reporting(0);
include ('../includes/config.php');
if($_SESSION['id']=='')
{
    echo "<script>window.location.href='index.php'</script>";
}

if(isset($_POST['delete_routine']))
{
    $rid=$_POST['id'];
    $sql="DELETE FROM routine WHERE id=$rid";
    mysqli_query($conn,$sql);
}

if(isset($_POST['submit']))
{
    $subj_id=$_POST['s_id'];
    $day=$_POST['day'];
    $s_time=$_POST['s_time'];
    $e_time=$_POST['e_time'];
    $tid=$_SESSION['id'];
    
    $sql = "SELECT * FROM teach_subj WHERE id='$subj_id'";
    $row= mysqli_fetch_assoc(mysqli_query($conn,$sql));
    
    $sem= $row['sem'];
    $branch= $row['branch'];
    $subject = $row['subject'];
    
    $sql="INSERT INTO routine(`subj_id`,`subject_name`,`sem`,`day`,`branch`,`time`,`end_time`,`tid`) VALUES ('$subj_id','$subject','$sem','$day','$branch','$s_time','$e_time','$tid')";
    $row=mysqli_query($conn,$sql);
    if($row)
    {
        echo "<script>alert('Routine Added!');</script>";
        echo "<script type='text/javascript'> document.location ='add-routine.php'; </script>";
    }
    else
    {
        echo "<script>alert('Something went wrong!');</script>";
    }
   
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="SmartCrc">
	<link rel="icon" href="assets/img/favicon.png">

	<title>Easy Attendance | Add Subject </title>

	<!-- PICK ONE OF THE STYLES BELOW -->
	<link href="assets/css/modern.css" rel="stylesheet"> 
	 <link href="assets/css/modal.css" rel="stylesheet">
	
	<script src="assets/js/settings.js"></script>
</head>

<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<div class="wrapper">
	    <?php include 'includes/sidebar.php'; ?>
		<div class="main">
			<?php include 'includes/navbar.php'; ?>
			<main class="content">
				<div class="container-fluid">
				    
				    
                    <!-- Modal FORM FROM TOP -->
                    <!-- MODAL FORM OVER !-->
					<div class="header">
						<h1 class="header-title">
							Add Routine 
						</h1>
						
					</div>
					<div class="row">
					    <div class="col-md-3 col-xl-2">

							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Toggle</h5>
								</div>

								<div class="list-group list-group-flush" role="tablist">
									<a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#tab_addR" role="tab">
									Add Routine
									</a>
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#tab_delR" role="tab">
									Delete Routine
									</a>
									
								</div>
							</div>
						</div>

						<div class="col-md-9 col-xl-10">
							<div class="tab-content">
								<div class="tab-pane fade show active" id="tab_addR" role="tabpanel">

								

									<div class="card">
										<div class="card-header">
											
											<h5 class="card-title mb-0">Add your Subjects to routine</h5>
										</div>
										<div class="card-body">
									<form method="post">
									        
									        
									        
    										<div class="mb-3">
    										    <label>Select Subject Name</label>
    										      <?php
    										      include ('../includes/config.php');
    										      $id=$_SESSION['id'];
    										      $sql="SELECT * FROM teach_subj WHERE tid='$id'";
    										      $insert=mysqli_query($conn,$sql);
    										     
                                                  ?>
    										       <select class="form-control" name="s_id">
    										    <?php  while($row=mysqli_fetch_assoc($insert))
    										      {?>
    										            
                                                         <option value="<?php echo $row['id'];?>"><?php echo $row['subject'] ?> (<?php echo 'SEM : '.$row['sem'];?>)(<?php echo 'BRANCH : '.$row['branch'];?>)</option>
                                                           
                                                             <?php
                                                           
    										      }
    										      ?>
    										        </select>
			    							</div>
									        <div class="mb-3">
									            <label>Select DAY</label>
    										    <select class="form-control" name="day">
    										        <option value="1">MONDAY</option>
    										        <option value="2">TUESDAY</option>
    										        <option value="3">WEDNESDAY</option>
    										        <option value="4">THURSDAY</option>
    										        <option value="5">FRIDAY</option>
    										        <option value="6">SATURDAY</option>
    										        
    										        
                                                </select>
			    							</div>
			    							
			    						
				    						<div class="mb-3">
				    						    <label for="inputUsername">Starting time</label>
						    					<input type="text" name="s_time" class="form-control" placeholder="Enter Starting time">
							    			</div>
									        
									        <div class="mb-3">
				    						    <label for="inputUsername">Ending time</label>
						    					<input type="text" name="e_time" class="form-control" placeholder="Enter Ending time">
							    			</div>
							    			
											<div class="text-center mt-3">
											    <button type="submit" class="btn btn-lg btn-primary" name="submit">Add Routine</button>
										    </div>
										
			    						
										
									
									</form>

										</div>
									</div>

								</div>
								<div class="tab-pane fade" id="tab_delR" role="tabpanel">
							        <div class="card">
							        	<div class="card-body">
							        	    <div style="overflow-x:auto;">
							        		<table id="datatables-basic" class="table table-striped" style="width:100%">
							        			<thead>
							        				<tr>
							        					<th>S. No.</th>
							        					<th>Subject Name</th>
							        					<th>Branch</th>
							        					<th>Semester</th>
							        					<th>Day</th>
							        					<th>Starting Time</th>
							        					<th>End Time</th>
							        					<th>Action</th>
							        				</tr>
							        			</thead>
							        			<tbody>
							        			<?php include '../includes/config.php';?>
							        			<?php
							        			$tid=$_SESSION['id'];
	                                            $sql = "SELECT * FROM routine WHERE tid='$tid';";
                                                $result = mysqli_query($conn,$sql);
                                                $resultCheck = mysqli_num_rows($result);   
                                                $i=0;
                                                if($resultCheck > 0) 
                                                {
                                                    while($row = mysqli_fetch_assoc($result)) 
                                                    {
                                                    ?>
							        			
							        				<tr>
							        					<td><?php echo ++$i;?></td>
							        					<td><?php echo $row['subject_name'];?> </td>
							        					<td><?php echo $row['branch'];?></td>
							        					<td><?php echo $row['sem'];?></td>
							        					<td><?php echo $row['day'];?></td>
							        					<td><?php echo $row['time'];?></td>
							        					<td><?php echo $row['end_time'];?></td>
							        					<td>
							        					    <form method='post' onsubmit="return confirm('Are you sure you want to delete this subject? All the related routine and subject will be permanently deleted!');">
                                                                <input type="hidden" name="id" value="<?php echo $row['id'];?> ">
                                                                <button type="submit" name="delete_routine" class="btn btn-primary" style="margin-top:4px;">Delete Routine</button></form>
                                                        </td>
                 		        
							        				</tr>
							        				
							        			
							        			<?php }} ?>
							        			</tbody>
							        		</table>
							        		</div>
							        	</div>
							        </div>
								</div>
								
								
							</div>
						</div>
					</div>
				</div>
			</main>
			<?php include 'includes/footer.php';?>
		</div>

	</div>

	<svg width="0" height="0" style="position:absolute">
		<defs>
			<symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
				<path
					d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
				</path>
			</symbol>
		</defs>
	</svg>
	<script src="assets/js/app.js"></script>
	<script src="assets/js/modal.js"></script>
	    

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables basic
			$('#datatables-basic').DataTable();
			// Datatables with Buttons
			var datatablesButtons = $('#datatables-buttons').DataTable({
				lengthChange: !1,
				buttons: ["copy", "print"],
				responsive: true
			});
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
		});
		
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables basic
			$('#datatables-basic-1').DataTable();
			// Datatables with Buttons
			var datatablesButtons = $('#datatables-buttons').DataTable({
				lengthChange: !1,
				buttons: ["copy", "print"],
				responsive: true
			});
			datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
		});
	</script>
</body>

</html>
