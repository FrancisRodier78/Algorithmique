<?php
	// Saisie des données initiales
	$nb = 17;

	if ($nb < 2) {
		echo "nb doit être supérieur à 1 !";
	} else {
		$limite = (int) sqrt($nb) + 1;
		$nb_iteration = 0;
		$trouve = false;

		if ($nb != 2) {
			$reste = (int) $nb % 2;
			if ($reste == 0) {
				$trouve = true;
				$diviseur1 = 2;
				$diviseur2 = $nb / 2;
			} else {
				$i = 3;
				while ((!$trouve) && ($i <= $limite)) {
					$nb_iteration++;
					$reste = (int) $nb % $i;
					if ($reste == 0) {
						$trouve = true;
						$diviseur1 = $i;
						$diviseur2 = $nb / $i;
					}
					$i += 2;
				}
			}
		}

		if ($trouve) {
			echo $nb . ' n\'est pas premier, car divisible par ' . $diviseur1 . ' et ' . $diviseur2 . ' !' . '<br />';
		} else {
			echo $nb . ' est premier !' . '<br />';
		}
		
		echo 'Résultat obtenue en ' . $nb_iteration . ' itération.' . '<br />';
	}
?>