<?php
class CTabvaleurs {
	private $tab_valeur;
	private $nbval;
	private $val_gauche;
	private $val_droite;

	public function __construct() {
		$this->tab_valeur = array();
		$this->nbval = 0;
		$this->val_gauche = -1;
		$this->val_droite = -1;
	}

	function gauche() {
		if ($this->val_gauche == -1) {
			$this->val_gauche = 0;
		}

		return $this->val_gauche;
	}

	function droite() {
		if ($this->val_droite == -1) {
			$this->val_droite = $this->nbval - 1;
		}

		return $this->val_droite;
	}

	function chargement() {
		//echo "Entrez une liste.";
		//$saisie = trim(fgets(STDIN));
        $saisie = "9 5 7 3 1";
        echo "Saisie : " . $saisie . '<br />';
		$this->tab_valeurs = explode(' ', $saisie);
		$this->nbval = count($this->tab_valeurs);
	}

	function affichage($debut, $fin) {
		for ($i=$debut; $i <= $fin; $i++) {
			printf("%4d", $this->tab_valeurs[$i]);
			echo PHP_EOL . '<br />';
		}
	}

	function tri_rapide($_gauche, $_droite) {
		if ($_gauche < $_droite) {
			$pivot = $this->partition($_gauche, $_droite);
			$this->tri_rapide($_gauche, $pivot - 1);
			$this->tri_rapide($pivot + 1, $_droite);
		}
	}

	function partition($_gauche, $_droite) {
		$clef = $this->tab_valeurs[$_droite];
		$i = $_gauche - 1;
		$j = $_droite;
		while ($i <= $j) {
			while (((++$i) < $_droite) && ($this->tab_valeurs[$i] < $clef));
			while (((--$j) > $_gauche - 1) && ($this->tab_valeurs[$j] > $clef));
			if ($i < $j) {
				$temp = $this->tab_valeurs[$i];
				$this->tab_valeurs[$i] = $this->tab_valeurs[$j];
				$this->tab_valeurs[$j] = $temp;
			}
		}

			$temp = $this->tab_valeurs[$i];
			$this->tab_valeurs[$i] = $this->tab_valeurs[$_droite];
			$this->tab_valeurs[$_droite] = $temp;

			return $i;
	}
}

// === Programme ===
$liste = new CTabvaleurs();
$liste->chargement();
$liste->tri_rapide($liste->gauche(), $liste->droite());
$liste->affichage($liste->gauche(), $liste->droite());
