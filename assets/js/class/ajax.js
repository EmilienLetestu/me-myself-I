
const red = '#ef5350';
const green = '#00e676';

class Ajax {

    constructor(
        event,
        id
    ){
        this.event   = event;
        this.id      = id;
        this.url     = document.getElementById(this.id).getAttribute('href');
        this.xmlhttp = new XMLHttpRequest();
    }

    deleteEntity() {

        this.event.preventDefault();
        this.xmlhttp.onreadystatechange = function () {

            if(this.readyState === 4 ){

                alert(this.responseText);

            }
        };

        if(this.xmlhttp.responseText !== "Aucune correpondance trouvée"){

            let checkId = this.id.split('-');
            checkId[0] === 'update' ?
                this.updatePublicationIcon() :
                this.updateTable()
            ;
        }

        this.xmlhttp.open("GET",this.url,true);
        this.xmlhttp.send();


    }

    updatePublicationIcon() {
        let icon = document.getElementById(this.id).getElementsByTagName("i");
        let iconType = icon[0].innerText;

        iconType === 'close' ? icon[0].innerText = 'check' : icon[0].innerText = 'close';
        iconType === 'check' ? icon[0].style.color = red : icon[0].style.color = green;
    }

    updateTable(){

        let id = this.id.split('-');
        let rowId = 'row-'+id[1]+'-'+id[2];

        document.getElementById(rowId).remove();
    }


}

export {Ajax}