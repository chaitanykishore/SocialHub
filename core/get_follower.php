<?php
// Include your database connection code
require("database.php");
session_start();

// Get the logged-in user's username (modify this based on your session handling)
// Get the logged-in user's username from the session data
if (isset($_SESSION["username"])) {
    $loggedInUsername = $_SESSION["username"];

    // Query to fetch the friendname for the logged-in user's followers
    $sql = "SELECT username FROM followers WHERE friendname = '$loggedInUsername'";
    $result = $conn->query($sql);

    if (!$result) {
        // Handle MySQL errors
        die("MySQL Error: " . mysqli_error($conn));
    }

    if ($result->num_rows > 0) {
        // Create a string to hold the list of friendnames
        $followingList = "<h3>Friends:</h3><ul>";

        while ($row = $result->fetch_assoc()) {
            $followingList .= "<li>" . $row["username"] . "</li>";
        }

        $followingList .= "</ul>";

        // Return the following list as the response
        echo $followingList;
    } else {
        echo "<p>You are not following anyone.</p>";
    }
} else {
    echo "<p>User is not logged in.</p>";
}

// Close the database connection
$conn->close();
?>