// JavaScript code to handle liking/unliking a post
const likeButtons = document.querySelectorAll('.like-button');
likeButtons.forEach(button => {
    button.addEventListener('click', function () {
        const postId = this.getAttribute('data-post-id');
        const liked = this.getAttribute('data-liked') === '1';

        // Send a POST request to like/unlike the post
        likePost(postId, liked);
    });
});

function likePost(postId, liked) {
    // Send a POST request to a PHP endpoint (like_post.php) to handle liking/unliking
    // Update the data-liked attribute and button text based on the response
    fetch('like_post.php', {
        method: 'POST',
        body: JSON.stringify({ postId: postId, liked: liked }),
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        // Update the data-liked attribute and button text
        likeButtons.forEach(button => {
            if (button.getAttribute('data-post-id') === postId) {
                button.setAttribute('data-liked', data.liked ? '1' : '0');
                button.textContent = data.liked ? 'Liked' : 'Like';
            }
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

