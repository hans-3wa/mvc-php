<script type="text/javascript">
'use strict'

/**************************************************************
 * 
 * HEADER scroll "sticky"
 * 
**************************************************************/

window.addEventListener('scroll', function (){
    let header = document.querySelector('header');
    header.classList.toggle('sticky', window.scrollY > 0);
})


/**************************************************************
 * NAVIGATEUR section page account
**************************************************************/
let secConnexion = document.querySelector('#secLog')
let secCommande = document.getElementById('secProfil')
let secFavorie = document.getElementById('secFav')
let secPorteFeuille = document.getElementById('secPort')

/**************************************************************
 * NAVIGATEUR lien de navigation vers les sections
**************************************************************/
let profil = document.querySelector('#profil')
let commandes = document.getElementById('commandes')
let favories = document.getElementById('favories')
let porteFeuille = document.getElementById('profeuil')

/**************************************************************
 * Maintenant que les différents éléments sont récupérer :
 * > Faire un event click sur les liens
 * > Demander à la section concernée de s'afficher
 * > Demander aux autres sections d'être cacher
 * > class style toggle:
 *  .Hide : display: none; padding-top: 110px;
 * 
 * function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
**************************************************************/
profil.addEventListener("click", function(){
    if(secConnexion.style.display === "none") {
        secConnexion.style.display = "flex"
        secCommande.style.display = "none"
        secFavorie.style.display = "none"
        secPorteFeuille.style.display = "none"
    } else {
        secCommande.style.display = "none"
        secFavorie.style.display = "none"
        secPorteFeuille.style.display = "none"
    }
})

commandes.addEventListener("click", function(){
    if(secCommande.style.display === "flex") {
        secCommande.style.display = "none"
        secConnexion.style.display = "flex"
    } else {
        secConnexion.style.display = "none"
        secCommande.style.display = "flex"
        secFavorie.style.display = "none"
        secPorteFeuille.style.display = "none"
    }
})

favories.addEventListener("click", function(){
    if(secFavorie.style.display === "flex") {
        secFavorie.style.display = "none"
        secConnexion.style.display = "flex"
    } else {
        secConnexion.style.display = "none"
        secCommande.style.display = "none"
        secFavorie.style.display = "flex"
        secPorteFeuille.style.display = "none"
    }
})

porteFeuille.addEventListener("click", function(){
    if(secPorteFeuille.style.display === "flex") {
        secPorteFeuille.style.display = "none"
        secConnexion.style.display = "flex"
    } else {
        secConnexion.style.display = "none"
        secCommande.style.display = "none"
        secFavorie.style.display = "none"
        secPorteFeuille.style.display = "flex"
    }
})



// Créer un function Hideall sur tous les sections
// hide les quatres sections
// Puis créer une autre function showblock pour afficher le "Data"
// Afficher un élément sélectionner

function hideAll() {
    secConnexion.style.display = "none"
    secCommande.style.display = "none"
    secFavorie.style.display = "none"
    secPorteFeuille.style.display = "none"
}

/*
function showBlock() {
    secPorteFeuille.style.display = "flex"
}
*/

function toggleA() {
    this.classList.toggle('active')
}

</script>