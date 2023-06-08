
    var researchObject = {
        "Software Engineering": ["Human Computer Interaction", "Web Engineering", "Software Maintenance & Evolution", "Software Testing", "Formal Method", "Software Quality Assurance"],
        "Computer System & Networking": ["Network Technologies", "Network Services Administration", "Distributed & Parallel Computing", "Network Analysis & Design", "Network Management", "Structured Networks Cabling"],
        "Graphics & Multimedia Technology": ["Fundamental of Digital Media Design", "Computer Graphics", "Computer Games Programming I", "Virtual Reality", "3D Modellimh & Animation", "Project Development Workshop"],
        "Cyber Security": ["Cyber Law & Security Policy", "Cyber Threat Intelligence", "Cybersecurity Operations", "Cybercrime & Forensics Computing", "Penetration Testing", "Cryptography"]
    }

    window.onload = function(){
        var researchArea = document.getElementById("researchArea");
        var categories = document.getElementById("categories");

        for(var x in researchObject){
            researchArea.options[researchArea.options.length] = new Option(x, x);
        }

        researchArea.onchange = function(){
            //empty categories- dropdown
            categories.length = 1;

            //display correct values
            var z = researchObject[this.value];

            for(var i=0; i<z.length; i++){
                categories.options[categories.options.length] = new Option(z[i], z[i]);
            }
        }
    }

  function checkOption() {
    var selectBox = document.getElementById("researchArea");

    if (selectBox.value === "option1") {
      selectBox.required = true;
    } else {
      selectBox.required = false;
    }
  }
  function checkOption1() {
    var selectBox = document.getElementById("categories");

    if (selectBox.value === "option1") {
      selectBox.required = true;
    } else {
      selectBox.required = false;
    }
  }

