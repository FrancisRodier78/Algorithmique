<?php
function deplacer($nb_disque, $depart, $arrive, $intermediaire) {
	static $coup = 0;
	if ($nb_disque == 1) {
		printf("%4d      %d -> %d/n", ++$coup, $depart, $arrive) . '<br />';
	} else {
		deplacer($nb_disque-1, $depart, $intermediaire, $arrive);
		deplacer(1, $depart, $arrive, $intermediaire);
		deplacer($nb_disque-1, $intermediaire, $arrive, $depart);
	}
	
}

// PGM
//echo "Entrez le nombre de disques" . '<br />';
//fscanf(STDIN, "%d", $nbd);
$nbd = 3;
deplacer($nbd,1,3,2);
echo " coup    déplacement".PHP_EOL . '<br />';
echo "--------------------".PHP_EOL . '<br />';
?>