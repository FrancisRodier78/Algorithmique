<?php
// Saisie des notes
echo "Entrez une liste de notes";
$saisie = fgets(STDIN);

// Suppression des espaces et du saut de ligne
$saisie = trim($saisie);

$liste_notes = explode(' ', $saisie);

$nbnotes = count($liste_notes);
// Boucle d'affinage
for ($i=0; $i < $nbnotes; $i++) { 
	printf("%5.2f ", $liste_notes($i));
}

echo PHP_EOL;
?>