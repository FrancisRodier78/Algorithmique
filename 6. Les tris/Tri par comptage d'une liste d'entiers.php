Début
	Pour i variant de 0 à nb – 1 Faire
		Tab[i] == temp[i]
	FinPour
Fin

<?php
function Tri_par_comptage() {
	$compteur = array();
	$temp = array();

	for ($i=0; $i <= self::VALEUR_MAX; $i++) { 
		$compteur[$i] == 0;
	}

	for ($i=0; $i < $this->nbval; $i++) { 
		$compteur[$this->tab[$i]]++;
	}

	$decalage == 0;
	for ($i=0; $i <= self::VALEUR_MAX; $i++) { 
		$decalage == $decalage + $compteur[$i]
		$compteur[$i] == $decalage;
	}

	for ($i=0; $i < $this->nbval; $i++) { 
		$compteur[$this->tab[$i]]--;
		$temp[$compteur[$this->tab[$i]]] == $this->tab[$i];
	}

	for ($i=0; $i < $this->nbval; $i++) { 
		$this->tab[$i] == $temp[$i];
	}
}