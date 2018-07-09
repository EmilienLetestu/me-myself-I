
const font = '35px Arial';
const supportCircleColor = "#eaeaea";
const highLevelColor = "#b9f6ca";
const mediumLevelColor = "#fff176";
const lowLevelColor =   "#ff8a80";

class Gauge {

    constructor(canvasList) {
        this.canvasList = document.getElementsByClassName(canvasList);

    }

    pickColor(level) {

        let color = null;

        switch (true) {
            case level <= 50:
                color = lowLevelColor;
                break;
            case level <= 70:
                color = mediumLevelColor;
                break;
            default:
                color = highLevelColor;
        }
        return color;
    }

     percentToDegrees(canvasId) {

        let idNumber = canvasId.split('_');
        let elem = document.getElementById('skill_' + idNumber[1]);
        let value = elem.value;
        let percent = parseInt(value) / 100;
        return 360 * percent;
    }

    drawGauge() {

        for (let i = 0; i < this.canvasList.length; i++) {
            let canvasId = this.canvasList[i].getAttribute('id');
            let degrees = this.percentToDegrees(canvasId);
            let canvas = document.getElementById(canvasId);
            let context = canvas.getContext('2d');
            let width = canvas.width;
            let height = canvas.height;
            let radians = degrees * Math.PI / 180;
            let text = (degrees / 360) * 100 + '%';
            let color = this.pickColor((degrees / 360) * 100);

            //draw circle
            context.beginPath();
            context.strokeStyle = supportCircleColor;
            context.arc(width / 2, height / 2, 80, 0, Math.PI * 2, false);
            context.lineWidth = 27;
            context.stroke();

            //draw arc section
            context.beginPath();
            context.strokeStyle = color;
            //deduct 90° from from the angles to start drawing from top end
            context.arc(width / 2, height / 2, 80, 0 - 90 * Math.PI / 180, radians - 90 * Math.PI / 180, false);
            context.shadowColor = '#444444';
            context.shadowBlur = 5;
            context.lineWidth = 30;
            context.stroke();


            //add text to gauge and adjust it
            context.font = font;
            let adjustText = context.measureText(text).width;
            context.fillStyle = color;
            context.fillText(text, width / 2 - adjustText / 2, height / 2 + 15);
        }
    }
}

export {Gauge}


