class MoreArticle {
    constructor() {
        this.more = document.querySelectorAll('.panel-text.content-more');
        this.more.forEach(item=>{
            let click = item.querySelector('.more');
            let content = item.querySelector('.contentmore');
            click.addEventListener("click", ()=>{
                content.classList.toggle('showItem');
                const spanView = item.querySelectorAll('span');
                spanView.forEach(span=>{
                    console.log(span);
                    span.classList.toggle('view-more');
                });
            });
        })
    }
}