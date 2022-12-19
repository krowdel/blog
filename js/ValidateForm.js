class ValidateForm{

    constructor() {
        this.divinfo = new DivInfo;
    }

    lengthLimit(input, num) {
        input.addEventListener('keyup', ()=>{
            input.classList.remove("fullLimit");
            if (input.value.length>num) { 
                let substring=input.value.substring(0, num);
                input.value=substring;
                input.classList.add("fullLimit"); 
            }
        });
    }

    requiredInput() {  
        const required = document.querySelectorAll('[required]');
        let stat = true;
        this.divinfo.clearDivInfo();
        required.forEach(el=>{
            if(!el.value) {
                stat=false;
                const label=document.querySelector('label[for='+el.id+']');
                let texlabel = label.innerText.slice(0, -1);
                this.divinfo.createDivInfo('Należy uzupełnić pola zanaczone na czerwono: <b>'+texlabel+'</b>');
                el.classList.add("missing");
            } else { 
                el.classList.remove("missing");
            } 
        })
        return stat;
    }
}