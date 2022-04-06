<?php
function Tri_par_comptage() {
	$compteur = array();
	$temp = array();

	//for ($i=0; $i <= self::VALEUR_MAX; $i++) {
	for ($i=0; $i <= 4; $i++) {
        	$compteur[$i] = 0;
	}

	for ($i=0; $i < $this->nbval; $i++) { 
		$compteur[$this->tab[$i]]++;
	}

	$decalage = 0;
	//for ($i=0; $i <= self::VALEUR_MAX; $i++) {
	for ($i=0; $i <= 4; $i++) {
		$decalage += $compteur[$i];
		$compteur[$i] = $decalage;
	}

	for ($i=0; $i < $this->nbval; $i++) {
		$j = --$compteur[$this->tab[$i]];
		$temp[$j] = $this->tab[$i];
	}

	for ($i=0; $i < $this->nbval; $i++) { 
		$this->tab[$i] = $temp[$i];
	}
}

echo "function Tri_par_comptage()";
