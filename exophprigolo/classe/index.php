<?php  include '../config.php'; ?>
<?php  include '../header.php'; ?>
<div class="general-content">
<h1>La classe</h1>
    <h2>Explications sur l'exercice</h2>
    <p>Faites une requête dans la base de données users, vous devez remonter les informations, nom, prenom et date_naissance. La date de naissance doit être transformée pour donner l'âge de la personne. Vous devez faire une fonction pour la convertion date de naissance / âge.
    </p>
<h2>Résultat</h2>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>

            </tr>
        </tfoot>
        <tbody>

        <!-- Début du code à remplacer par votre PHP -->
        <?php
        function calcule($calcule){
            $age=date_create($calcule)->diff(date_create('today'))->y;
            return $age; 
            /*  $annee_util=explode("-", $date_toute);
            $age=date('Y')-$annee_util[0];
            echo $age . "  ans"; */ 
        }
         $getutilisateur = $dbconnexion->query('SELECT nom,prenom,date_naissance FROM users' ) ;
         $resulta= $getutilisateur->fetchAll();
         foreach ($resulta as $value){
            echo '<tr><td>'.$value[0].'</td><td>'.$value[1].'</td><td>'.calcule($value[2]).'  ans' .'</td></tr>';
       } ?>

        <!-- Fin du code à remplacer par votre PHP -->

        </tbody>
    </table>
    </div>
<script>
$(document).ready(function() {
	$('.menu-link').menuFullpage();
    $('#example').DataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/French.json"
            }
        } );
} );
</script>
<?php  include '../footer.php'; ?>