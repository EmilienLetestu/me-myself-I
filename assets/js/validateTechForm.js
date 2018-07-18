import {ValidateForm} from "./class/validateForm";

document.getElementById('edit_tech_name').addEventListener('keyup', function () {
    new ValidateForm('edit_tech_name', 2, 100).validateTextLength();
});