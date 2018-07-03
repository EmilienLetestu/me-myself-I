window.onload = function () {

    let canvas  = document.getElementById('canvas');
    let context = canvas.getContext('2d');

    let width  = canvas.width;
    let height = canvas.height;

    //degrees to radians
    let degrees = 200;
    let radians = degrees*Math.PI/180;

    context.beginPath();
    context.strokeStyle = "green";
    context.arc(width/2, height/2, 100, 0, radians, false);
    context.lineWidth = 30;
    context.stroke();
}