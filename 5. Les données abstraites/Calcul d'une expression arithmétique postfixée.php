<?php
class CPile
{
	protected $pile;

	public function __construct()
	{
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

$pile = new CPile;
$pile->initialiser();

if ($var == '-' or $var == '+' or $var == '/' or $var == '*') {
	$i = $pile->depiler();
	$j = $pile->depiler();

	if ($var == '-') {
		$k = $j - $i;
	}

	if ($var == '+') {
		$k = $j - $i;
	}

	if ($var == '/') {
		$k = $j - $i;
	}

	if ($var == '*') {
		$k = $j - $i;
	}

	$k = $var;
}

$pile->empiler($var);
