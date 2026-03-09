function Folder(num, text){
    let contain = document.getElementById("con"); 
    var mat = text;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'Dossier.php?mat='+mat, true);
    xhr.onload= function(){
        if(xhr.status === 200){
            contain.innerHTML="";
            console.log("OK");
        }
    };
    xhr.send();
}