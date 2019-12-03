<?php
	// Saisie des données initiales
	$Capital = 100000;
	$NbAn = 12;
	$TauxAnnuel = 2.3;
	$TauxAssurance = 0.35;

	// Calculs
	$NbMois = $NbAn*12;
	$TauxMensuel = ($TauxAnnuel / 100) / 12;
 	$calcul1 = $Capital * $TauxMensuel;
	$calcul2 = (1 + $TauxMensuel) ** $NbMois;
	$calcul3 = $calcul2 - 1;
	$CoutAss = ($Capital * ($TauxAssurance / 100) / 12);
	$MensualiteHA = ($calcul1 * ($calcul2 * $calcul3));
	$MensualiteAC = $MensualiteHA + $CoutAss;

	// Affichage de la mensualité
	echo 'Mensualité Hors Assurance : ' . $MensualiteHA . '<br />';
	echo 'Coût Assurance par mois : ' . $CoutAss . '<br />';
	echo 'Mensualité Aves Assurance : ' . $MensualiteAC . '<br />';

	// Affichage de tableau d’amortissement
	$CapRestant = $Capital;
	printf ('/ Mensualité     / Amortissement  / Intérêt        / Capital        / Ass.           /' . '<br />');

	for ($i=0;$i < $NbMois; $i++) { 
		$calcul1 = $CapRestant * $TauxMensuel;
		$calcul2 = (1 + $TauxMensuel) ** ($NbMois - $i);
		$calcul3 = $calcul2 - 1;
		$MensualitéHA = ($calcul1 * ($calcul2 / $calcul3));
		$MensualitéAC = $MensualitéHA + $CoutAss;
		$Interet = $calcul1;
		$Amortiss = $MensualiteHA - $Interet;
		$CapRestant = $CapRestant - $Amortiss;

		printf(" / " . $MensualiteAC . " / " . $Amortiss . " / " . $Interet . " / " . $CapRestant . " / " . $CoutAss . " / " . '<br />');
	}

	// $ php Amortissement.php
?>