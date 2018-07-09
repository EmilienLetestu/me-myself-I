/**
 * fill update forms text and checkbox inputs with current data
 * @param hiddenClass
 */
function fillWithOriginalData(hiddenClass) {

    let currentData = document.getElementsByClassName(hiddenClass);

    for(let i = 0; i < currentData.length; i++)
    {
        let hiddenValue = currentData[i].value;
        let input      = currentData[i].previousElementSibling;

        if(input.type === "checkbox"){

            input.checked = hiddenValue;
        }

        input.value = hiddenValue;
    }
}

/**
 * fill update forms multi-select with current data
 * @param hiddenClass
 * @param id
 */
function fillWithMultiCheck(hiddenClass ,id){

    let currentMulti = document.getElementsByClassName(hiddenClass);

    for(let i = 0; i < currentMulti.length; i++)
    {
        let hiddenValue = currentMulti[i].value;
        let checkBoxId  = id + hiddenValue;
        let checkBox    = document.getElementById(checkBoxId);
        checkBox.checked = true;
    }

}

fillWithOriginalData('current-data');
fillWithMultiCheck('current-multi-check-data', `edit_project_techs_`);

