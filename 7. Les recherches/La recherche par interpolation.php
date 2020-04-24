<?php
function recherche_interpolation(début, fin, valrech)
	decalage = 1;
	while (($decalage >= 0) && ($debut <= $fin)) {
		$x = $this->tab_valeurs[$fin] - $this->tab_valeurs[$debut];
		
		if ($x > 0.0) {
			$y = ($fin - $debut) / $x;
		} else {
			$y = 0.0;
		}

		$decalage = intval((($valrech - tab_valeurs[$debut]) * $y));
		$borne = $debut + $decalage;

		if ((($borne >= 0) && ($valrech == $this->tab_valeurs[$borne]))) {
			return $borne;
		} else {
			$debut = $borne + 1;
		}
	}

	return self::NON_TROUVE;
