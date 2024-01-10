function showDetails(id){
    var classId = document.getElementById(id);
    if(id === "strength"){
        var showClass = document.getElementById("showStrength");
        showClass.style.display="block";
        document.getElementById("strength").style.display = "none";
        document.getElementById("lift").style.display = "none";
        document.getElementById("yoga").style.display = "none";
        document.getElementById("cardio").style.display = "none";
    }
    if(id === "lift"){
        var showClass = document.getElementById("showLift");
        showClass.style.display="block";
        document.getElementById("strength").style.display = "none";
        document.getElementById("lift").style.display = "none";
        document.getElementById("yoga").style.display = "none";
        document.getElementById("cardio").style.display = "none";
    }
    if(id === "yoga"){
        var showClass = document.getElementById("showYoga");
        showClass.style.display="block";
        document.getElementById("strength").style.display = "none";
        document.getElementById("lift").style.display = "none";
        document.getElementById("yoga").style.display = "none";
        document.getElementById("cardio").style.display = "none";
    }
    if(id === "cardio"){
        var showClass = document.getElementById("showCardio");
        showClass.style.display="block";
        document.getElementById("strength").style.display = "none";
        document.getElementById("lift").style.display = "none";
        document.getElementById("yoga").style.display = "none";
        document.getElementById("cardio").style.display = "none";
    }
}

function removeDetails(){
        document.getElementById("showStrength").style.display = "none";
        document.getElementById("showLift").style.display = "none";
        document.getElementById("showYoga").style.display = "none";
        document.getElementById("showCardio").style.display = "none";


        document.getElementById("strength").style.display = "block";
        document.getElementById("lift").style.display = "block";
        document.getElementById("yoga").style.display = "block";
        document.getElementById("cardio").style.display = "block";
}

function submitForm(id, id2, signedUp) {
    if (signedUp) {
        return false; // Prevent form submission if the user is already signed up
    }

    button1 = document.getElementById(id);
    button2 = document.getElementById(id2);
          // Disable the button and change its color
    button1.disabled = true;
    button2.disabled = true;

    button1.style.backgroundColor = "#808080"; // Grey color
    button2.style.backgroundColor = "#808080";

    button1.style.cursor = "none";
    button2.style.cursor = "none";

    return true; // Allow the form to be submitted
}


