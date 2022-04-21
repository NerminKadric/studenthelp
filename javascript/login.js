window.onload = function() { 
    document.getElementById("login-form").onsubmit = function() { 
    return validateLoginForm();
    };
};
function validateLoginForm() {
    let inputs = document.getElementsByTagName("input");
    if(inputs.email.value === '') {
        document.getElementById('email-alert').style.display = 'block';
        return false;
    } else {
        document.getElementById('email-alert').style.display = 'none';
    }
    if(inputs.password.value === '') {
        document.getElementById('password-alert').style.display = 'block';
        return false;
    } else {
        document.getElementById('password-alert').style.display = 'none';
    }
}