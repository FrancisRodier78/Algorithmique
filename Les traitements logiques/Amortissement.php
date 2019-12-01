<?php
	// Saisie des données initiales
	var $Capital = 100000;
	var $NbAn = 12;
	var $TauxAnnuel = 2.3;
	var $TauxAssurance = 0.35;

	// Calculs
	$NbMois = NbAn*12;
	$TauxMensuel = (TauxAnnuel/100)/12;
 	$calcul1 = Capital*TauxMensuel;
	$calcul2 = (1+TauxMensuel)**NbMois;
	$calcul3 = calcul2-1;
	$CoutAss = (Capital*(TauxAssurance/100)/12);
	$MensualiteHA = (calcul1*(calcul2*calcul3));
	$MensualiteAC = MensualitéHA+CoutAss;

	// Affichage de la mensualité
	echo "string";
	echo "Mensualité Hors Assurance : ", $MensualiteHA;
	echo "Coût Assurance par mois : ", $CoutAss;
	echo "Mensualité Aves Assurance : ", $MensualiteAC;

	// Affichage de tableau d’amortissement
	$CapRestant = $Capital;
	printf ("Mensualité", "Amortissement", "Intérêt", "Capital", "Ass.");

	for ($i=0;$i < NbMois; $i++) { 
		$calcul1 = $CapRestant * $TauxMensuel;
		$Calcul2 = (1 + $TauxMensuel) ** ($NbMois - i);
		$Calcul3 = $calcul2 - 1;
		$MensualitéHA = ($calcul1 * ($calcul2 / $calcul3));
		$MensualitéAC = $MensualitéHA + $CoutAss;
		$Intérêt = $calcul1;
		$Amortiss = $MensualitéHA - $Intérêts;
		$CapRestant = $CapRestant - $Amortiss;

		printf(MensualitéAC, ’’ ‘’, Amortiss, ‘’ ‘’, Intérêts, ‘’ ‘’, CapRestant, ‘’ ‘’, CoutAss);
	}

	// $ php Amortissement.php
?>