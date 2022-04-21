window.onload = function() {
    let registerForm = document.getElementById("register-form");
    if(registerForm) {
        registerForm.onsubmit = function() {
            return validateForm();
        }
    }
};
function validateForm() {
    let inputs = document.getElementsByTagName("input");
    if(inputs.fname.value === '') {
        document.getElementById('fname-alert').style.display = 'block';
        return false;
    } else {
        document.getElementById('fname-alert').style.display = 'none';
    }
    if(inputs.lname.value === '') {
        document.getElementById('lname-alert').style.display = 'block';
        return false;
    } else {
        document.getElementById('lname-alert').style.display = 'none';
    }
    if(inputs.username.value === '') {
        document.getElementById('username-alert').style.display = 'block';
        return false;
    } else {
        document.getElementById('username-alert').style.display = 'none';
    }

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
    if(inputs.confirmpassword.value === '') {
        document.getElementById('confirm-password-alert').style.display = 'block';
        return false;
    } else {
        document.getElementById('confirm-password-alert').style.display = 'none';
    }
    if(inputs.confirmpassword.value !== inputs.password.value) {
        document.getElementById('confirm-password-no-match-alert').style.display = 'block';
        return false;
    } else {
        document.getElementById('confirm-password-no-match-alert').style.display = 'none';
    }

    let allValid = [];
    for (let i = 0; i < inputs.length; i++) {
        if(inputs[i].value !== '') {
            allValid.push(true);
        }
    }
    if(allValid.length === inputs.length) {
        return true;
    }
}