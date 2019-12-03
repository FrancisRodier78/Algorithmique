<?php
	$N = 12;
	$result = 1;
	for ($i=1; $i < $N; $i++) { 
		$result = $result * $i;
	};
	echo 'Factorielle de '. $N. ' = '. $result;
?>