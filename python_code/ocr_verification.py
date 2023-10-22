import pytesseract
import cv2
import mysql.connector

# Path to Tesseract executable (change this to your Tesseract installation path)
pytesseract.pytesseract.tesseract_cmd = r'C:/Program Files/Tesseract-OCR/tesseract.exe'

def perform_ocr_and_validation(document_data):
    try:
        # Decode the document data into an image
        image = cv2.imdecode(document_data, cv2.IMREAD_COLOR)
        gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

        # Perform OCR
        text = pytesseract.image_to_string(gray)

        # Verification logic
        if "Aadhaar" in text:  # Customize this condition as needed
            return "Valid Aadhaar Card"
        else:
            return "Invalid Document"
    except Exception as e:
        return "Error: " + str(e)

try:
    # Connect to the MySQL database
    db = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="votify"
    )

    cursor = db.cursor()

    # Fetch the latest document data from the database
    cursor.execute("SELECT document_data FROM user_documents ORDER BY id DESC LIMIT 1")
    document_data = cursor.fetchone()[0]

    # Perform OCR and validation on the fetched document data
    verification_result = perform_ocr_and_validation(document_data)

    # Only print the result if it's a valid verification
    if verification_result == "Valid Aadhaar Card":
        print(verification_result)

    cursor.close()
    db.close()
except Exception as e:
    print("Error:", str(e))
