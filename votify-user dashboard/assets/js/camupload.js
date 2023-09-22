// JavaScript for handling photo upload
document.getElementById("upload-from-gallery").addEventListener("click", function () {
    // Trigger the hidden file input to select a photo from the gallery
    document.getElementById("gallery-upload").click();
});

document.getElementById("gallery-upload").addEventListener("change", function () {
    // Handle the selected file from the gallery
    const uploadedImage = document.getElementById("uploaded-image");
    uploadedImage.style.display = "block";
    uploadedImage.src = URL.createObjectURL(this.files[0]);
});

document.getElementById("take-photo").addEventListener("click", function () {
    // Use JavaScript to access the device's camera
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
            const uploadedImage = document.getElementById("uploaded-image");
            uploadedImage.style.display = "block";

            const video = document.createElement("video");
            document.body.appendChild(video);
            video.srcObject = stream;
            video.play();

            const canvas = document.createElement("canvas");
            const context = canvas.getContext("2d");

            // Capture a frame from the camera
            setTimeout(function () {
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                const photoURL = canvas.toDataURL("image/jpeg");

                // Display the captured photo
                uploadedImage.src = photoURL;

                // Stop the camera stream
                video.srcObject.getTracks().forEach(function (track) {
                    track.stop();
                });

                // Remove the temporary video element
                document.body.removeChild(video);
            }, 1000); // Adjust the delay as needed
        })
        .catch(function (error) {
            console.error("Camera access error:", error);
        });
});