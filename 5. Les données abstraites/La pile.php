<?php
echo "Exemple de class Pile voir le code."  . '<br />';

class CPile {
	protected $pile;

	public function __construct() {
		$this->pile = array();
	}

	function initialiser() {
		$this->pile = array();
	}

	function empiler($var) {
		array_push($this->pile, $var);
	}

	function depiler() {
		return array_pop($this->pile);
	}

	function pile_vide() {
		return count($this->pile) == 0;
	}
}

// voir la classe SplStack en liste doublement chainée et non en tableau
// add()
// count()
// current()
// isEmpty()
// next()
// pop()
// push()
// rewind()
// valid()

