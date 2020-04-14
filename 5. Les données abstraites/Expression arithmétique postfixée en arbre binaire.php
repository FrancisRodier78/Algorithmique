<?php

class CNoeud {
	private $gauche;
	private $droite;
	private $operateur;
	private $valeur;

	public function __construct($ope;$val) {
		$this->valeur = $val;
		$this->operateur = $ope;
		$this->gauche = null;
		$this->droit = null;
	}

	public function change_gauche(CNoeud $gauche = null) {
		$this->gauche = $gauche;
	}

	public function change_droit(CNoeud $droit = null) {
		$this->droit = $droit;
	}

	public function change_val($_val) {
		$this->valeur = $_val;
	}

	public function change_ope($_ope) {
		$this->operateur = $_ope;
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

	public function get_ope() {
		return $this->operateur;
	}

	public function Traiter($separateur) {
		if ($this->get_ope() == '0') {
			echo $this->get_val().separateur;
		} else {
			echo $this->get_ope().separateur;
		}
	}
}

class CArbre {
	private $racine;

	public function __construct() {
		$this->racine = null;
	}

	public function change_racine(CNoeud $NdCourant) {
		$this->racine = $NdCourant;
	}

	public function ParcourPrefixe(CNoeud $NdCourant, $separateur) {
		if ($NdCourant != null) {
			$NdCourant->Traiter($separateur);

			if ($NdCourant->gauche() != null) {
				$this->ParcoursPrefixe($NdCourant->gauche(), $separateur);
			}

			if ($NdCourant->droit() != null) {
				$this->ParcoursPrefixe($NdCourant->droit(), $separateur);
			}
		}
	}

	public function ParcourInfixe(CNoeud $NdCourant, $separateur) {
		if ($NdCourant != null) {
			echo "(";

			if ($NdCourant->gauche() != null) {
				$this->ParcoursInfixe($NdCourant->gauche(), $separateur);
			}

			$NdCourant->Traiter($separateur);

			if ($NdCourant->droit() != null) {
				$this->ParcoursInfixe($NdCourant->droit(), $separateur);
			}

			echo ")";
		}
	}

	public function ParcourPostfixe(CNoeud $NdCourant, $separateur) {
		if ($NdCourant != null) {
			if ($NdCourant->gauche() != null) {
				$this->ParcoursPostfixe($NdCourant->gauche(), $separateur);
			}

			if ($NdCourant->droit() != null) {
				$this->ParcoursPostfixe($NdCourant->droit(), $separateur);
			}

			$NdCourant->Traiter($separateur);
		}
	}

	public function ParcourParNiveaux(CNoeud $NdCourant, $separateur) {
		$UneFile = new SplQueue;
		$UneFile->enqueue($NdCourant);

		while (!$UneFile->isEmpty()) {
			$NdCourant->Traiter($separateur);

			if ($NdCourant->gauche() != null) {
				$UneFile->enqueue($NdCourant->gauche());
			}

			if ($NdCourant->droit() != null) {
				$UneFile->enqueue($NdCourant->droit());
			}
		}
	}

	public function evaluer(CNoeud $NdCourant) {
		if ($NdCourant->get_ope() == '0') {
			$res = $NdCourant->get_val();
		} else {
			$valeur1 = $this->evaluer($NdCourant->gauche());
			$valeur2 = $this->evaluer($NdCourant->droit());
			
			if ($NdCourant->get_ope() == '+') {
				$res = $valeur1 + $valeur2;
			} else if ($NdCourant->get_ope() == '-') {
				$res = $valeur1 - $valeur2;
			} else if ($NdCourant->get_ope() == '*') {
				$res = $valeur1 * $valeur2;
			} else if ($NdCourant->get_ope() == '/') {
				$res = $valeur1 / $valeur2;
			}
		}
		return $res;
	}
}

// === Programme ===
$UnePile = new SplStack();
$UnArbre = new CArbre();

echo "Entrez une notation en polonaise inversée";
$phrase = trim(fgets(STDIN));
$nbcaract = strlen($phrase);
$i = 0;

while ($i < $nbcaract) {
	$car = $phrase($i);

	if (($car >= '0') && ($car <= '9')) {
		$chiffre = 0;
		$nombre = 0;
		while (($car >= '0') && ($car <= '9')) {
			$chiffre = ord($car) - 48;
			$nombre = (($nombre * 10) + $chiffre);
			$car = $phrase[++$i];
		}
		$NvNoeud = new CNoeud('0', $nombre);
		$UnePile->push($NvNoeud);
	} else if (($car == '+') || ($car == '-') || ($car == '*') || ($car == '/')) {
		$NvNoeud = new CNoeud($car,0);
		$NvNoeud->change_droit($UnePile->pop);
		$NvNoeud->change_gauche($UnePile->pop);
		$UnePile->push($NvNoeud);
	}
	
	$i++;
}

$UnArbre->change_racine($UnePile->pop());

echo "Parcours Préfixé : ";;
$UnArbre->ParcoursPrefixe($UnArbre->val_racine(), ' ');
echo PHP_EOL;

echo "Parcours Infixé : ";;
$UnArbre->ParcoursInfixe($UnArbre->val_racine(), ' ');
echo PHP_EOL;

echo "Parcours Postfixé : ";;
$UnArbre->ParcoursPostfixe($UnArbre->val_racine(), ' ');
echo PHP_EOL;

echo "Parcours par niveaux : ";;
$UnArbre->ParcoursParNiveaux($UnArbre->val_racine(), ' ');
echo PHP_EOL;

printf("Calcul de l'expression : %5.2f\n", $UnArbre->evaluer($UnArbre->val_racine()));
echo PHP_EOL;
?>