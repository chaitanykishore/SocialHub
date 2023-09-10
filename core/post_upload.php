<?php
require_once('database.php'); // Include your database connection file

// Check if the form was submitted // Include your database connection file

// Check if the form was submitted
if (isset($_POST['submit'])) {
    $uploadTo = "uploads/";
    $allowedImageTypes = array('jpg', 'png', 'jpeg', 'gif');

    $error = $savedImageBasename = '';

    foreach ($_FILES['image_gallery']['tmp_name'] as $index => $imageTempName) {
        $imageBasename = basename($_FILES['image_gallery']['name'][$index]);
        $imagePath = $uploadTo . $imageBasename;
        $imageType = pathinfo($imagePath, PATHINFO_EXTENSION);

        if (in_array($imageType, $allowedImageTypes)) {
            if (move_uploaded_file($imageTempName, $imagePath)) {
                $username = $_SESSION['username']; // Retrieve the logged-in username
                $caption = $_POST['caption'][$index]; // Retrieve the caption for the current image

                // Insert image into the database
                $stmt = $conn->prepare("INSERT INTO post (username, image_name, caption) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $imageBasename, $caption);
                $stmt->execute();
                $stmt->close();

                // Get the last inserted ID
                $image_id = $conn->insert_id;

                // Update the image_id column
                $updateStmt = $conn->prepare("UPDATE post SET image_id = ? WHERE id = ?");
                $updateStmt->bind_param("ii", $image_id, $image_id);
                $updateStmt->execute();
                $updateStmt->close();
            } else {
                $error = 'File Not uploaded! Try again';
            }
        } else {
            $error .= $imageBasename . ' - file extensions not allowed<br>';
        }
    }

    if (empty($error)) {
        echo "Images uploaded successfully.";
    } else {
        echo "Error: " . $error;
    }
}

?>
