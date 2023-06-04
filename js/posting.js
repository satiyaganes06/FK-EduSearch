
// Get the container element where the dropdown will be added
var categoriesDropdown = document.getElementById("categoriesDropdown");

if (valueResearch == "Software Engineering"){
    const categoriesData = {"Human Computer Interaction": "", 
    "Web Engineering": "", "Software Maintenance & Evolution": "", 
    "Software Testing": "", "Formal Method": "", "Software Quality Assurance": ""}

}else if (valueResearch == "Computer System & Networking"){
    const categoriesData = {"Network Technologies": "", 
    "Network Services Administration": "", "Distributed & Parallel Computing": "", 
    "Network Analysis & Design": "", "Network Management": "", 
    "Structured Networks Cabling": ""}

}else if (valueResearch == "Graphics & Multimedia Technology"){
    const categoriesData = {"Fundamental of Digital Media Design": "", 
    "Computer Graphics": "", "Computer Games Programming I": "", 
    "Virtual Reality": "", "3D Modellimh & Animation": "", 
    "Project Development Workshop": ""}

}else if (valueResearch == "Cyber Security"){
    const categoriesData = {"Cyber Law & Security Policy": "", 
    "Cyber Threat Intelligence": "", "Cybersecurity Operations": "", 
    "Cybercrime & Forensics Computing": "", "Penetration Testing": "", "Cryptography": ""}
}else{
    alert("Go to dashboard and click the link");
}

