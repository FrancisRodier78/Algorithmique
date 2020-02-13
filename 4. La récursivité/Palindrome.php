<?php
function Palindrome(string $phrase, int $i, int $j) {
	while (($phrase[$i] == ' ') && ($i < strlen($phrase))) {
		echo $i;
		$i++;
	}

	while ($phrase[$j] == ' ') {
		echo $j;
		$j--;
	}

	if ($i >= $j) {
		return true;
	} else {
		if ($phrase[$i] = $phrase[$j]) {
			Palindrome($phrase, $i++, $j--);
		} else {
			return false;
		}
	}
}

// PGM
echo "Entrez une phrase";
//$phrase = trim(fgets(STDIN));
$phrase = 'azerty ytreza';
$l = strlen($phrase);

$est_palindrom = Palindrome($phrase,0,$l-1);

if ($est_palindrom) {
	echo "C'est un palindrome".PHP_EOL;
} else {
	echo "Ce n'est pas un palindrome".PHP_EOL;
}


?>