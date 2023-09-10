<!-- profile.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Social-hub</title>
    <link rel="stylesheet" href="user_details.css">
</head>
<body>
<header>
        <!-- Facebook Logo -->
        <div class="brand">
        <div class="hub">
  <span contenteditable="true">Social</span>
  <span contenteditable="true">hub</span>
</div>
</div>

        <!-- Search Bar -->

        <!-- Navigation Links (e.g., Home, Friends, Notifications, etc.) -->

        <!-- User Profile Picture and Name -->
        <div class="profile">
        <img src="https://img.icons8.com/3d-fluency/94/talk-male--v2.png" alt="talk-male--v2"/>
        </div>

        <!-- Create Post Button -->
        <div class="save">
        <button class="button-24" role="button"><span class="text">Saves</span></button>
        </div>
        <div class="chat">
            <a href="user_profile.php">
        <button class="button-24" role="button"><span class="text" >Home</span></button>
        </a>
        </div>
        <form action="logout.php" method="post">
        <div class="logout">
        <button class="button-24" role="button"><span class="text">Logout</span></button>
        </div>
        </form>
        <div class="hamburger"></div>
        <label for="check">
      <input type="checkbox" id="check"/> 
      <span></span>
      <span></span>
      <span></span>
    </label>
</div>
</header>
<div class="card-container">
<?php
    // Connect to your MySQL database
    require("database.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT id, fullName, gender, bio, profileImage FROM developers WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id, $fullName, $gender, $bio, $profileImage);

        if ($stmt->fetch()) {
            echo "<img class='round' src='" . $profileImage . "' alt='" . $fullName . "' width='100' height='100'>";
            echo "<h3>" . $fullName . "</h3>";
            echo "<h6>Gender: " . $gender . "</h6>";
            echo "<h6>Bio: " . $bio . "</h6>";
            echo "<p>ID:". $id ."</p>";
        } else {
            echo "User not found.";
        }

        $stmt->close();
    } else {
        echo "Invalid request.";
    }

    $conn->close();
?>

    <div class="button">
       <button class='unfollow-button' data-userid='" . $row["id"] . "'>Unfollow</button>
       <button class='follow-button' data-userid='" . $row["id"] . "'>Follow</button>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(".unfollow-button").click(function () {
    // Get the user ID from the data attribute
    var userId = $(this).data("userid");

    // Send an AJAX request to update the database
    $.ajax({
        type: "POST",
        url: "unfollow.php", // Create this PHP file to handle the request
        data: { userId: userId },
        success: function (response) {
            // Handle the response (e.g., show a success message)
            alert("You have unfollowed this user.");
        },
        error: function (xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        },
    });
});

</script>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".follow-button").click(function () {
                    // Get the user ID from the data attribute
                    var userId = $(this).data("userid");
        
                    // Send an AJAX request to update the database
                    $.ajax({
                        type: "POST",
                        url: "follow.php", // Create this PHP file to handle the request
                        data: { userId: userId },
                        success: function (response) {
                            // Handle the response (e.g., show a success message)
                            alert("You are now following this user.");
                        },
                        error: function (xhr, status, error) {
                            // Handle errors
                            console.error(xhr.responseText);
                        },
                    });
                });
            });
        </script>
    </div>
</div>

</body>
</html>

