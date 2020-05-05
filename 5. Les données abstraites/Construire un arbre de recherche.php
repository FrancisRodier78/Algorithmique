<?php
class CNoeud {
	private $valeur;
	private $gauche;
	private $droit;

	public function __construct($nb, CNoeud $gauche = null, CNoeud $droit = null) {
		$this->valeur = $nb;
		$this->gauche = $gauche;
		$this->droit = $droit;
	}

	public function change_gauche(CNoeud $gauche = null) {
		$this->gauche = $gauche;
	}

	public function change_droit(CNoeud $droit = null) {
		$this->droit = $droit;
	}

	public function change_val($_valeur) {
		$this->valeur = $_valeur;
	}

	public function gauche() {
		return $this->gauche;
	}

	public function droit() {
		return $this->droit;
	}
	public function get_val() {
		return $this->valeur;
	}
}

class CArbre {
	private $racine;

	function __construct() {
		$this->racine = null;
	}

	public function val_racine() {
		return $this->racine;
	}

	public function ParcoursInfixe(CNoeud $NdCourant) {
		if ($NdCourant != null) {
			if ($NdCourant->gauche() != null) {
				$this->ParcoursInfixe($NdCourant->gauche());
			}

			printf("%4d ", $NdCourant->get_val());

			if ($NdCourant->droit() != null) {
				$this->ParcoursInfixe($NdCourant->droit());
			}
		}
	}

	public function ParcoursInfixeInverse(CNoeud $NdCourant) {
		if ($NdCourant != null) {
			if ($NdCourant->droit() != null) {
				$this->ParcoursInfixeInverse($NdCourant->droit());
			}

			printf("%4d ", $NdCourant->get_val());

			if ($NdCourant->gauche() != null) {
				$this->ParcoursInfixeInverse($NdCourant->gauche());
			}
		}
	}

	public function insertion_noeud($nombre) {
		$NvNoeud = new CNoeud($nombre);

		if ($this->racine == null) {
			$this->racine = $NvNoeud;
			printf("--%4d :racine --", $this->racine->get_val());
			echo PHP_EOL . '<br />';
		} else {
			$NdCourant = $this->racine;

			while ($NdCourant != null) {
				if ($NvNoeud->get_val() < $NdCourant->get_val()) {
					if ($NdCourant->gauche() == null) {
                        printf("-- %4d :fils gauche de --", $NvNoeud->get_val());
                        printf("%4d --", $NdCourant->get_val());
                        echo PHP_EOL . '<br />';
						$NdCourant->change_gauche($NvNoeud);
						$NdCourant = null;
					} else {
						$NdCourant = $NdCourant->gauche();
					}
				} else {
					if ($NdCourant->droit() == null) {
                        printf("-- %4d :fils droit de --", $NvNoeud->get_val());
                        printf("%4d --", $NdCourant->get_val());
                        echo PHP_EOL . '<br />';
						$NdCourant->change_droit($NvNoeud);
						$NdCourant = null;
					} else {
						$NdCourant = $NdCourant->droit();
					}
				}
			}
		}
	}

	public function recherche_arbre($nombre) {
		$NdTrouve = null;
		$NdCourant = $this->racine;

		while ($NdCourant != null) {
		    echo "NdCourant == " . $NdCourant->get_val() . '<br />';
			if ($NdCourant->get_val() == $nombre) {
				$NdTrouve = $NdCourant;
				$NdCourant = null;
			} else if ($nombre < $NdCourant->get_val()) {
				$NdCourant = $NdCourant->gauche();
                echo "... NdCourant gauche == " . $NdCourant->get_val() . '<br />';
			} else {
				$NdCourant = $NdCourant->droit();
                echo "... NdCourant droit == " . $NdCourant->get_val() . '<br />';
			}
		}

        return $NdTrouve;
	}
}

// === Programme principal ===
$Arbre = new CArbre;

//echo "Entrez une suite de valeur.";
//$saisie = fgets(STDIN);
$saisie = "2 4 8 6 3 1 7 5 9";
$saisie = trim($saisie);
echo "Affichage des données : ".$saisie.PHP_EOL . '<br />';
$liste_notes = explode(' ', $saisie);
$nbnotes = count($liste_notes);
for ($i=0; $i < $nbnotes; $i++) { 
	$Arbre->insertion_noeud($liste_notes[$i]);
}

//echo "Entrez une valeur à rechercher.";
//fscanf(STDIN, "%d", $nb);
$nb = 5;
$NdRecherche = $Arbre->recherche_arbre($nb);
if ($NdRecherche != null) {
	echo $nb." trouvé".PHP_EOL . '<br />';
} else {
	echo $nb." non trouvé".PHP_EOL . '<br />';
}

echo "Affichage des données triées : ".PHP_EOL . '<br />';
$Arbre->ParcoursInfixe($Arbre->val_racine());
echo PHP_EOL . '<br />';

echo "Affichage des données triées inversées: ".PHP_EOL . '<br />';
$Arbre->ParcoursInfixeInverse($Arbre->val_racine());
echo PHP_EOL . '<br />';

?>