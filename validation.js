function check() {
    var password = document.forms["account"]["password"].value;
    if (password.length <= 6) {
        document.getElementById("error").innerHTML = "Password must be at least 7 characters.";
        return false;
    }
}