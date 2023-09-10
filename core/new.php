<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
require('post_fetch.php');
include('post_upload.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social-Hub</title>
    <link rel="stylesheet" href="new.css">
    <link rel="stylesheet" href="media.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<header>
        <!-- Facebook Logo -->
<div class="brand">
<div class="hub">
  <span contenteditable="true">Social</span>
  <span contenteditable="true">hub</span>
</div>
</div>
<div class="profile">
    <img src="https://img.icons8.com/3d-fluency/94/talk-male--v2.png" alt="talk-male--v2"/> <?php echo "Welcome ". $_SESSION['username']?>
</div>
<div class="save">
    <button class="button-24" role="button"><span class="text">Saves</span></button>
</div>
<div class="chat">
    <button class="button-24" role="button"><span class="text">Chat</span></button>
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
<body>
<div class="container">
<div class="other-content">
<div class="aside">
<div class="card-container">
    <?php
    require_once("database.php");
    
    $loggedInUsername = $_SESSION['username'];
    
    $query = "SELECT * FROM developers WHERE username = '$loggedInUsername'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<img class="round" src="' . $row['profileImage'] . '" width="100px" height="100px" alt="user" />';
            echo '<h3>' . $row['fullName'] . '</h3>';
            echo '<h6>ID: ' . $row['id'] . '</h6>';
            echo '<h6>Gender: ' . $row['gender'] . '</h6>';
            echo '<h6>Bio:' . $row['bio'] . '</h6>';
            echo '<div class="buttons">';
            echo'<button class="primary follow" role="button" onclick="showFollower()">Followers</button>';
       echo ' <button class="primary message" role="button" onclick="showFollowing()">Following</button>';
        echo'<div id="blanks-section" style="display: none;">';
          echo'  <button class="primary">Button 1</button>';
           echo' <button class="primary">Button 2</button>';
       echo' </div>';
       echo' <div id="blank-section" style="display: none;">';
        echo'    <button class="primary">Button 3</button>';
         echo'   <button class="primary">Button 4</button>';
        echo'</div>';
            echo '</div>';
            echo '<div class="skills">';
            echo '<form action="edit_profile.php" method="post">';
            echo '<button type="submit" class="primary">Update</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo "No records found.";
    }
    
    mysqli_close($conn);
    ?>
</div>
</div>
<div class="friend-list">
<h2>Friends</h2>
<input type="text" id="friendSearch" placeholder="Search friends...">
<ul class="friend-list-items">

<?php
    // Connect to your MySQL database
    require("database.php");

    // Fetch usernames and profile images from the 'developer' table with IDs >= 19
    $sql = "SELECT id, username, profileimage FROM developers WHERE id >= 19";
    $result = $conn->query($sql);
        // ... (Your existing PHP code)

        // Output each username and profile image as clickable links
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<div style='display: flex; align-items: center;'>";
            echo "<a href='user_details.php?id=" . $row["id"] . "'>";
            echo "<img src='" . $row["profileimage"] . "' alt='" . $row["username"] . "' width='50' height='50'>";
            echo $row["username"];
            echo "</a>";
            // Add "Follow" button with data-userid attribute
            echo "<button class='follow-button' data-userid='" . $row["id"] . "'>Follow</button>";
            echo "<button class='unfollow-button' data-userid='" . $row["id"] . "'>Unfollow</button>";

            echo "</div>";
            echo "</li>";
        }
        ?>
</ul>
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
<div class="create-post-box">
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image_gallery[]" class="image-upload" accept="image/*" placeholder="Choose an image">
        <textarea type="text" class="image-caption" name="caption[]" placeholder="Write a caption..."></textarea>
        <button type="submit" value="Upload Now" name="submit" class="button-5" role="button">Create Post</button>
</form>
</div>
<div class="column_narrowr">
<div class="post-box">
<div class="news-feed">
<?php
    if (!empty($fetchImage)) {
        $sn = 1;
        foreach ($fetchImage as $img) {
            // Fetch the profile image and username from the same row as the post image
            $postImage = $img['image_name'];
            $profileImage = $img['profileImage'];
             // Add this line for debugging

      
    ?>
    <div class="post" style="border: 1px solid #333; padding: 10px; margin: 10px;">
    <div class="post-header">
        <img src="<?php  echo $profileImage; ?>" class="profile-image" alt="Profile 1">
        <p class="username">@<?php echo $img['username']; ?></p>
    </div>
    <p class="caption">~<?php echo $img['caption']; ?></p>
    <!-- ... Rest of your HTML code ... -->
    <img src="uploads/<?php echo $postImage; ?>" style="width: 700px; height: 400px;" onclick="openModal(); currentSlide(<?php echo $sn; ?>)" class="post-image">

    <div class="post-actions">
                <button
    class="like-button"
    id="like-button-<?php echo $img['id']; ?>"
    data-count="<?php echo $img['likes']; ?>"
    onclick="toggleLike(<?php echo $img['id']; ?>)">
    <?php echo ($img['likes'] > 0) ? 'Liked (' . $img['likes'] . ')' : 'Like'; ?>
</button>
<script>
    function toggleLike(postId) {
        var likeButton = document.getElementById("like-button-" + postId);
        var likeCount = parseInt(likeButton.getAttribute("data-count"));
        var liked = likeButton.classList.contains("liked");

        if (liked) {
            // If already liked, remove the like
            unlikePost(postId, likeCount);
        } else {
            // If not liked, add the like
            likePost(postId, likeCount);
        }
    }

    function likePost(postId, likeCount) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "like.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var likeButton = document.getElementById("like-button-" + postId);
                likeButton.innerHTML = "Liked (" + (likeCount + 1) + ")";
                likeButton.classList.add("liked");
                likeButton.setAttribute("data-count", likeCount + 1);
            }
        };
        xhr.send("post_id=" + postId);
    }

    function unlikePost(postId, likeCount) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "unlike.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var likeButton = document.getElementById("like-button-" + postId);
                likeButton.innerHTML = "Like (" + (likeCount - 1) + ")";
                likeButton.classList.remove("liked");
                likeButton.setAttribute("data-count", likeCount - 1);
            }
        };
        xhr.send("post_id=" + postId);
    }
</script>
<button class="comment-toggle comment-button">Comment</button>

<div class="comments-container">
    <?php
    // Fetch and display comments associated with this post
    $post_id = $img['id'];
    $commentsSQL = "SELECT username, comment_text FROM comments WHERE post_id = ?";
    $stmt = $conn->prepare($commentsSQL);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<ul class='comment-list'>";
        while ($row = $result->fetch_assoc()) {
            echo "<li><strong>" . $row['username'] . ":</strong> " . $row['comment_text'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No comments yet.</p>";
    }

    $stmt->close();
    ?>
</div>
<form class="comment-form" action="comment.php" method="POST">
    <input type="hidden" name="post_id" value="<?php echo $img['id']; ?>">
    <input type="text" name="comment_text" placeholder="Add a comment">
    <button type="submit">Submit</button>
</form>

<script>
    // JavaScript to toggle the comment form visibility
    const commentForms = document.querySelectorAll(".comment-form");
    const commentToggles = document.querySelectorAll(".comment-toggle");

    commentToggles.forEach((toggle, index) => {
        toggle.addEventListener("click", () => {
            commentForms[index].style.display = (commentForms[index].style.display === "none" || commentForms[index].style.display === "") ? "block" : "none";
        });
    });
</script>
</div>
</div>
<?php
            $sn++;
        }
    } else {
        echo "No Images are saved in the database";
    }
    ?>
</div>
            </div>
        </div>
        </div>
        <script src="get_following.js"></script>
    <script src="get_follower.js"></script>
    
</body>
</html>