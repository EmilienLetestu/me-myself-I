import {ValidateForm} from "./class/validateForm";

document.getElementById('edit_skill_name').addEventListener('keyup', function () {
    new ValidateForm('edit_skill_name', 2, 100).validateTextLength();
});
