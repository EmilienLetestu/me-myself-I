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
        this.replaceChar = this.id.replace(/_/g, '-');
        this.feedbackId  = this.replaceChar + '-feedback';
        this.errorId     = this.replaceChar + '-error';
        this.input       = document.getElementById(this.id);
        this.feedback    = document.getElementById(this.feedbackId);

    }

    validateTextLength()
    {

        this.input.value.length < this.min || this.input.value.length > this.max ?
            this.feedback.innerHTML = 'close' : this.feedback.innerHTML = 'check'
        ;

        this.displayError("Entre " + this.min + " et " + this.max + " caratères")

    }

    validateInteger()
    {

        this.input.value < this.min || this.input.value > this.max ?
            this.feedback.innerHTML = 'close' : this.feedback.innerHTML = 'check'
        ;

        this.displayError("Entrez une valeur comprise entre " + this.min + " et " + this.max)
    }

    validateWordCount()
    {
        let trimmed    = this.input.value.trim();
        let text       = trimmed.split(' ').length;

        text  < this.min || text > this.max ?
            this.feedback.innerHTML = 'close' : this.feedback.innerHTML = 'check'
        ;

        this.displayError("Entre " + this.min + " mots minimun et " + this.max + " mots maximum")
    }

    displayError(msg)
    {
        let elem = document.getElementById(this.errorId);
        elem.innerText = msg;

        this.feedback.innerHTML === 'close' ?
           elem.style.display = 'block' : elem.style.display = 'none'
        ;

    }
}

export {ValidateForm}

