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

function submitForm(id, signedUp) {
    if (signedUp) {
        return false; // Prevent form submission if the user is already signed up
    }

    return !(!signedUp && document.getElementById(id).disabled === 'false');

     // Allow the form to be submitted
}

function makeGrey(id){
    document.getElementById(id).style.color = "808080";
    document.getElementById(id).disabled = 'true';
}


