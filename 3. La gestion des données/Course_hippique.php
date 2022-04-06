<?php
// === Classe Cheval ===
class CCheval {
	// Attributs
	protected $dossard;
	protected $nom;
	protected $temps;
	protected $classement;

	public function __construct($dossard, $nom) {
		$this->dossard = $dossard;
		$this->nom = $nom;
		$this->temps = $temps;
		$this->classement = $classement;
	}

	public function afficher() {
		printf("%-15s %5d   ", $this->nom, $this->dosard);
		printf("%5.2f %5d", $this->temps, $this->classement);
		echo PHP_EOL;
	}
}

// == Programme ===
$Liste_chevaux = new SplDoublyLinkedList();
$saisie = "saisie non vide";
while (!empty($saisie)) {
	echo "Dossard du cheval (ENTREE pour terminer) : ";
	$saisie = trim(fgets(STDIN));
	if (!empty($saisie)) {
		$dossard = intval($saisie);
		echo "Nom du cheval.";
		$nom = trim(fgets(STDIN));

		$cheval = new CCheval($dossard,$nom);
		$Liste_chevaux->push($cheval);
	}
}

if ($Liste_chevaux->count() != 0) {
	echo "--- Liste des cheveaux ---";
	echo "nom   dossard   temps   classement";
	for ($Liste_chevaux->rewind(); $Liste_chevaux->valid(); $Liste_chevaux->next()) { 
		$cheval = $Liste_chevaux->current();
		$cheval->afficher();
	}
}
?>
