import {UpdateForms} from "./class/updateForms";
import {ValidateForm} from "./class/validateForm";

new UpdateForms('current-data').fillWithOriginalData();

document.getElementById('edit_tech_name').addEventListener('keyup', function () {
    new ValidateForm('edit_tech_name', 2, 100).validateTextLength();
});