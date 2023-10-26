import cv2
import json
import os
import shutil

# Function to verify a user's photo and store in the "uploads/photo/" directory
def verify_and_store_photo(user_id, photo_path):
    try:
        # Load the pre-trained face detection model (you might need to adjust the path)
        face_cascade = cv2.CascadeClassifier("external_package/haarcascade_frontalface_default.xml")

        # Load the user's photo
        photo = cv2.imread(photo_path)

        # Convert the photo to grayscale
        gray = cv2.cvtColor(photo, cv2.COLOR_BGR2GRAY)

        # Detect faces in the photo
        faces = face_cascade.detectMultiScale(gray, scaleFactor=1.1, minNeighbors=5)

        if len(faces) > 0:
            # Verification successful
            response = {
                "success": True,
                "message": "Photo verified successfully."
            }

            # Define the destination directory for storing verified photos
            destination_directory = f"uploads/photo/"

            # Create the user's directory if it doesn't exist
            if not os.path.exists(destination_directory):
                os.makedirs(destination_directory)

            # Move the verified photo to the user's directory
            verified_photo_path = os.path.join(destination_directory)
            shutil.move(photo_path, verified_photo_path)
        else:
            # Verification failed
            response = {
                "success": False,
                "message": "Photo verification failed. No face detected."
            }
    except Exception as e:
        # Handle any errors that may occur during the verification process
        response = {
            "success": False,
            "message": "Error during photo verification."
        }

    # Return the response as JSON
    return json.dumps(response)