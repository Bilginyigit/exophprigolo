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
    $req = $dbconnexion->query("SELECT nom,prenom FROM users");
    $choixaleatoire=$req->fetchAll();
    shuffle($choixaleatoire);
    $choix=array_slice($choixaleatoire,0,4);
    foreach ($choix as $value){

        echo '<div class="choix-aleatoire">'.$value[0].' '.$value[1].'</div>';
    }
    ?>
    <!-- Fin du code à remplacer par votre PHP -->

<script>
$(document).ready(function() {
	$('.menu-link').menuFullpage();
} );
</script>
<?php  include '../footer.php'; ?>