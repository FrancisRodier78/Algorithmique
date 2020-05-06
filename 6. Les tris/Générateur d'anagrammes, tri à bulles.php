<?php
class CAnagramme {
	private $anagramme;
	private $taille;

	function __construct() {
		$this->anagramme = array();
		$this->taille = 0;
	}

	function lecture() {
		echo "Entrez un mot.";
//		$this->anagramme = trim(fgets(STDIN));
        $phrase = "azerty";
        $this->anagramme = trim($phrase);
		$this->taille = strlen($this->anagramme);
	}

	function affichage() {
		echo "Anagramme : ".$this->anagramme.PHP_EOL . '<br />';
	}

	function tri_a_bulle() {
		for ($i = $this->taille - 1; $i > 0; $i--) {
			for ($j = 1; $j <= $i; $j++) {
				if ($this->anagramme[$j-1] > $this->anagramme[$j]) {
					$car = $this->anagramme[$j];
					$this->anagramme[$j] = $this->anagramme[$j-1];
					$this->anagramme[$j-1] = $car;
				}
			}
			echo "- ".$this->anagramme." -".PHP_EOL . '<br />';
		}
	}
}

// === Programme ===
$Texte_Anagramme = new CAnagramme();
$Texte_Anagramme->lecture();
$Texte_Anagramme->tri_a_bulle();
$Texte_Anagramme->affichage();
