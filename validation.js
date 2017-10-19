function check() {
    var password1 = document.forms["account"]["password1"].value;
    var password2 = document.forms["account"]["password2"].value;
    if (password1.length <= 6) {
        document.getElementById("error").innerHTML = "Password must be at least 7 characters.";
        return false;
    }
    else if (password1 != password2){
        document.getElementById("error").innerHTML = "Passwords not matched.";
        return false;
    }
    
}

function isNumber(){
    var price = document.forms["add"]["price"].value;
    if (isNaN(price)){
        document.getElementById("error").innerHTML = "Price must be a number.";
        return false;
    }
}
