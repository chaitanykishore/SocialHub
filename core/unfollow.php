<?php
session_start(); // Start the session if it's not already started

if (isset($_SESSION["username"])) {
    // Get the logged-in user's username
    $loggedInUsername = $_SESSION["username"];

    // Get the user ID to unfollow from the AJAX request
    if (isset($_POST["userId"])) {
        $userIdToUnfollow = $_POST["userId"];

        // Update the database with the unfollow information
        require("database.php"); // Include your database connection code

        // Update the follower table
        $unfollowQuery = "DELETE FROM followers WHERE username='$loggedInUsername' AND friendname=(SELECT username FROM developers WHERE id = $userIdToUnfollow)";
        $conn->query($unfollowQuery);

        // Close the database connection
        $conn->close();

        // You can optionally return a response to the AJAX request (e.g., success message)
        echo "success";
    } else {
        // Handle missing userId parameter
        echo "error: Missing userId parameter";
    }
} else {
    // Handle not logged in
    echo "error: User not logged in";
}
?>
