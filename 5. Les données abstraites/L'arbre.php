<?php
class CNoeud {
	private $donnee;
	private $gauche;
	private $droite;

	public function __construct($c, CNoeud $gauche=null, CNoeud $droite=null) {
		$this->donnee = $c;
		$this->gauche = $gauche;
		$this->droite = $droite;
	}

	public function change_gauche(CNoeud $gauche=null) {
		$this->gauche = $gauche;
	}

	public function change_droit(CNoeud $droit=null) {
		$this->droit = $droit;
	}

	public function change_donnee($c) {
		$this->donnee = $c;
	}

	public function gauche() {
		return $this->gauche;
	}

	public function droit() {
		return $this->droit;
	}

	public function valeur() {
		return $this->donnee;
	}

	public function traiter($separateur) {
		echo $this->valeur().$separateur;
	}
}

class CArbre {
	private $racine;

	public function __construct() {
		$this->racine = null;
	}

	public function val_racine() {
		return $this->racine;
	}

	public function change_racine(CNoeud $noeud_courant) {
		$this->racine = $noeud_courant;
	}

	public function ParcoursPrefixe(CNoeud $noeud_courant, $separateur) {
		if ($noeud_courant != null) {
			$noeud_courant->Traiter($separateur);

			if ($noeud_courant->gauche() != null) {
				$this->ParcoursPrefixe($noeud_courant->gauche(), $separateur);
			}

			if ($noeud_courant->droit() != null) {
				$this->ParcoursPrefixe($noeud_courant->droit(), $separateur);
			}
		}
	}

	public function ParcoursInfixe(CNoeud $noeud_courant, $separateur) {
		if ($noeud_courant != null) {
			if ($noeud_courant->gauche() != null) {
				$this->ParcoursInfixe($noeud_courant->gauche(), $separateur);
			}

			$noeud_courant->Traiter($separateur);

			if ($noeud_courant->droit() != null) {
				$this->ParcoursInfixe($noeud_courant->droit(), $separateur);
			}
		}
	}

	public function ParcoursPostfixe(CNoeud $noeud_courant, $separateur) {
		if ($noeud_courant != null) {
			if ($noeud_courant->gauche() != null) {
				$this->ParcoursPostfixe($noeud_courant->gauche(), $separateur);
			}

			if ($noeud_courant->droit() != null) {
				$this->ParcoursPostfixe($noeud_courant->droit(), $separateur);
			}

			$noeud_courant->Traiter($separateur);
		}
	}

	public function ParcoursParNiveaux(CNoeud $noeud_courant, $separateur) {
		$UneFile = new CFile;
		$UneFile->initialiser_file();
		$UneFile->enfiler($noeud_courant);
		while (!$UneFile->vide()) {
			$noeud_courant = $UneFile->defiler();
			if ($noeud_courant->gauche() != null) {
				$UneFile->enfiler($noeud_courant->gauche());
			}

			$noeud_courant = $UneFile->defiler();
			if ($noeud_courant->droit() != null) {
				$UneFile->enfiler($noeud_courant->droit());
			}
		}
	}
}	

class CPile {
	private $pile;
	private $nbelements;

	public function __construct() {
		$this->pile = array();
		$this->nbelements = 0;
	}

	function initialiser_pile() {
		$this->nbelements = 0;	
	}

	function empiler($elements) {
		$this->pile[$this->nbelements] = $elements;
		$this->nbelements++;
	}

	function depiler() {
		$this->nbelements--;
		$elementARetourner = $this->pile[$this->nbelements];
		unset($this->pile[$this->nbelements]);

		return $elementARetourner;
	}

	function pile_vide() {
		if ($this->nbelements == 0) {
			return TRUE;			
		} else {
			return FALSE;
		}
	}
}

class CFile {
	private $file;
	private $debut_file, $fin_file;

	public function __construct () {
		$this->$file = array();
		$this->$debut_file = 0;
		$this->$fin_file = 0;
	}

	public function initialiser_file() {
		$this->$debut_file = 0;
		$this->$fin_file = 0;
	}

	public function enfiler(CNoeud $noeud_courant) {
		$this->file[$this->fin_file++] = $noeud_courant;
	}

	public function defiler() {
		return $this->file[$this->debut_file++];
	}

	public function file_vide() {
		if ($this->debut_file == $this->fin_file) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}
}

$UnePile = new CPile();
$UnePile->initialiser_pile();
$UnArbre = new CArbre();

echo "Entrez une expression postifixée : ";
$phrase = trim(fgets(STDIN));
$nbcaract = strlen($phrase);
for ($i=0; $i < $nbcaract; $i++) { 
	$caract = $phrase[$i];
	$nouveau_moeud = new CNoeud($caract);

	if (($caract == '+') || ($caract == '-') || ($caract == '/') || ($caract == '*')) {
		$nouveau_moeud->change_droit($UnePile->depiler());
		$nouveau_moeud->change_gauche($UnePile->depiler());
		$UnePile->empiler($nouveau_moeud);
	} else {
		if ($caract != ' ') {
			$UnePile->empiler($nouveau_moeud);
		}
	}
}

$UnArbre->change_racine($UnePile->depiler());

echo "Parcour Préfixe : ";
$UnArbre->ParcoursPrefixe($UnArbre->val_racine(),' ');
echo "PHP_EOL";

echo "Parcour Infixe : ";
$UnArbre->ParcoursInfixe($UnArbre->val_racine(),' ');
echo "PHP_EOL";

echo "Parcour Postfixe : ";
$UnArbre->ParcoursPostfixe($UnArbre->val_racine(),' ');
echo "PHP_EOL";

echo "Parcour par niveaux : ";
$UnArbre->ParcoursParNiveaux($UnArbre->val_racine(),' ');
echo "PHP_EOL";
?>