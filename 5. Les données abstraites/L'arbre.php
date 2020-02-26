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
		$this->donnee = $c
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