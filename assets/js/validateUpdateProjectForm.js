import{UpdateForms} from "./class/updateForms";

import{ValidateForm} from "./class/validateForm";

document.getElementById('edit_project_name').addEventListener('keyup', function () {
    new ValidateForm('edit_project_name', 2, 100).validateTextLength();
});

document.getElementById('edit_project_pictRef').addEventListener('change', function () {
    new ValidateForm('edit_project_pictRef', null, null, ["png", "gif", "jpg", "jpeg"]).validateFile();
});

document.getElementById('edit_project_description').addEventListener('keyup', function () {
    new ValidateForm('edit_project_description', 10, 50).validateWordCount();
});

new UpdateForms('current-data').fillWithOriginalData();
new UpdateForms('current-multi-check-data', `edit_project_techs_`).fillWithMultiCheck();