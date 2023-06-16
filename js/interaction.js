
/* Get the icon Like element
const iconLike = document.getElementById("iconLike");

// Add event listener to the icon
iconLike.addEventListener("click", function() {
  // Toggle the icon class or update the icon source
  if (iconLike.classList.contains("fa-regular")) {
    iconLike.classList.remove("fa-regular");
    iconLike.classList.add("fa-solid", "red");
  } else {
    iconLike.classList.remove("fa-solid", "red");
    iconLike.classList.add("fa-regular");
  }
});*/


// Get the icon element and textarea element
const iconComment = document.getElementById("iconComment");
const textarea = document.getElementById("textareaComment");

// Add event listener to the icon
iconComment.addEventListener("click", function() {
  // Toggle the visibility of the textarea
  if (textarea.style.display === "none") {
    textarea.style.display = "block";
  } else {
    textarea.style.display = "none";
  }
});

function like() {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        document.getElementById("likeCount").innerHTML = xhr.responseText;
      } else {
        console.error("Error: " + xhr.status);
      }
    }
  };
  xhr.open("GET", "../Model/User/interaction.php");
  xhr.send();
}

function view() {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        document.getElementById("viewCount").innerHTML = xhr.responseText;
      } else {
        console.error("Error: " + xhr.status);
      }
    }
  };
  xhr.open("GET", "../Model/User/interaction.php");
  xhr.send();
}
