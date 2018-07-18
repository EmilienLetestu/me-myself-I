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
            if(this.readyState === 4){
                this.responseText === 'success' ? alert('succes') : alert('error')
            }
        };

        this.xmlhttp.open("GET",this.url,true);
        this.xmlhttp.send();

    }
}

export {Ajax}