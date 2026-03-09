document.getElementById('rq').addEventListener('change', function(){
    let fileinput = document.getElementById('rq');
    let filepath = fileinput.value;
    let allowExtensions = /(\.pdf)$/i;
 
    if(!allowExtensions.exec(filepath)){
       alert('Sélectionner un fichier pdf');
       fileinput.value= '';
    }
 })