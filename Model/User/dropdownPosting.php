<?php
$researchArea = $_GET["researchArea"];

$sql = "SELECT * FROM user_profile 
        INNER JOIN posting ON user_profile.user_id = posting.user_id
        WHERE posting_course='$researchArea' AND posting_categories='Network Technologies'";
$result = mysqli_query($conn, $sql) or die("Could not execute query in view");
?>

<script>
var valueResearch = "<?php echo $researchArea; ?>";
var categoriesData;

if (valueResearch === "Software Engineering") {
    categoriesData = ["Human Computer Interaction", "Web Engineering",
        "Software Maintenance & Evolution", "Software Testing", "Formal Method", "Software Quality Assurance"];
} else if (valueResearch === "Computer System & Networking") {
    categoriesData = ["Network Technologies", "Network Services Administration",
        "Distributed & Parallel Computing", "Network Analysis & Design", "Network Management",
        "Structured Networks Cabling"];
} else if (valueResearch === "Graphics & Multimedia Technology") {
    categoriesData = ["Fundamental of Digital Media Design", "Computer Graphics",
        "Computer Games Programming I", "Virtual Reality", "3D Modelling & Animation",
        "Project Development Workshop"];
} else if (valueResearch === "Cyber Security") {
    categoriesData = ["Cyber Law & Security Policy", "Cyber Threat Intelligence",
        "Cybersecurity Operations", "Cybercrime & Forensics Computing", "Penetration Testing", "Cryptography"];
} else {
    alert("Go to the dashboard and click the link");
    window.location = "../User/dashboard.php";
}

var x = document.getElementById("categoriesDropdown");

for (var i = 0; i < categoriesData.length; i++) {
    var option = document.createElement("option");
    option.text = categoriesData[i];
    x.add(option);
}

var dropdownCate = document.getElementById("categoriesDropdown").selectedIndex;
var nilai = document.getElementById("categoriesDropdown");
var selectedValue = nilai.value;

if (dropdownCate == 0) {
    document.getElementById("output").innerHTML = "rtyui";
} else if (dropdownCate == 1) {
    console.log("Executing else if condition");
    document.getElementById("output").innerHTML = "vbn";
}
</script>
