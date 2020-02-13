<?php
function Palindrome(string $phrase) {
	$phrase = str_replace(' ','',$phrase);

	if ($phrase == strrev($phrase)) {
		return true;
	} else {
		return false;
	}
}

// PGM
echo "Entrez une phrase";
//$phrase = trim(fgets(STDIN));
$phrase = 'azerty ytreza';

$est_palindrom = Palindrome($phrase);

if ($est_palindrom) {
	echo "C'est un palindrome".PHP_EOL;
} else {
	echo "Ce n'est pas un palindrome".PHP_EOL;
}


?>