import {ValidateForm} from "./component/validateForm";

document.getElementById('edit_skill_name').addEventListener('keyup', function () {
    new ValidateForm('edit_skill_name', 2, 100).validateTextLength();
});

document.getElementById('edit_skill_level').addEventListener('keyup', function () {
     new ValidateForm('edit_skill_level', 10, 100).validateInteger();
});