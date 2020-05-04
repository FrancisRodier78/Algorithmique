<?php
function factorielle($nb) {
	if ($nb < 0) {
		$res = 0;
	} else {
		if (($nb == 1) || ($nb == 0)) {
			$res = 1;
		} else {
			$res = $nb * factorielle($nb-1);
		}
	}

	return $res;
}

// PGM
//echo "Entrez un nombre";
//echo PHP_EOL . '<br />';

//fscanf(STDIN, "%d", $N);
$N = 10;

$resultat = factorielle($N);

printf("%d! = %d", $N, $resultat);
echo PHP_EOL . '<br />';
?>