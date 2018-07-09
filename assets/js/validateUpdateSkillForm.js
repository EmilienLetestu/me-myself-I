import {ValidateForm} from "./component/validateForm";
import {UpdateForms} from "./component/updateForms";

document.getElementById('edit_skill_name').addEventListener('keyup', function () {
    new ValidateForm('edit_skill_name', 2, 100).validateTextLength();
});

document.getElementById('edit_skill_level').addEventListener('keyup', function () {
    new ValidateForm('edit_skill_level', 10, 100).validateInteger();
});

new UpdateForms('current-data').fillWithOriginalData();
new UpdateForms('current-multi-check-data', `edit_project_techs_`).fillWithMultiCheck();