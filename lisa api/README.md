# Setup Lisa REST-API

## 1. Install Python

Download [Python](https://www.python.org/): version 3.9.5 

Window: 
```
$ pip -V                                  // view version
$ python -m pip install --upgrate pip     // update
```

Linux, Mac: 
```
$ sudo apt install python3-pip    // download      
$ sudo apt-get install pip        // update
```

## 2. Create environment

Linux, Mac: 
```
$ sudo pip install virtualenv
```

Window, Mac, Linux: 
```
virtualenv venv
```

## 3. Access environment

Window: 
```
.\venv\scripts\activate
```

Linux, Mac: 
```
source ./venv/bin/activate
```

## 4. Install packget

```
$ pip install Flask-RESTful
$ pip install Flask-JWT-Extended
$ pip install mysql-connector-python
$ pip install uwsgi
$ pip install python-dotenv 
$ pip install Werkzeug
$ pip install easyocr
$ pip install pythainlp
$ pip install scikit_image
$ pip install numpy
$ pip install pyrebase
$ pip install sib-api-v3-sdk
$ pip install pdf2image
``` 

## 6. setup file .env
 
* Setup [Firebase Storage](https://firebase.google.com/docs/storage/web/start) and copy firebaseConfig add in .env
```
apiKey = "<your-api-key>"
authDomain = "<your-auth-domain>"
databaseURL = "<your-database-url>"
projectId = "<your-project-id>"
storageBucket = "<your-storage-bucket-url>"
messagingSenderId = "<your-messaging-sender-id>"
appId = "<your-app-id>"
measurementId ="<your-measurement-id>"
```

* Setup [Database](https://www.windowssiam.com/install-xampp-apache-mysql/) and import db from /database
```
host = "localhost"
user = "root"
password=""
database="doc"
```

* Setup [Sendinblue](https://developers.sendinblue.com/docs/send-a-transactional-email) for send email
```
API_KEY = "YOUR_API_KEY"
```

## 7. run app

```
$ python api/app.py
```
