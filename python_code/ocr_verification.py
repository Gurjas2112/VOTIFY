import os
import pytesseract
from PIL import Image
import json
import re
import shutil

# Set the Tesseract executable path
pytesseract.pytesseract.tesseract_cmd = r'C:/Program Files/Tesseract-OCR/tesseract.exe'

# Function to verify Aadhar Card and store in the "uploads/aadhar_card/" directory
def verify_and_store_aadhar(user_id, aadhar_image_path):
    try:
        # Use pytesseract to extract text from the Aadhar card image
        aadhar_text = pytesseract.image_to_string(Image.open(aadhar_image_path))
        
        # Extract 12-digit Aadhar number using regular expression
        aadhar_number = re.search(r'\b\d{12}\b', aadhar_text)

        if aadhar_number:
            # Verification successful
            response = {
                "success": True,
                "message": "Aadhar Card verified successfully."
            }

            # Define the destination directory for storing verified documents
            destination_directory = f"uploads/aadhar_card/"

            # Create the user's directory if it doesn't exist
            if not os.path.exists(destination_directory):
                os.makedirs(destination_directory)

            # Move the verified Aadhar card image to the user's directory
            verified_aadhar_path = os.path.join(destination_directory, " ")
            shutil.move(aadhar_image_path, verified_aadhar_path)
        else:
            # Verification failed
            response = {
                "success": False,
                "message": "Aadhar Card verification failed. Please upload a valid Aadhar Card."
            }
    except Exception as e:
        # Handle any errors that may occur during the verification process
        response = {
            "success": False,
            "message": "Error during Aadhar Card verification."
        }
    
    # Return the response as JSON
    return json.dumps(response)
