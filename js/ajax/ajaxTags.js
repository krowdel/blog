
class AjaxTags {

    constructor(load='') {
        this.load = load + 'admin/src/tags/';
        this.panelAdmin();
        this.divIdFetch = 'contentFetchTags';
    }

    addEvent() {
        const del = document.querySelectorAll('[data-delete]');
        del.forEach(el=>{ 
            el.addEventListener('click', (e)=>{
                this.viewDelete(e.target.dataset.delete);
            })
        });
    }

    panelAdmin() {
        fetch( this.load+"viewTagsPanel.php", {
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

    actionDelet (nameTag) {
        let dataSend = 'nameTag='+nameTag;
        fetch(this.load+"actionTagDelet.php", {
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

    viewDelete(nameTag) {
        let dataSend='nameTag='+nameTag;
        fetch(this.load+"viewTagDelet.php", {
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
                this.actionDelet(nameTag);
            });
            reset.addEventListener('click', ()=>{
                this.panelAdmin();
            });
        })
        .catch(error => console.log("Błąd: ", error));
    }
}

// const ajaxArticles = new AjaxArticles();
