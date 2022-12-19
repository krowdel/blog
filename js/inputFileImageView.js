/*
date: 2021.11.20
Js majacy zastapic wyswietlanie obrazow dla input file
pierwsze zmiena nazwa inputu file
druga nazwa pola gdzie ma być wyswietlany
*/

class InputFileImageView {
    viewImage(inputfile, preview, classView='imgViewJs') {
       this.classPreview = classView;
       this.inputFile = document.querySelector(inputfile);
       this.preView = document.querySelector(preview);
       this.inputFile.addEventListener('change', ()=>{
          this.previewFiles();
       });
    }
    previewFiles() {
       this.preView.innerHTML='';
       if (this.inputFile.files) {
          [...this.inputFile.files].forEach(file=>{
             this.readAndPreview(file);
          });
       }
    }
 
    readAndPreview(file) {
       if ( /\.(jpe?g|png|bmp)$/i.test(file.name) ) {
       var reader = new FileReader();
       reader.addEventListener("load", ()=>{
         let div  = document.createElement('div');
         div.classList.add(this.classPreview);
         div.innerHTML = '<img src=' + reader.result + '>';
         //  div.innerHTML = '<img src=' + reader.result + '><p>' + file.name + '</p>';
         // div.prepend(del);
         this.preView.appendChild(div);
       }, false);
       reader.readAsDataURL(file);
     }
   } 
}
 
 