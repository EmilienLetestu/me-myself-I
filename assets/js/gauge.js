
let canvas  = document.getElementById('canvas');
let context = canvas.getContext('2d');
let width  = canvas.width;
let height = canvas.height;
let text = 80 + '%';




function percentToDegrees(value) {

    let percent = value/100;
    return 360*percent;
}

function initializeGauge(degrees) {

    let canvas  = document.getElementById('canvas');
    let context = canvas.getContext('2d');
    let radians = degrees*Math.PI/180;

    //draw full arc
    context.beginPath();
    context.strokeStyle = "#e2e2e2";
    context.arc(width/2, height/2, 100, 0, Math.PI*2, false);
    context.lineWidth = 30;
    context.stroke();

    //draw arc section
    context.beginPath();
    context.strokeStyle = "#90EE90";
    //deduct 90° from from the angles to start drawing from top end
    context.arc(width/2, height/2, 100, 0 - 90*Math.PI/180, radians - 90*Math.PI/180, false);
    context.lineWidth = 30;
    context.stroke();

    //add text to gauge and adjut it
    context.font = '45px Arial';
    let adjustText = context.measureText(text).width;
    context.fillText(text, width/2 - adjustText/2, height/2 +15);

}

    function draw(value) {

        let  degrees = percentToDegrees(value);
        alert(degrees);
        initializeGauge(degrees);
    }

  draw(80);
