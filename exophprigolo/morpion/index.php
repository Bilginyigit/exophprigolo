<?php  include '../config.php'; ?>
<?php  include '../header.php'; ?>


<div class="general-content">
<h1>Le morpion</h1>
    <h2>Explications sur l'exercice</h2>
    <p>Faire un jeu de morpion, l'adversaire et l'ordinateur, il n'y a pas deux joueurs.
    </p>
<h2>Faire une partie</h2>


    <!-- Début php -->

<div style="text-align:center;margin-bottom:30px;width:100%;"><a href="/morpion/?rejouer=ok" class="btn btn-info" style="font-size:50px;padding-left:100px;padding-right:100px;">Bravo, tu as gagné !!<br>Rejouer une partie</a></div><table id="center">

<tbody id="center">
    <tr>
      <td class="carre" id="Zonea1"><img src="/img/croix.png"></td>
      <td class="carre" id="Zonea2"><img src="/img/rond.png"></td>
      <td class="carre" id="Zonea3"><img src="/img/croix.png"></td>
    </tr>
    <tr>
      <td class="carre" id="Zoneb1"><img src="/img/vide.png"></td>
      <td class="carre" id="Zoneb2"><img src="/img/croix.png"></td>
      <td class="carre" id="Zoneb3"><img src="/img/vide.png"></td>
    </tr>
    <tr>
      <td class="carre" id="Zonec1"><img src="/img/rond.png"></td>
      <td class="carre" id="Zonec2"><img src="/img/rond.png"></td>
      <td class="carre" id="Zonec3"><img src="/img/croix.png"></td>
    </tr>
  </tbody>
</table>
</div>


<script>
 function Initialisation() {
	document.getElementById("rejouer").style.display="none";
	document.getElementById("titre").innerHTML="Super Morpion"; 
	NombreCoup=1;
	Emplacement = {Zonea1:"vide", Zonea2:"vide", Zonea3:"vide", Zoneb1:"vide", Zoneb2:"vide", Zoneb3:"vide", Zonec1:"vide", Zonec2:"vide", Zonec3:"vide"}; 
				 var table = document.getElementById("center"); 
			var cells = table.getElementsByTagName("td");
			for (var i = 0; i < cells.length; i++) { 
			var status = cells[i].style.backgroundPosition = "left";
			var status = cells[i].style.pointerEvents = 'auto';};
	 };

function jouer(zone) {
	if (NombreCoup%2 == 0) {
		document.getElementById(zone).style.backgroundPosition = "center";
		Emplacement[zone]="croix";
	} else  {
		document.getElementById(zone).style.backgroundPosition = "right";
		Emplacement[zone]="rond";
    };
	document.getElementById(zone).style.pointerEvents = 'none';
    NombreCoup++;
	checkWin();

	if (NombreCoup == 10 && typeof Gagnant === 'undefined') {
		document.getElementById("titre").innerHTML="Pas de gagnant";
		 document.getElementById("rejouer").style.display="initial";
		}
	};
	
function checkWin() {
	// alert(Emplacement["Zonea1"]+Emplacement["Zonea2"]+Emplacement["Zonea3"]);
    console.log(Emplacement["Zonea1"]+" "+Emplacement["Zonea2"]+" "+Emplacement["Zonea3"]);

	if (verifEgalite(Emplacement["Zonea1"],Emplacement["Zonea2"],Emplacement["Zonea3"]) || verifEgalite(Emplacement["Zoneb1"],Emplacement["Zoneb2"],Emplacement["Zoneb3"]) || verifEgalite(Emplacement["Zonec1"],Emplacement["Zonec2"],Emplacement["Zonec3"]) || verifEgalite(Emplacement["Zonea1"],Emplacement["Zoneb1"],Emplacement["Zonec1"]) || verifEgalite(Emplacement["Zonea2"],Emplacement["Zoneb2"],Emplacement["Zonec2"]) || verifEgalite(Emplacement["Zonea3"],Emplacement["Zoneb3"],Emplacement["Zonec3"]) || verifEgalite(Emplacement["Zonea1"],Emplacement["Zoneb2"],Emplacement["Zonec3"]) || verifEgalite(Emplacement["Zonea3"],Emplacement["Zoneb2"],Emplacement["Zonec1"])) {
		if (Gagnant == 'croix') {
			   document.getElementById("titre").innerHTML="Les croix ont gagnées"; 
			   } else {
				document.getElementById("titre").innerHTML="Les ronds ont gagnés";    
			}
			document.getElementById("rejouer").style.display="initial";
			 var table = document.getElementById("center"); 
			var cells = table.getElementsByTagName("td");
			for (var i = 0; i < cells.length; i++) { 
			var status = cells[i].style.pointerEvents = 'none'; 
   					 }
		}
	}
function verifEgalite (zone1, zone2, zone3) {
	if (zone1 == zone2 && zone1 == zone3 && zone1 != 'vide') {
		Gagnant = zone1;
		return true;
	} else {
		return false;
		}
	};
</script>
</body>
<!-- Fin php -->
<script>
$(document).ready(function() {
	$('.menu-link').menuFullpage();
} );
</script>
<?php  include '../footer.php'; ?>