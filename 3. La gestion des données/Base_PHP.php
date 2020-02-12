<?php
echo "Nombre à convertir";;
fscanf(STDIN, "%d", $nb);
$nb_initial = $nb;
echo "Base de conversion";
fscanf(STDIN, "%d", $base);

if (($base > 1) && ($base < 37)) {
	$quotient = 1;
	$affichage = "";
	while ($quotient != 0) {
		$quotient = (int) ($nb/$base);
		$reste = $nb - ($quotient * $base);
		$nb = $quotient;

		if ($reste >= 0 && $reste <= 9) {
			$digit = chr($reste + 48);
		} else {
			$digit = chr($reste + 55);
		}
		
		$affichage = $digit.$affichage;
	}

	echo $nb_initial." en base ".$base." = ".$affichage.PHP_EOL;
} else {
	echo "La base doit être comprise entre 2 et 36".PHP_EOL;
}

?>