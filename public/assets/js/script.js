
let bouton=document.querySelector("#jouer")
let description=document.querySelector("#description")
let artistes=document.querySelector(".artistes")
let questions=document.querySelector(".questions")

bouton.addEventListener("click", e=>{
   bouton.style.display="none"
   description.style.display="none"
   artistes.style.display="none"
   questions.style.display="block"

})
