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

