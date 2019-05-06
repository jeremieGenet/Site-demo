// Fonction qui va avoir pour but d'ajouter ou retirer une classe si on click dessus.

$(document).ready(function(){
    
    $('.menu-icon').click(function(e){ // lorsqu'on click sur la div class menu-icon
        e.preventDefault(); // permet d'annuler le comportement par défaut (si c'était un lien, on annulerais son renvoie à une autre page par exemple)
        $this = $(this);  // on stock l'évènement
        if($this.hasClass('is-opened')){ // si l'élément à la class is-opened alors...
            $this.addClass('is-closed').removeClass('is-opened'); // on lui met la class is-closed et on lui retire la class is-opened
        }else{
            $this.removeClass('is-closed').addClass('is-opened'); // sinon on retire la class is-closed et on lui ajoute la class is-opened
        }
    })
    
});
