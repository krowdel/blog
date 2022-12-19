class SwitchRadio {
    constructor() {

    }
    createSwitch () {
        const divRadio = document.getElementById('switchRadio');
        this.valRadio = parseInt(divRadio.querySelector('input[checked]').value);
        const nameContent = divRadio.querySelectorAll('label');

        divRadio.innerHTML='';

        const swRadio=document.createElement('div');
        swRadio.setAttribute('class', 'swRadio');

        this.yes=document.createElement('div');
        this.yes.setAttribute('class', 'vat_payer');
        this.yes.innerText=[...nameContent][0].innerText;

        this.no=document.createElement('div');
        this.no.setAttribute('class', 'vat_payer');
        this.no.innerText=[...nameContent][1].innerText;
        // console.log(this.valRadio);

        if(this.valRadio) { 
            this.yes.classList.add('activeRadio');
            this.no.classList.add('deactivRadio');
        } else  { 
            this.yes.classList.add('deactivRadio');
            this.no.classList.add('activeRadio');
        } 

        this.hidde=document.createElement('input');
        this.hidde.setAttribute('name', 'published');
        this.hidde.setAttribute('type', 'hidden');
        this.hidde.setAttribute('value', this.valRadio);

        divRadio.appendChild(this.hidde);
        swRadio.appendChild(this.yes);
        swRadio.appendChild(this.no);
        divRadio.appendChild(swRadio);

        this.yes.addEventListener('click', ()=>{
            if (!this.valRadio) {
                this.changeValue(1);
            }
        })
        this.no.addEventListener('click', ()=>{
            if (this.valRadio) {
                this.changeValue(0);
            }
        })
    }
    changeValue (valbol) {
        this.yes.classList.toggle('activeRadio');
        this.yes.classList.toggle('deactivRadio');
        this.no.classList.toggle('activeRadio');
        this.no.classList.toggle('deactivRadio');
        this.valRadio=valbol;
        this.hidde.setAttribute('value', this.valRadio);
    }
}