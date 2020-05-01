<?php
// Saisie des notes
//echo "Entrez une liste de notes";
//$saisie = fgets(STDIN);
$saisie = "a z e r t y qq ss dd ff gg hh www xxx ccc vvv bbb nnn   ";

// Suppression des espaces et du saut de ligne
$saisie = trim($saisie);

$liste_notes = explode(' ', $saisie);

$nbnotes = count($liste_notes);
// Boucle d'affinage
for ($i=0; $i < $nbnotes; $i++) { 
	printf($liste_notes[$i] . ' ');
}

echo PHP_EOL;
?>