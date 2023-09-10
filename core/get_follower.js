var followingButtonClicked = false; // Initialize the state as not clicked

function showFollower() {
    var blankSection = document.getElementById("blanks-section");

    // Toggle the visibility of the blank section (show or hide it)
    if (blankSection.style.display === "block" && followingButtonClicked) {
        blankSection.style.display = "none";
        followingButtonClicked = false;
    } else {
        // Fetch the following list using AJAX
        $.ajax({
            type: "GET",
            url: "get_follower.php", // Create this PHP file to fetch the following list
            success: function (data) {
                // Update the content of the blank section with the fetched data
                blankSection.innerHTML = data;
                blankSection.style.display = "block"; // Show the blank section
                followingButtonClicked = true; // Mark the button as clicked once
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    }
}

