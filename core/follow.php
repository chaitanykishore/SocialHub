<?php
session_start(); // Start the session if it's not already started

if (isset($_SESSION["username"])) {
    // Get the logged-in user's username
    $loggedInUsername = $_SESSION["username"];

    // Get the user ID to follow from the AJAX request
    if (isset($_POST["userId"])) {
        $userIdToFollow = $_POST["userId"];

        // Update the database with the follow information
        require("database.php"); // Include your database connection code

        // Check if the relationship already exists
        $checkQuery = "SELECT * FROM followers WHERE username='$loggedInUsername' AND friendname=(SELECT username FROM developers WHERE id = $userIdToFollow)";
        $result = $conn->query($checkQuery);

        if ($result->num_rows == 0) {
            // Relationship doesn't exist, proceed with insert
            $followQuery = "INSERT INTO followers (username, friendname) VALUES ('$loggedInUsername', (SELECT username FROM developers WHERE id = $userIdToFollow))";
            $conn->query($followQuery);

            // Close the database connection
            $conn->close();

            // You can optionally return a response to the AJAX request (e.g., success message)
            echo "success";
        } else {
            // Relationship already exists, you can optionally return a message to inform the user
            echo "error: You are already following this user";
        }
    } else {
        // Handle missing userId parameter
        echo "error: Missing userId parameter";
    }
} else {
    // Handle not logged in
    echo "error: User not logged in";
}

?>
