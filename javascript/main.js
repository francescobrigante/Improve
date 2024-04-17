function showOrangeHome() {
    document.getElementById("home").style.display = "none";
    document.getElementById("orange_home").style.display = "inline-block";
}

function showOriginalHome() {
    document.getElementById("home").style.display = "inline-block";
    document.getElementById("orange_home").style.display = "none";
}

function showOrangeAccount() {
    document.getElementById("icon_account").style.display = "none";
    document.getElementById("orange_account").style.display = "inline-block";
}

function showDropdown() {
    document.getElementById("dropdown").style.display="block";
    document.getElementById("icon_account").style.display = "none";
    document.getElementById("orange_account").style.display = "inline-block";
}
