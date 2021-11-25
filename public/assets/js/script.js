
let bouton=document.querySelector("#jouer")
let questions=document.querySelector("#questions")
let description=document.querySelector("#description")
let artistes=document.querySelector(".artistes")

bouton.addEventListener("click", e=>{
   bouton.style.display="none"
   description.style.display="none"
   questions.style.display="block"
   artistes.style.display="none"

})
