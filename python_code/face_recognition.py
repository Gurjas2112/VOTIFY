import cv2
import numpy as np
import mysql.connector

# Load the pre-trained face detection model
face_cascade = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')

# Connect to the MySQL database
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="votify"
)

cursor = db.cursor()

# Query the database to fetch user documents
cursor.execute("SELECT user_id, document_data FROM user_documents WHERE verification_status IS NULL")
results = cursor.fetchall()

for user_id, document_data in results:
    # Decode the document data into an image
    image = cv2.imdecode(np.frombuffer(document_data, np.uint8), cv2.IMREAD_COLOR)
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

    # Detect faces in the image
    faces = face_cascade.detectMultiScale(gray, scaleFactor=1.1, minNeighbors=5, minSize=(30, 30))

    if len(faces) > 0:
        # Recognized as a known face
        verification_result = "Valid Document"
    else:
        # Unknown face
        verification_result = "Invalid Document"

    # Update the verification status in the database
    update_query = "UPDATE user_documents SET verification_status = %s WHERE user_id = %s"
    cursor.execute(update_query, (verification_result, user_id))
    db.commit()

# Close database connection
cursor.close()
db.close()
