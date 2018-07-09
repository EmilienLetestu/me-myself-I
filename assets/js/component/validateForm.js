class ValidateForm {

    constructor(
        id,
        min,
        max
    )
    {
        this.id          = id;
        this.min         = min;
        this.max         = max;
        this.replaceChar =  this.id.replace(/_/g, '-')
        this.feedbackId  =  this.replaceChar + '-feedback';
        this.errorId     =  this.replaceChar + '-error'

    }

    validateTextLength()
    {
        let input      = document.getElementById(this.id);
        let feedback   = document.getElementById(this.feedbackId);

        input.value.length < this.min || input.value.length > this.max ?
            feedback.innerHTML = 'close' : feedback.innerHTML = 'check'
        ;

        this.displayError(feedback, "Entre " + this.min + " et " + this.max + " caratères")

    }

    validateInteger()
    {
        let input      = document.getElementById(this.id);
        let feedback   = document.getElementById(this.feedbackId);

        input.value < this.min || input.value > this.max ?
            feedback.innerHTML = 'close' : feedback.innerHTML = 'check'
        ;

        this.displayError(feedback, "Entrez une valeur comprise entre " + this.min + " et " + this.max)
    }

    validateWordCount()
    {
        let input      = document.getElementById(this.id);
        let feedback   = document.getElementById(this.feedbackId);
        let trimmed    = input.value.trim();
        let text       = trimmed.split(' ').length;

        text  < this.min || text > this.max ?
            feedback.innerHTML = 'close' : feedback.innerHTML = 'check'
        ;

        this.displayError(feedback, "Entre " + this.min + " mots minimun et " + this.max + " mots maximum")
    }

    displayError(feedback, msg)
    {
        let elem = document.getElementById(this.errorId);
        elem.innerText = msg;

        feedback.innerHTML === 'close' ?
           elem.style.display = 'block' : elem.style.display = 'none'
        ;

    }
}

export {ValidateForm}

