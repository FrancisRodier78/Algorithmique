<?php
class CAnagramme {
	private $anagramme;
	private $taille;

	function __construct(argument) {
		$this->anagramme = array;
		$this->taille = 0;
	}

	function lecture {
		echo "Entrez un mot.";
		$this->anagramme = trim(fgets(STDIN));
		$this->taille = strlen($this->anagramme);
	}

	function affichage {
		echo "Anagramme : ".$this->anagramme.PHP_EOL;
	}

	function tri_a_bulle {
		for ($i = $this->taille - 1; $i < 1; $i--) { 
			for ($j = 1; $j < $i; $j++) { 
				if ($this->anagramme[j-1] > $this->anagramme[j]) {
					$car = $this->anagramme[j];
					$this->anagramme[j] = $this->anagramme[j-1];
					$this->anagramme[j] = $car;
				}
			}
			echo "- ".$this->anagramme." -".PHP_EOL;
		}
	}
}

// === Programme ===
$Texte_Anagramme = new CAnagramme();
$Texte_Anagramme->lecture();
$Texte_Anagramme->tri_a_bulle();
$Texte_Anagramme->affichage();
