import {Ajax} from "./class/ajax";

let link = document.getElementsByClassName('delete-entity');

console.log(link.length);

for(let i = 0; i < link.length; i++){
    link[i].addEventListener('click', function () {
        let id = link[i].getAttribute('id');
        new Ajax(event, id).deleteEntity();

    })
}

