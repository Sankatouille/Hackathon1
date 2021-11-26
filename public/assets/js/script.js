
let bouton = document.querySelector("#jouer")
let description = document.querySelector("#description")
let artistes = document.querySelector(".artistes")
let questions = document.querySelector(".questions")

let oui = document.querySelector("#oui")
let non = document.querySelector("#non")
let quest1 = document.querySelector("#quest1")


bouton.addEventListener("click", e=>{
   bouton.style.display="none"
   description.style.display="none"
   artistes.style.display="none"
   questions.style.display="block"
   oui.style.display="inline"
   non.style.display="inline"

})

oui.addEventListener("click", e=>{
   fetch("reponse?id=" + quest1.dataset.question + "&reponse=oui")
   .then(response=>response.json())
   .then(data=>{
      if (data.end){
         quest1.innerHTML="Ton personnage est"
         }
      else{   quest1.dataset.question=data.next.id
         quest1.innerHTML=data.next.question
          }})
})

non.addEventListener("click", e=>{
   fetch("reponse?id=" + quest1.dataset.question + "&reponse=non")
   .then(response=>response.json())
   .then(data=>{
      if (data.end){
         quest1.innerHTML="Ton personnage est"
         }
      else{   quest1.dataset.question=data.next.id
         quest1.innerHTML=data.next.question
          }})
})