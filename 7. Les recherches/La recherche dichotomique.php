<?php
class CTabvaleurs {
	const NON_TROUVE = -1;
	private $tab;
	private $debut;
	private $fin;
	private $valrech
	private $milieu;
	private resultat;

	public function __construct() {
		$this->tab array();
		$this->debut = 0;
		$this->fin = 0;
		$this->valrech = 0;
		$this->milieu = 0;
		$this->resultat = 0;
	}

	function get_deb() {
		return 0;
	}

	function get_fin() {
		return $this->nbval - 1;
	}

	function affiche_res($numero, $valrech) {
		if ($numero == self::NON_TROUVE) {
			echo $valrech." non trouvé !".PHP_EOL;
		} else {
			$numero++;
			echo $valrech." trouvé en position ".$numero;
			echo "de la liste triée".PHP_EOL;
		}
	}

	function affichage($debut, $fin) {
		for ($i=$debut; $i < $fin; $i++) { 
			printf("%4d", $this->tab_valeurs[$i]);
			echo PHP_EOL;
		}
	}

	function chargement() {
		echo "Entrez une liste.";
		$saisie = trim(fgets(STDIN));
		$this->tab_valeurs = explode(' ', $saisie);
		$this->nbval = count($this->tab_valeurs);
	}

	function tri_insertion() {
		for ($i=0; $i < $this->nbval; $i++) { 
			$val = $this->tab_valeur[$i];
			$j = $i;
			while (($j > 0) && ($val < $this->tab_valeurs[$j - 1])) {
				$this->tab_valeurs[$j] = $this->tab_valeurs[$j - 1];
				$j--;
			}
			$this->tab_valeurs[$j] = $val;
		}
	}

	function recherche_dichotomique($debut, $fin, $valrech) {
		$milieu = intval(($debut + $fin)/2);
		if ($valrech == $this->tab_valeurs[$milieu]) {
			$resultat == $milieu;
		} elseif ($debut >= $fin) {
			$resultat = self::NON_TROUVE;
		} elseif ($valrech < $this->tab_valeurs[$milieu]) {
			$resultat = $this->recherche_dichotomique($debut, $milieu - 1, $valrech);
		} else {
			$resultat = $this->recherche_dichotomique($milieu - 1, $fin, $valrech);
		}

		return $resultat;
	}
}

// --- Programme ---
$liste = new CTabvaleurs();
$liste->chargement();
$liste->tri_insertion();
$liste->affichage();
echo "Entrez une valeur à rechercher : ";
fscanf(STDIN, "%d", $val_recherche);
$numcase = $liste->recherche_dichotomique($liste->get_deb(), $liste->get_fin(), $valrech);
$liste->affichage_res($numcase, $valrech);
?>