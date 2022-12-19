class DivInfo {

    createDivInfo(res) {
        const div = document.getElementById('alert');
        const alertDiv = document.createElement('div');
        alertDiv.setAttribute('class', 'alertDiv');
        alertDiv.innerHTML='';
        alertDiv.innerHTML=res;
        div.appendChild(alertDiv);
    }

    clearDivInfo() {
        const div = document.getElementById('alert');
        div.innerHTML='';
    }
}