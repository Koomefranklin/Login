function check_passwords () {
    const password = document.getElementById("password");
    const confirmed = document.getElementById("password2");
    const submitButton = document.getElementById("register");
    const unmatched = document.getElementById("matching-password");
    const pattern = document.getElementById("password-pattern");
    const upperRegex = /[A-Z]/;
    const lowerRegex = /[a-z]/;
    const specialRegex = /[^\w\s]/;
    const numberRegex = /\d/;
    const lengthRegex = /^.{8,}$/;


    password.addEventListener("input", function () {
        document.getElementById("upper").checked = upperRegex.test(password.value);
        document.getElementById("lower").checked = lowerRegex.test(password.value);
        document.getElementById("special-character").checked = specialRegex.test(password.value);
        document.getElementById("number").checked = numberRegex.test(password.value);
        document.getElementById("length").checked = lengthRegex.test(password.value);
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        let allChecked = true;
        checkboxes.forEach(function(checkbox) {
            if (!checkbox.checked) {
                allChecked = false;
            }
        });
        confirmed.disabled = pattern.hidden = !allChecked;
    });


    //listen to changes in the inputs
    password.addEventListener('input', checkValues);
    confirmed.addEventListener('input', checkValues);

    function checkValues() {
        pattern.hidden = false;
        const primaryValue = password.value;
        const secondaryValue = confirmed.value;
        if (primaryValue === secondaryValue){
            confirmed.style.borderColor = 'green';
            unmatched.hidden = true;
            submitButton.disabled = false;
        } else {
            confirmed.style.borderColor = 'red';
            unmatched.hidden = false;
            submitButton.disabled = true;
        }
    }
}