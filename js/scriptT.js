 const sign_in_btn = document.querySelector("#sign-in-btn"); 
 const sign_up_btn = document.querySelector("#sign-up-btn");
 const container = document.querySelector(".container");  
 const right_panel=document.querySelector(".right-panel");
 const left_panel=document.querySelector(".left-panel");

 sign_in_btn.addEventListener("click", () =>{
    container.classList.add("sign-up-mode");
    right_panel.classList.add("active");
 });

 sign_up_btn.addEventListener("click", () =>{
    container.classList.remove("sign-up-mode");
    left_panel.classList.add("active");
 });

 //Confirmation de mot de passe
//Verification de la véracité du motde passe

var mdp1= document.querySelector('#pass1');
var mdp2= document.querySelector('#conf');

var mdpT= document.querySelector('#passT');
var mdpC= document.querySelector('#passC');
mdp2.onkeyup = () =>{
	//évenement lorsqu'on ecrit dans le chams : confirmation de mot de passe
	if(mdp1.value != mdp2.value){
		mdpC.classList.add("active");
	}else{
        mdpT.classList.add("good");
        mdpC.classList.add("good");
	}
}