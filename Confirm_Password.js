function validate_password() {
    var pass = document.getElementById('password').value;
    var confirm_pass = document.getElementById('cnf_password').value;
    if (pass != confirm_pass) {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML
            = '☒ Use same password';
        document.getElementById('submit').disabled = true;
        document.getElementById('submit').style.opacity = (0.4);
    } else {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML =
            '🗹 Password Matched';
        document.getElementById('submit').disabled = false;
        document.getElementById('submit').style.opacity = (1);
    }
}

function wrong_pass_alert() {
    if (document.getElementById('password').value != "" &&
        document.getElementById('cnf_password').value != "") {
        alert("Your response is submitted");
    } else {
        alert("Please fill all the fields");
    }
}