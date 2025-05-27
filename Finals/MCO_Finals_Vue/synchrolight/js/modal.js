// When a post's "view" button is clicked, this code fills the modal with that post's details, turns hashtags into links, and shows or hides the image accordingly.
document.addEventListener('DOMContentLoaded', () => { 
    // Wait until the whole HTML page is loaded before running the code

    const postModal = document.getElementById('postModal'); 
    // Get the modal element by its ID to update its content later

    function linkifyHashtags(text) {
        // Find hashtags (#word) in the text and turn them into clickable links
        return text.replace(/#(\w+)/g, '<a href="hashtag.php?tag=$1" class="text-primary text-decoration-none">#$1</a>');
    }

    document.addEventListener('click', function (e) {
        // Listen for any click on the document

        const button = e.target.closest('[data-bs-toggle="modal"][data-bs-target="#postModal"]');
        // Check if the clicked element or its parent is a button that opens the post modal
        if (!button) return; // If not, do nothing and exit

        // Get data attributes from the clicked button (info about the post)
        const username = button.getAttribute('data-username');
        const content = button.getAttribute('data-content');
        const img = button.getAttribute('data-img');
        const time = button.getAttribute('data-time');

        // Find elements inside the modal where the post data will be displayed
        const modalUsername = postModal.querySelector('#modalUsername');
        const modalContent = postModal.querySelector('#modalContent');
        const modalImage = postModal.querySelector('#modalImage');
        const modalTime = postModal.querySelector('#modalTime');

        // Update the modal with the post information
        modalUsername.textContent = username; // show username
        modalContent.innerHTML = linkifyHashtags(content); // show content with clickable hashtags
        modalTime.textContent = time; // show post time

        if (img) {
            // If there is an image for the post, show it in the modal
            modalImage.src = 'php/' + img; // set the image source (path)
            modalImage.classList.remove('d-none'); // make sure image is visible
        } else {
            // If no image, hide the image element in the modal
            modalImage.classList.add('d-none');
        }
    });
});
