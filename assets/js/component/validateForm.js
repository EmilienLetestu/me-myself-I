class ValidateForm {

    constructor(id, min, max,)
    {
        this.id       = id;
        this.min      = min;
        this.max      = max;
        this.replaceChar = this.id.replace(/_/g, '-') + '-feedback'
    }

    validateTextLength()
    {
        let input      = document.getElementById(this.id);
        let feedbackId = this.replaceChar;
        let feedback   = document.getElementById(feedbackId);

        input.value.length < this.min || input.value.length > this.max ?
            feedback.innerHTML = 'close' : feedback.innerHTML = 'check'
        ;


    }

    validateInteger()
    {
        let input      = document.getElementById(this.id);
        let feedbackId = this.replaceChar;
        let feedback   = document.getElementById(feedbackId);

        input.value < this.min || input.value > this.max ?
            feedback.innerHTML = 'close' : feedback.innerHTML = 'check'
        ;
    }
}

export {ValidateForm}

