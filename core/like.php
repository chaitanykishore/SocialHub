<?php
require("database.php");
// Include your database connection code here

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["post_id"])) {
    $post_id = $_POST["post_id"];
    
    // Assuming you have a "posts" table with a "likes" column
    $updateSQL = "UPDATE post SET likes = likes + 1 WHERE id = ?";
    $stmt = $conn->prepare($updateSQL);
    $stmt->bind_param("i", $post_id);
    
    if ($stmt->execute()) {
        // Success
        echo "Liked";
    } else {
        // Error
        echo "Error liking the post";
    }
    
    $stmt->close();
}

?>
