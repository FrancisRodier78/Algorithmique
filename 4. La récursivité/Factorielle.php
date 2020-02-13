<?php
function factorielle($nb) {
	if ($nb < 0) {
		$res = 0;
	} else {
		if (($nb = 1) || ($nb = 0)) {
			$res = 1;
		} else {
			$res = $nb * factorielle;
		}
	}

	return $res;
}

// PGM
echo "Entrez un nombre";
fscanf(STDIN, "%d", $N);

$resultat = factorielle($N);

printf("%d! = %d", $N, $resultat);
echo PHP_EOL;
?>