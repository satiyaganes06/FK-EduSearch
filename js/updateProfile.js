function myFunction(){
    var dropdownRA = document.getElementById("researchArea").selectedIndex;
    var checkbox = document.getElementById("checkbox");
    var checkboxBCS = document.getElementById("BCS");
    var checkboxBCN = document.getElementById("BCN");
    var checkboxBCG = document.getElementById("BCG");
    var checkboxBCY = document.getElementById("BCY");

    if (dropdownRA == 1){
        checkbox.style.display = 'block';
        checkboxBCS.style.display = 'block';
        checkboxBCN.style.display = 'none';
        checkboxBCG.style.display = 'none';
        checkboxBCY.style.display = 'none';
    }else if (dropdownRA == 2){
        checkbox.style.display = 'block';
        checkboxBCS.style.display = 'none';
        checkboxBCN.style.display = 'block';
        checkboxBCG.style.display = 'none';
        checkboxBCY.style.display = 'none';
    }else if (dropdownRA == 3){
        checkbox.style.display = 'block';
        checkboxBCS.style.display = 'none';
        checkboxBCN.style.display = 'none';
        checkboxBCG.style.display = 'block';
        checkboxBCY.style.display = 'none';
    }else if (dropdownRA == 4){
        checkbox.style.display = 'block';
        checkboxBCS.style.display = 'none';
        checkboxBCN.style.display = 'none';
        checkboxBCG.style.display = 'none';
        checkboxBCY.style.display = 'block';
    }else{
        checkbox.style.display = 'none';
        checkboxBCS.style.display = 'none';
        checkboxBCN.style.display = 'none';
        checkboxBCG.style.display = 'none';
        checkboxBCY.style.display = 'none';
    }
    
}

myFunction();