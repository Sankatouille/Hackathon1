
let bouton=document.querySelector("#jouer")
let questions=document.querySelector("#questions")
let description=document.querySelector("#description")

bouton.addEventListener("click", e=>{
   bouton.style.display="none"
   description.style.display="none"
   questions.style.display="block"

})
