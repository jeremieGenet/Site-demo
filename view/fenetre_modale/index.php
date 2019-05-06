<?php
/*
    PAGE RACINE DU PROJET (Utilisation de liens dynamiques grace au Routing de la librairie)
*/
use App\Path;

$title = "Fenêtre Modale en JS";
$path = new Path();
$path->getStyle("css/fenetre_modale/fenetre_modale.css");

?>

<div class="container link_fenetre_modale">

    <a href="#modal1" class="js-modal text-info"> >> Ouvrir la boite modale << </a>

</div>


<!-- Boite Modale -->
<aside id="modal1" class="modal" aria-hidden="true" role="dialog" aria-labelledby="titlemodal" style="display:none;">
    
    <div class="modal-wrapper js-modal-stop">
        
        <button class="js-modal-close">Fermer la boite modale</button>
        
        <h1 id="titlemodal">Conditions d'utilisations</h1>
        <p>
        You seem malnourished. Are you suffering from intestinal parasites? No argument here. Wow, you got that off the Internet? In my day, the Internet was only used to download pornography. My fellow Earthicans, as I have explained in my book 'Earth in the Balance'', and the much more popular ''Harry Potter and the Balance of Earth', we need to defend our planet against pollution. Also dark wizards.
        </p>
        <p>
        Ugh, it's filthy! Why not create a National Endowment for Strip Clubs while we're at it? <strong> Goodbye, cruel world.</strong> <em> Goodbye, cruel lamp.</em> Goodbye, cruel velvet drapes, lined with what would appear to be some sort of cruel muslin and the cute little pom-pom curtain pull cords.
        </p>
        <h2>I'm sure those windmills will keep them cool.</h2>
        <p>
        Now Fry, it's been a few years since medical school, so remind me. Disemboweling in your species: fatal or non-fatal? When will that be? When I was first asked to make a film about my nephew, Hubert Farnsworth, I thought "Why should I?" Then later, Leela made the film. But if I did make it, you can bet there would have been more topless women on motorcycles. Roll film!
        </p>
        
        <input type="text">
        
        <a href="#">Essai de lien pour focus</a>
        
        <ol>
            <li>We don't have a brig.</li>
            <li>I don't know what you did, Fry, but once again, you screwed up! Now all the planets are gonna start cracking wise about our mamas.</li>
            <li>Actually, that's still true.</li>
        </ol>
        
        <input type="text">

        <label for="">Essai d'un input pour le focus</label>
        
        <a href="">Second essai de lien</a>
        
        
        <h3>We'll go deliver this crate like professionals, and then we'll go home.</h3>
        <p>Doomsday device? Ah, now the ball's in Farnsworth's court! You can see how I lived before I met you. Spare me your space age technobabble, Attila the Hun! I'll tell them you went down prying the wedding ring off his cold, dead finger.</p>
        <ul>
            <li>Good news, everyone! There's a report on TV with some very bad news!</li>
            <li>How much did you make me?</li>
            <li>There's one way and only one way to determine if an animal is intelligent. Dissect its brain!</li>
        </ul>

        
        
        <p>Large bet on myself in round one. I was having the most wonderful dream. Except you were there, and you were there, and you were there! Oh, you're a dollar naughtier than most. As an interesting side note, as a head without a body, I envy the dead.</p>
        <p>Well, then good news! It's a suppository. Oh Leela! You're the only person I could turn to; you're the only person who ever loved me. You can see how I lived before I met you. Oh, how awful. Did he at least die painlessly? …To shreds, you say. Well, how is his wife holding up? …To shreds, you say.</p>
        <p>All I want is to be a monkey of moderate intelligence who wears a suit… that's why I'm transferring to business school! THE BIG BRAIN AM WINNING AGAIN! I AM THE GREETEST! NOW I AM LEAVING EARTH, FOR NO RAISEN!</p>
        <p>I love this planet! I've got wealth, fame, and access to the depths of sleaze that those things bring. You don't know how to do any of those. You are the last hope of the universe. Why am I sticky and naked? Did I miss something fun?</p>
        <p>Belligerent and numerous. Professor, make a woman out of me. I'm Santa Claus! No! The cat shelter's on to me. Ugh, it's filthy! Why not create a National Endowment for Strip Clubs while we're at it? We need rest. The spirit is willing, but the flesh is spongy and bruised.</p>
        <p>What's with you kids? Every other day it's food, food, food. Alright, I'll get you some stupid food. No, just a regular mistake. Um, is this the boring, peaceful kind of taking to the streets? You, a bobsleder!? That I'd like to see!</p>
        <p>It may comfort you to know that Fry's death took only fifteen seconds, yet the pain was so intense, that it felt to him like fifteen years. And it goes without saying, it caused him to empty his bowels. Oh, but you can. But you may have to metaphorically make a deal with the devil. And by "devil", I mean Robot Devil. And by "metaphorically", I mean get your coat.</p>
        <p>Why yes! Thanks for noticing. Now Fry, it's been a few years since medical school, so remind me. Disemboweling in your species: fatal or non-fatal? I didn't ask for a completely reasonable excuse! I asked you to get busy!</p>
        <p>Is the Space Pope reptilian!? You lived before you met me?! Shut up and take my money! That's the ONLY thing about being a slave. Oh, I don't have time for this. I have to go and buy a single piece of fruit with a coupon and then return it, making people wait behind me while I complain.</p>
        <p>Yes, if you make it look like an electrical fire. When you do things right, people won't be sure you've done anything at all. Ven ve voke up, ve had zese wodies. It's just like the story of the grasshopper and the octopus. All year long, the grasshopper kept burying acorns for winter, while the octopus mooched off his girlfriend and watched TV. But then the winter came, and the grasshopper died, and the octopus ate all his acorns. Also he got a race car. Is any of this getting through to you?</p>
        <p>I was all of history's great robot actors - Acting Unit 0.8; Thespomat; David Duchovny! It's toe-tappingly tragic! Uh, is the puppy mechanical in any way? And I'd do it again! And perhaps a third time! But that would be it.</p>
    </div>
</aside>

<?php
    $path->getJs("../js/fenetre_modale/main.js");
?>