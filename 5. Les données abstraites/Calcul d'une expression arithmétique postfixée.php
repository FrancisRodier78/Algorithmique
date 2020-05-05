<?php
$pile = new SplStack;

echo("Entrez une expression arithmétique en notation") . '<br />';
echo("polonaise inversée") . '<br />';
//$phrase = trim(fgets(STDIN));
//$phrase = "35+45-76-//";
$phrase = "3 12 3 - 3 / 1 - *";
$nbcaract = strlen($phrase);
$i = 0;

while ($i < $nbcaract) {
	$car = $phrase[$i];

	if ($car == '+') {
		$pile->push($pile->pop() + $pile->pop());
	}

	if ($car == '-') {
		$n1 = $pile->pop();
		$n2 = $pile->pop();
		$pile->push($n2 - $n1);
	}

	if ($car == '*') {
		$pile->push($pile->pop() * $pile->pop());
	}

	if ($car == '/') {
		$n1 = $pile->pop();
		$n2 = $pile->pop();
		$pile->push($n2 / $n1);
	}

	if (($car >= '0') && ($car <= '9')) {
		$chiffre = 0;
		$nombre = 0;

		while (($car >= '0') && ($car <= '9')) {
			$chiffre = ord($car) - 48;
			$nombre = (($nombre*10) + $chiffre);
			$car = $phrase[++$i];
		}

		$pile->push($nombre);
	}

	$i++;
}

printf("Résultat = %5.2f\n", $pile->pop()) . '<br />';
