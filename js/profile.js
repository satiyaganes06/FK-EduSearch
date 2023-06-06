
// Get the icon Like element
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
});

// Get the icon Like element
const iconRate = document.getElementById("iconRate");

// Add event listener to the icon
iconRate.addEventListener("click", function() {
  // Toggle the icon class or update the icon source
  if (iconRate.classList.contains("fa-regular")) {
    iconRate.classList.remove("fa-regular");
    iconRate.classList.add("fa-solid", "yellow");
  } else {
    iconRate.classList.remove("fa-solid", "yellow");
    iconRate.classList.add("fa-regular");
  }
});

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
