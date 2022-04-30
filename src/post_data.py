import requests

url = 'https://c4c.mananraj.in/api/data.php'
myobj = {"name": "Manan"}

x = requests.post(url, json = myobj)

print(x.text)