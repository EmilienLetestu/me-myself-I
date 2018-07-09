import {ValidateForm} from "./component/validateForm";

document.getElementById('contact_message').addEventListener('keyup', function () {
    new ValidateForm('contact_message', 10, 300).validateWordCount();
});

document.getElementById('contact_fullName').addEventListener('keyup', function () {
    new ValidateForm('contact_fullName', 5, 150).validateTextLength();
});

document.getElementById('contact_subject').addEventListener('keyup', function () {
    new ValidateForm('contact_subject', 3, 80).validateTextLength();
});