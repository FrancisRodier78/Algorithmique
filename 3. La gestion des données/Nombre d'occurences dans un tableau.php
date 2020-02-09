<?php
// Saisie des notes
echo "Entrez une liste de nombres entier positifs".PHP_EOL;
echo "avec et sans doublons".PHP_EOL;
$saisie = fgets(STDIN);

// Suppression des espaces et du saut de ligne
$saisie = trim($saisie);

$tab = explode(' ', $saisie);

$nbelement = count($tab);
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
		for ($k=$i+1; $k < $nbelement; $k++) { 
			if ($tab[$i] == $tab[$j]) {
				$occurrences++;
			}
		}
		printf($tab[$i], " : ", $occurrences, " occurrence(s)");
	}
}
?>
