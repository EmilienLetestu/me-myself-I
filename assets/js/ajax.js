
const red = "#ef5350";
const green = " #1de9b6";


function updateEntity(id) {

    let url      = document.getElementById(id).getAttribute('href');
    let xmlhttp  = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

        if(this.readyState === 4 ){

            if(this.status === 200){

                let checkId = id.split('-');
                checkId[0] === 'update' ?
                    updatePublicationIcon(id) :
                    updateTable(id)
                ;
            }
        }
    };

    xmlhttp.open("GET",url,true);
    xmlhttp.send();


}

function updatePublicationIcon(id) {
    let icon = document.getElementById(id).getElementsByTagName("i");
    let iconType = icon[0].innerText;

    iconType === 'close' ? icon[0].innerText = 'check' : icon[0].innerText = 'close';
    iconType === 'check' ? icon[0].style.color = red : icon[0].style.color = green;
}

function updateTable(id){

    let elemId = id.split('-');
    let rowId = 'row-' + elemId[1] + '-' + elemId[2];

    document.getElementById(rowId).remove();
}

let link = document.getElementsByClassName('crud-ajax');

for(let i = 0; i < link.length; i++){
    link[i].addEventListener('click', function () {
        let id = link[i].getAttribute('id');
        event.preventDefault();
        updateEntity(id);
    })
}


