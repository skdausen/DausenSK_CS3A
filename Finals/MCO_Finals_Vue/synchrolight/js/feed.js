// HANDLES POST SUBMISSION, FETCHES POSTS IN REAL-TIME, AND MAKES HASHTAGS CLICKABLE

// SELECTING ELEMENTS FROM THE DOM
const form = document.querySelector(".typing-area"),
      textArea = form.querySelector(".textarea"),
      postBtn = form.querySelector(".post-button button"),
      postList = document.querySelector(".posts-list");

// PREVENT FORM FROM SUBMITTING NORMALLY (PAGE RELOAD)
form.addEventListener("submit", e => e.preventDefault());

// HANDLE CLICK ON POST BUTTON
postBtn.addEventListener("click", () => {
    if (textArea.value.trim() === "") return; // PREVENT EMPTY POSTS

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-post.php", true); // SEND POST DATA TO SERVER
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            textArea.value = ""; // CLEAR TEXTAREA AFTER SUCCESSFUL POST
            scrollToBottom();    // SCROLL TO NEW POST
        }
    };
    let formData = new FormData(form); // COLLECT FORM DATA TO SEND
    xhr.send(formData);
});

// CONVERT HASHTAGS TO CLICKABLE LINKS
function linkifyHashtags(text) {
    return text.replace(/#([\w-]+)/g, '<a href="hashtag.php?tag=$1" class="hashtag text-primary">#$1</a>');
}

// FETCH POSTS FROM SERVER EVERY 500ms
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/get-post.php", true); // GET NEW POSTS
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            postList.innerHTML = xhr.responseText; // UPDATE POST LIST
            if (!postList.classList.contains("active")) {
                scrollToBottom(); // AUTO SCROLL IF NOT MANUALLY SCROLLED
            }
        }
    };
    xhr.send();
}, 500);

// SCROLL TO BOTTOM OF POST LIST
function scrollToBottom() {
    postList.scrollTop = postList.scrollHeight;
}
