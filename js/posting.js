

if (valueResearch == "Software Engineering"){
    var categoriesData = ["Human Computer Interaction", "Web Engineering", 
    "Software Maintenance & Evolution", "Software Testing", "Formal Method", "Software Quality Assurance"]

}else if (valueResearch == "Computer System & Networking"){
    var categoriesData = ["Network Technologies", "Network Services Administration", 
    "Distributed & Parallel Computing", "Network Analysis & Design", "Network Management", 
    "Structured Networks Cabling"]

}else if (valueResearch == "Graphics & Multimedia Technology"){
    var categoriesData = ["Fundamental of Digital Media Design", "Computer Graphics", 
    "Computer Games Programming I", "Virtual Reality", "3D Modellimh & Animation", 
    "Project Development Workshop"]

}else if (valueResearch == "Cyber Security"){
    var categoriesData = ["Cyber Law & Security Policy", "Cyber Threat Intelligence", 
    "Cybersecurity Operations", "Cybercrime & Forensics Computing", "Penetration Testing", "Cryptography"]

}else{
    alert("Go to dashboard and click the link");
    window.location = "../User/dashboard.php";
}

var x = document.getElementById("categoriesDropdown");

for(var i=0; i<categoriesData.length; i++){
    var option = document.createElement("option");
    option.text = categoriesData[i];
    x.add(option);
}

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
