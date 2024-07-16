function VerifyForm(){
    if(document.getElementById("timeOff").value == ""){
        alert("Please enter a request date")
        return false;
    }
    if(document.getElementById("beginOn").value == ""){
        alert("Please enter a begining Date")
        return false;
    }
    if(document.getElementById("endOn").value == ""){
        alert("Please enter a ending Date")
        return false;
    }
    if(document.getElementById("leave").value == ""){
        alert("Please choose a reason for leave");
        return false;
    }
    

        return true;
}