<?php
// Saisie des notes
echo "Entrez une liste de nombres entier positifs".PHP_EOL;
echo "avec et sans doublons".PHP_EOL;
//$saisie = fgets(STDIN);
$saisie = "1 2 3 12 2";

// Suppression des espaces et du saut de ligne
$saisie = trim($saisie);

$tab = explode(' ', $saisie);

$nbelement = count($tab);
for ($i=0; $i < $nbelement; $i++) { 
	echo $tab[$i]." ";
}
echo PHP_EOL;

for ($i=0; $i < $nbelement; $i++) { 
	// on vérifie que cet élément n’a pas déjà été traité
	$trouvé = False;
	for ($j=0; $j < $i; $j++) { 
		if ($tab[$i] == $tab[$j]) {
			$trouvé = True;
		}
	}

	if (!$trouvé) {
		$occurrences = 1;
		for ($j=$i+1; $j < $nbelement; $j++) { 
			$occurrences += ($tab[$i] == $tab[$j]);
		}
		printf(", %5d : %3d occurrence(s)", $tab[$i], $occurrences);
		echo PHP_EOL;
	}
}
?>
