<?php
session_start();
require("database.php");

if (isset($_POST['post_id'], $_POST['comment_text'])) {
    // Your comment handling code here...
// Insert the comment into the database
    $post_id = $_POST['post_id'];
    $comment_text = $_POST['comment_text'];
    $username = $_SESSION['username']; // Assuming you have a user session

    // Check if $post_id is valid (not empty)
    if (empty($post_id)) {
        die("Invalid post_id. It cannot be empty.");
    }

    // Insert the comment into the database
    $insertCommentSQL = "INSERT INTO comments (post_id, username, comment_text) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertCommentSQL);

    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("iss", $post_id, $username, $comment_text);

    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }
     // Redirect to user_profile.php
     header("Location: user_profile.php");
     exit();

    
}

?>
