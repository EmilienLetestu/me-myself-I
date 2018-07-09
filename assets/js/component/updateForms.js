class UpdateForms {

    constructor(hiddenClass, id = null){
        this.hiddenClass =  hiddenClass;
        this.id = id;
    }

    fillWithOriginalData(){
        let currentData = document.getElementsByClassName(this.hiddenClass);

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

    fillWithMultiCheck(){

        let currentMulti = document.getElementsByClassName(this.hiddenClass);

        for(let i = 0; i < currentMulti.length; i++)
        {
            let hiddenValue = currentMulti[i].value;
            let checkBoxId  = this.id + hiddenValue;
            let checkBox    = document.getElementById(checkBoxId);
            checkBox.checked = true;
        }
    }
}

export {UpdateForms}