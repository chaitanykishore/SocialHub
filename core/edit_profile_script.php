<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

require_once "database.php"; // Include your database connection file

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loggedInUsername = $_SESSION['username'];

    // Handle uploaded profile image
    if ($_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "profile_image/"; // Specify your upload directory
        $targetFile = $targetDir . basename($_FILES['profileImage']['name']);
        move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFile);

        // Update the profile image path in the developers table
        $query = "UPDATE developers SET profileImage = ?, fullName = ?, gender = ?, bio = ? WHERE username = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Error preparing the statement: " . $conn->error);
        }

        $stmt->bind_param("sssss", $targetFile, $fullName, $gender, $bio, $loggedInUsername);

        // Bind parameters and execute the statement
        $fullName = $_POST['fullName'];
        $gender = $_POST['gender'];
        $bio = $_POST['bio'];

        if (!$stmt->execute()) {
            die("Error executing the statement: " . $stmt->error);
        }

        $stmt->close();

        // Update the profile image path in the posts table
        $query = "UPDATE post SET profileimage = ? WHERE username = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Error preparing the statement: " . $conn->error);
        }

        $stmt->bind_param("ss", $targetFile, $loggedInUsername);

        // Bind parameters and execute the statement

        if (!$stmt->execute()) {
            die("Error executing the statement: " . $stmt->error);
        }

        $stmt->close();
    } else {
        // Update other profile information if no new image is uploaded
        $fullName = $_POST['fullName'];
        $gender = $_POST['gender'];
        $bio = $_POST['bio'];

        $query = "UPDATE developers SET fullName = ?, gender = ?, bio = ? WHERE username = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Error preparing the statement: " . $conn->error);
        }

        $stmt->bind_param("ssss", $fullName, $gender, $bio, $loggedInUsername);

        // Bind parameters and execute the statement

        if (!$stmt->execute()) {
            die("Error executing the statement: " . $stmt->error);
        }

        $stmt->close();
    }

    // Redirect back to the profile page or another desired location
    header("location: user_profile.php"); // Change "profile.php" to the appropriate page
    exit;
}

// Close the database connection
mysqli_close($conn);
?>
