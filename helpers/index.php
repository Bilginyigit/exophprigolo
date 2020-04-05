<?php  include '../config.php'; ?>
<?php  include '../header.php'; ?>

<div class="general-content">
<h1>Les helpers</h1>

    <h2>Explications sur l'exercice</h2>
    <p>Faites une requête dans la base de données liées à ces exercices pour retourner la 
    totalité des apprenants. Faites du PHP pour mélanger ce résultat et obtenir 4 apprenants au hasard.
    </p>
<h2>Résultat</h2>


    <!-- Début du code à remplacer par votre PHP -->
    <?php
$ListeApprenants = array(); //Boucles de la liste en db
foreach ($dbconnexion->query('SELECT nom, prenom from users') as $Apprenant) { // Appeler des données depuis db
      $ListeApprenants[] =  strtoupper($Apprenant['prenom']).' '.$Apprenant['nom']; //Placer les données à leur place dans le tableau
 }
 shuffle($ListeApprenants);
 for ($i=0;$i < 4;$i++) { //afficher 4 personnes dans la liste avec la boucle à chaque fois
echo '<div class="choix-aleatoire">'.$ListeApprenants[$i].'</div>'; //faites défiler les gens à chaque impression

};

   /* $req = $dbconnexion->query("SELECT nom,prenom FROM users");
    $choixaleatoire=$req->fetchAll();
    shuffle($choixaleatoire);
    $choix=array_slice($choixaleatoire,0,4);
    foreach ($choix as $value){

        echo '<div class="choix-aleatoire">'.$value[0].' '.$value[1].'</div>';
    }*/
    ?>
    <!-- Fin du code à remplacer par votre PHP -->

<script>
$(document).ready(function() {
	$('.menu-link').menuFullpage();
} );
</script>
<?php  include '../footer.php'; ?>