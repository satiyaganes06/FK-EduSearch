

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
}

// Create the select element
var dropdown = document.createElement("select");

// Create and add options to the dropdown
for (var i = 0; i < categoriesData.length; i++) {
    var categoriesData = document.createElement("categoriesData");
    categoriesData.value = categoriesData[i];
    categoriesData.text = categoriesData[i];
    dropdown.appendChild(categoriesData);
  }

// Add the dropdown to the document body
document.getElementById("dropdownContainer").appendChild(dropdown);

