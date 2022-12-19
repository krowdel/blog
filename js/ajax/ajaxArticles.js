
class AjaxArticles {

    constructor(load='') {
        this.load = load + 'admin/src/articles/';
        this.panelAdmin();
        this.validate = new ValidateForm;
        this.divinfo = new DivInfo;
        this.sRadio = new SwitchRadio;
        this.InputFileImageView = new InputFileImageView;
        this.divIdFetch = 'contentFetchArticle';
    }

    addEvent() {
        const adds = document.querySelector('[data-add]');
        const del = document.querySelectorAll('[data-delete]');
        const edit = document.querySelectorAll('[data-edit]');
        const publicate = document.querySelectorAll('[data-public]');
         
        adds.addEventListener('click', ()=>{
            this.viewAdd();
        })
        del.forEach(el=>{ 
            el.addEventListener('click', (e)=>{
                this.viewDelet(e.target.dataset.delete);
            })
        });
        edit.forEach(el=>{
            el.addEventListener('click', (e)=>{
                this.viewUpp(e.target.dataset.edit);
            })
        });
        publicate.forEach(el=>{
            el.addEventListener('click', (e)=>{
                this.actionPublishead(e.target.dataset.idblog, e.target.dataset.public);
            })
        });
    }

    home() {
        const home = document.querySelector('[data-home]');
        home.addEventListener('click', ()=>{
            const alert = document.getElementById('alert');
            alert.innerHTML='';
            this.panelAdmin();
        });
    }

    keditor(content) {
        ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
    }

    panelAdmin() {
        fetch( this.load+"viewArticlesPanel.php", {
            method: "post",
            headers: {"Content-type":"application/x-www-form-urlencoded"},
        })
        .then(res=>res.text())
        .then(res=>{
            // console.log(res);
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
        const form = document.querySelector('.articles-form');
        const edit = document.querySelector('.ck-content').innerHTML;
        let dataSend='';
        let data = new FormData(form);
        data.append('content', edit);
        return data;
    }

    actionAdd() {
        const dataSend=this.createSendDataForm();
        fetch(this.load+"actionArticleAdd.php", {
            method: "post",
            // headers:  {"Content-type" : "application/x-www-form-urlencoded"},
            body: dataSend
        })
        .then(res => res.text())
        .then(res => {
            this.divinfo.clearDivInfo(res);
            this.divinfo.createDivInfo(res);
            this.panelAdmin();
        })
        .catch(error => console.log("Błąd: ", error));
    }

    blockTag() {
        const configOne = {
            inputName: "tags_name",
            separate: ", ",
            type: "text",
            limit: 255
        };
        const tagsOne = new Tags(configOne, 'pl');
    }

    viewAdd() {
        fetch(this.load+"viewArticleAdd.php", {
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
                this.panelAdmin();
            });
            akcept.addEventListener('click', (e)=>{
                e.preventDefault();
                if (this.validate.requiredInput()) {
                    this.actionAdd();
                }
            });
            this.keditor('#content');
            this.home();
            this.blockTag();
            this.InputFileImageView.viewImage('#cover', '.img-upload');
        })
        .catch(error => console.log("Błąd: ", error));
    }

    viewUpp(id) {
        let dataSend='id='+id;
        fetch(this.load+"viewArticleUpp.php", {
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

            if (document.querySelector('[data-reimage]')) {
                const removImg = document.querySelector('[data-reimage]');
                removImg.addEventListener('click', (e)=>{
                    this.actionImageDelet(removImg.dataset.reimage);
                });
            }

            // this.corectForm();
            send.addEventListener('click', (e)=>{
                e.preventDefault();
                this.actionUpp();
            });
            reset.addEventListener('click', ()=>{
                this.panelAdmin();
            });
            this.keditor('#content');
            this.home();
            this.blockTag();
            this.InputFileImageView.viewImage('#cover', '.img-upload');
        })
        .catch(error => console.log("Błąd: ", error));
    }

    actionUpp() {
        const dataSend=this.createSendDataForm();
        console.log(dataSend);
        fetch(this.load+"actionArticleUpp.php", {
            method: "post",
            // headers:  {"Content-type" : "application/x-www-form-urlencoded"},
            body: dataSend
        })
        .then(res => res.text())
        .then(res => {
            this.divinfo.clearDivInfo(res);
            this.divinfo.createDivInfo(res);
            this.panelAdmin();
        })
        .catch(error => console.log("Błąd: ", error));
    }

    actionDelet(idDel) {
        let dataSend='id='+idDel;
        fetch(this.load+"actionArticleDelet.php", {
            method: "post",
            headers:  {"Content-type" : "application/x-www-form-urlencoded"},
            body: dataSend
        })
        .then(res => res.text())
        .then(res => {
            this.panelAdmin();
        })
        .catch(error => console.log("Błąd: ", error));
    }

    actionImageDelet(idDel) {
        let dataSend='id='+idDel;
        fetch(this.load+"actionImageDelet.php", {
            method: "post",
            headers:  {"Content-type" : "application/x-www-form-urlencoded"},
            body: dataSend
        })
        .then(res => res.text())
        .then(res => {
            console.log(res);
            this.divinfo.clearDivInfo(res);
            const div = document.getElementById(this.divIdFetch);
            div.innerHTML='';
            div.innerHTML=res;
            console.log('tessssssssss');
            this.viewUpp(idDel);
        })
        .catch(error => console.log("Błąd: ", error));
    }

    actionPublishead(idblog, publicate) {
        let dataSend='id='+idblog+'&statut='+publicate;
        fetch(this.load+"actionArticlePublished.php", {
            method: "post",
            headers:  {"Content-type" : "application/x-www-form-urlencoded"},
            body: dataSend
        })
        .then(res => res.text())
        .then(res => {
            this.panelAdmin();
        })
        .catch(error => console.log("Błąd: ", error));
    }

    viewDelet(idDel) {
        let dataSend='id='+idDel;
        fetch(this.load+"viewArtikleDelet.php", {
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
                this.actionDelet(idDel);
            });
            reset.addEventListener('click', ()=>{
                this.panelAdmin();
            });
        })
        .catch(error => console.log("Błąd: ", error));
    }
}

// const ajaxArticles = new AjaxArticles();
