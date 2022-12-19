
class AjaxCategories {

    constructor(load='') {
        this.load = load + 'admin/src/categories/';
        this.viewAdminPanel();
        this.validate = new ValidateForm;
        this.divinfo = new DivInfo;
        this.sRadio = new SwitchRadio;
        this.divIdFetch = 'contentFetchCategory';
    }

    addEvent() {
        const adds = document.querySelector('[data-add]');
        const del = document.querySelectorAll('[data-delete]');
        const edit = document.querySelectorAll('[data-edit]');
        const active = document.querySelectorAll('[data-public]');
         
        adds.addEventListener('click', ()=>{
            this.viewAdd();
        })
        del.forEach(el=>{ 
            el.addEventListener('click', (e)=>{
                this.viewDelete(e.target.dataset.delete);
            })
        });
        edit.forEach(el=>{
            el.addEventListener('click', (e)=>{
                this.viewUpp(e.target.dataset.edit);
            })
        })
        active.forEach(el=>{
            el.addEventListener('click', (e)=>{
                this.actionActiv(e.target.dataset.idblog, e.target.dataset.public);
            })
        })
    }

    home() {
        const home = document.querySelector('[data-home]');
        home.addEventListener('click', ()=>{
            const alert = document.getElementById('alert');
            alert.innerHTML='';
            this.viewAdminPanel();
        });
    }

    viewAdminPanel() {
        fetch( this.load+"viewCategoriesPanel.php", {
            method: "post",
            headers: {"Content-type":"application/x-www-form-urlencoded"},
        })
        .then(res=>res.text())
        .then(res=>{
            console.log(res);
            let div = document.getElementById(this.divIdFetch);
            div.innerHTML='';
            div.innerHTML=res;
            this.addEvent();
            const moreArticles = new MoreArticle;
        })
        .catch(error => {
            let diverror = document.getElementById(this.divIdFetch);
            diverror.innerHTML="Błąd: "+ error;
        });
    }

    createSendDataForm() {
        const form = document.querySelector('.category-form');
        let data = new FormData(form);
        return data;
    }

    viewAdd() {
        fetch(this.load+"viewCategoryAdd.php", {
            method: "post",
            headers:  {"Content-type" : "application/x-www-form-urlencoded"},
        })
        .then(res => res.text())
        .then(res => {
            const div = document.getElementById(this.divIdFetch);
            div.innerHTML='';
            div.innerHTML=res;
            this.sRadio.createSwitch();
            const resetadd = document.querySelector('[data-reset]');
            const akcept = document.querySelector('[data-akcept]');
            // this.corectForm();
            resetadd.addEventListener('click', (e)=>{
                e.preventDefault();
                this.divinfo.clearDivInfo(res);
                this.viewAdminPanel();
            });
            akcept.addEventListener('click', (e)=>{
                e.preventDefault();
                if (this.validate.requiredInput()) {
                    this.actionAdd();
                }
            });
            this.home();
        })
        .catch(error => console.log("Błąd: ", error));
    }

    actionAdd() {
        const dataSend=this.createSendDataForm();
        fetch(this.load+"actionCategoryAdd.php", {
            method: "post",
            body: dataSend
        })
        .then(res => res.text())
        .then(res => {
            this.divinfo.clearDivInfo(res);
            this.divinfo.createDivInfo(res);
            this.viewAdminPanel();
        })
        .catch(error => console.log("Błąd: ", error));
    }

    viewUpp(id) {
        let dataSend='id='+id;
        // console.log(dataSend);
        fetch(this.load+"viewCategoryUpp.php", {
            method: "post",
            headers:  {"Content-type" : "application/x-www-form-urlencoded"},
            body: dataSend
        })
        .then(res => res.text())
        .then(res => {
            this.divinfo.clearDivInfo(res);
            const div = document.getElementById(this.divIdFetch);
            div.innerHTML='';
            div.innerHTML=res;
            this.sRadio.createSwitch();
            const reset = document.querySelector('[data-reset]');
            const send = document.querySelector('[data-akcept]');

            // this.corectForm();
            send.addEventListener('click', (e)=>{
                e.preventDefault();
                this.actionUpp();
            });
            reset.addEventListener('click', ()=>{
                this.viewAdminPanel();
            });
            this.home();
        })
        .catch(error => console.log("Błąd: ", error));
    }

    actionUpp() {
        const dataSend=this.createSendDataForm();
        fetch(this.load+"actionCategoryUpp.php", {
            method: "post",
            body: dataSend
        })
        .then(res => res.text())
        .then(res => {
            this.divinfo.clearDivInfo(res);
            this.divinfo.createDivInfo(res);
            this.viewAdminPanel();
        })
        .catch(error => console.log("Błąd: ", error));
    }

    actionActiv(idblog, publicate) {
        let dataSend='id='+idblog+'&statut='+publicate;
        fetch(this.load+"actionCategoryActiv.php", {
            method: "post",
            headers:  {"Content-type" : "application/x-www-form-urlencoded"},
            body: dataSend
        })
        .then(res => res.text())
        .then(res => {
            this.viewAdminPanel();
        })
        .catch(error => console.log("Błąd: ", error));
    }

    actionDelete(idDel) {
        let dataSend='id='+idDel;
        fetch(this.load+"actionCategoryDelete.php", {
            method: "post",
            headers:  {"Content-type" : "application/x-www-form-urlencoded"},
            body: dataSend
        })
        .then(res => res.text())
        .then(res => {
            this.viewAdminPanel();
        })
        .catch(error => console.log("Błąd: ", error));
    }

    viewDelete(idDel) {
        let dataSend='id='+idDel;
        fetch(this.load+"viewCategoryDelete.php", {
            method: "post",
            headers:  {"Content-type" : "application/x-www-form-urlencoded"},
            body: dataSend
        })
        .then(res => res.text())
        .then(res => {
            const div = document.getElementById(this.divIdFetch);
            const delDiv= document.createElement('div');
            delDiv.setAttribute('class', 'popUp');
            delDiv.innerHTML=res;
            div.appendChild(delDiv);

            const delAkcept = document.querySelector('[data-delakcept]');
            const reset = document.querySelector('[data-reset]');
            delAkcept.addEventListener('click', ()=>{
                this.actionDelete(idDel);
            });
            reset.addEventListener('click', ()=>{
                this.viewAdminPanel();
            });
        })
        .catch(error => console.log("Błąd: ", error));
    }
}
