
// Variable qui permettra de savoir si la boite modale est ouverte (par défaut elle est fermé)
let modal = null

// Permet de stocker les éléments 'focusables'
const focusableSelector = "button, a, input, textarea"
let focusables = []

let previouslyFocusedElement = null


// Permet d'afficher la boite modale
const openModal = function(e){
    e.preventDefault()
    modal = document.querySelector(e.target.getAttribute('href'))
    
    focusables = Array.from(modal.querySelectorAll(focusableSelector))
    previouslyFocusedElement = document.querySelector(':focus')
    
    modal.style.display = null // On affiche la boite modal (dans le html il y a 'style="display:none;"')
    
    focusables[0].focus() // On met le focus sur le premier élément
    
    modal.removeAttribute('aria-hidden') // On supprime l'attribut aria-hidden
    modal.setAttribute('aria-modal', 'true') // On ajoute l'attribut aria-modal=true

    modal.addEventListener('click', closeModal)
    modal.querySelector('.js-modal-close').addEventListener('click', closeModal)
    modal.querySelector('.js-modal-stop').addEventListener('click', stopPropagation)
}

// Permet de fermer un boite modale
const closeModal = function(e){

    if(modal === null) return // Si modal vaut null on stop la fonction (return stop le script)
    if(previouslyFocusedElement !== null) previouslyFocusedElement.focus()
    e.preventDefault()
    
    // On met 'display none' à notre boite modale après 500 millisecondes (utile pour l'animation de fermeture de la boite modale)
    window.setTimeout(function(){
        modal.style.display = 'none'
        modal = null // On ferme la boite modale
    }, 600)

    // On cache la boite modale et retire ses attributs
    modal.style.display = 'none'
    modal.setAttribute('aria-hidden', 'true')
    modal.removeAttribute('aria-modal')

    modal.removeEventListener('click', closeModal)
    modal.querySelector('.js-modal-close').removeEventListener('click', closeModal) // On supprime l'évènement
    modal.querySelector('.js-modal-stop').removeEventListener('click', stopPropagation) // On supprime l'évènement
}

// Permet de stopper la propagation de l'évemenent aux parents (le click)
const stopPropagation = function (e){
    e.stopPropagation()
}

// Permet de gérer le focus dans la boite modale avec la touche Shift (retour en arrière)
const focusInModal = function(e){
    e.preventDefault
    
    //console.log(focusables) // Affiche les éléments focusables (un tableau de 5)
    focus = modal.querySelector(':focus')
    //console.log(focus)
    let index = focusables.findIndex(f => f === focus)
    
    //console.log(index)
    //focusables[0].focus()
    if(index > focusables.length){
        index = 0
        
    }
    focusables[index].focus()
    
    console.log(focus.onfocus)
    
}

// LORSQU'ON CLICK SUR LE LIEN (class = js-modal)
// On selectionne les liens de la class 'js-modal' et pour chaque lien au click on leur assigne la fonction 'openModal'
document.querySelectorAll('.js-modal').forEach(a => {
    
    a.addEventListener('click', openModal)
})

// Ferme la fenêtre si on appuie sur 'Escape' et Gère le focus de la touche 'Tab'
window.addEventListener('keydown', function(e){
    //console.log(e.key)
    if(e.key === "Escape" || e.key === "Esc"){
        closeModal(e)
    }
    
    if(e.key === "Tab" && modal !== null){
        focusInModal(e)
    }
    
})

//console.log(previouslyFocusedElement)
//console.log(focusables)































