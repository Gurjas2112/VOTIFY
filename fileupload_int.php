<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload</title>
    <style>
        .image-preview {
            max-width: 300px;
            max-height: 300px;
        }
    </style>
</head>
<body>
    <h1>Upload Documents</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <h2>Select Document Type:</h2>
        <select name="doc_type">
            <option value="aadhar_card">Aadhar Card</option>
            <option value="driving_license">Driving License</option>
            <option value="passport">Passport</option>
            <option value="electricity">Electricity Bill</option>
            <option value="rental">Rental Agreement</option>
            <option value="bank">Bank Passbook</option>
        </select>

        <h2>Enter Text and Upload Aadhar Card:</h2>
        <input type="text" name="aadhar_text" placeholder="Enter text...">
        <input type="file" name="aadhar_card" accept="image/*" required onchange="previewImage('aadhar_card', 'aadhar_preview')">
        <img id="aadhar_preview" class="image-preview" src="#" alt="Aadhar Card Preview">

        <h2>Select Document Type:</h2>
        <select name="doc_type">
            <option value="aadhar_card">Aadhar Card</option>
            <option value="driving_license">Driving License</option>
            <option value="passport">Passport</option>
            <option value="electricity">Electricity Bill</option>
            <option value="rental">Rental Agreement</option>
            <option value="bank">Bank Passbook</option>
        </select>
        
        <h2>Enter Text and Upload Driving License:</h2>
        <input type="text" name="driving_text" placeholder="Enter text...">
        <input type="file" name="driving_license" accept="image/*" required onchange="previewImage('driving_license', 'driving_preview')">
        <img id="driving_preview" class="image-preview" src="#" alt="Driving License Preview">

        <h2>Select Document Type:</h2>
        <select name="doc_type">
            <option value="aadhar_card">Aadhar Card</option>
            <option value="driving_license">Driving License</option>
            <option value="passport">Passport</option>
            <option value="electricity">Electricity Bill</option>
            <option value="rental">Rental Agreement</option>
            <option value="bank">Bank Passbook</option>
        </select>

        <h2>Enter Text and Upload Passport:</h2>
        <input type="text" name="passport_text" placeholder="Enter text...">
        <input type="file" name="passport" accept="image/*" required onchange="previewImage('passport', 'passport_preview')">
        <img id="passport_preview" class="image-preview" src="#" alt="Passport Preview">

        <h2>Select Document Type:</h2>
        <select name="doc_type">
            <option value="aadhar_card">Aadhar Card</option>
            <option value="driving_license">Driving License</option>
            <option value="passport">Passport</option>
            <option value="electricity">Electricity Bill</option>
            <option value="rental">Rental Agreement</option>
            <option value="bank">Bank Passbook</option>
        </select>

        <h2>Enter Text and Upload Electricity Bill:</h2>
        <input type="text" name="electricity_text" placeholder="Enter text...">
        <input type="file" name="electricity" accept="image/*" required onchange="previewImage('electricity', 'electricity_preview')">
        <img id="electricity_preview" class="image-preview" src="#" alt="Electricity Preview">

        <h2>Select Document Type:</h2>
        <select name="doc_type">
            <option value="aadhar_card">Aadhar Card</option>
            <option value="driving_license">Driving License</option>
            <option value="passport">Passport</option>
            <option value="electricity">Electricity Bill</option>
            <option value="rental">Rental Agreement</option>
            <option value="bank">Bank Passbook</option>
        </select>

        <h2>Enter Text and Upload Rental Agreement:</h2>
        <input type="text" name="rental_text" placeholder="Enter text...">
        <input type="file" name="rental" accept="image/*" required onchange="previewImage('rental', 'rental_preview')">
        <img id="rental_preview" class="image-preview" src="#" alt="Rental Preview">

        <h2>Select Document Type:</h2>
        <select name="doc_type">
            <option value="aadhar_card">Aadhar Card</option>
            <option value="driving_license">Driving License</option>
            <option value="passport">Passport</option>
            <option value="electricity">Electricity Bill</option>
            <option value="rental">Rental Agreement</option>
            <option value="bank">Bank Passbook</option>
        </select>

        <h2>Enter Text and Upload Bank Passbook:</h2>
        <input type="text" name="bank_text" placeholder="Enter text...">
        <input type="file" name="bank" accept="image/*" required onchange="previewImage('bank', 'bank_preview')">
        <img id="bank_preview" class="image-preview" src="#" alt="Bank Preview">


        <h2>Enter Text and Upload Your Photo:</h2>
        <input type="text" name="photo_text" placeholder="Enter text...">
        <input type="file" name="user_photo" accept="image/*" required onchange="previewImage('user_photo', 'photo_preview')">
        <img id="photo_preview" class="image-preview" src="#" alt="User Photo Preview">
        
        <h2>Enter Text and Upload Your Signature:</h2>
        <input type="text" name="signature_text" placeholder="Enter text...">
        <input type="file" name="user_signature" accept="image/*" required onchange="previewImage('user_signature', 'signature_preview')">
        <img id="signature_preview" class="image-preview" src="#" alt="User Signature Preview">

        <!-- Your button container -->
        <input type="submit" value="Upload">
    </form>

    <?php
    require 'db_user_dash.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $targetDir = "uploads/";

        // Create the "uploads" directory if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Get the selected document type from the dropdown
        $docType = $_POST['doc_type'];

        // Handle file upload
        $targetFile = $targetDir . basename($_FILES[$docType]["name"]);
        if (move_uploaded_file($_FILES[$docType]["tmp_name"], $targetFile)) {
            // Insert data into the database
            $sql = "INSERT INTO dashboard (doc_type, file_path) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $docType, $targetFile);
            if ($stmt->execute()) {
                echo "File uploaded successfully and data inserted into the database: " . $targetFile . "<br>";
            } else {
                echo "Error inserting data into the database for: " . $docType . "<br>";
            }
            $stmt->close();
        } else {
            echo "Error uploading file: " . $docType . "<br>";
        }

        // Handle user photo and signature
        $targetFilePhoto = $targetDir . basename($_FILES["user_photo"]["name"]);
        $targetFileSignature = $targetDir . basename($_FILES["user_signature"]["name"]);

        if (move_uploaded_file($_FILES["user_photo"]["tmp_name"], $targetFilePhoto) &&
            move_uploaded_file($_FILES["user_signature"]["tmp_name"], $targetFileSignature)) {
            echo "User photo and signature uploaded successfully.<br>";
        } else {
            echo "Error uploading user photo or signature.<br>";
        }
    }

    // Display images from the database
    $sql = "SELECT doc_type, file_path FROM dashboard";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row["doc_type"] . "</h2>";
            echo "<img src='" . $row["file_path"] . "' alt='" . $row["doc_type"] . "'>";
        }
    } else {
        echo "No documents found in the database.";
    }

    // Close the database connection
    $conn->close();
    ?>

    <script>
        // Function to preview the selected image
        function previewImage(inputName, previewName) {
            var input = document.querySelector(`input[name="${inputName}"]`);
            var preview = document.getElementById(previewName);
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "#";
            }
        }
    </script>
</body>
</html>
