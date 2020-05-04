<?php
function Palindrome(string $phrase, int $i, int $j) {
	while (($phrase[$i] == ' ') && ($i < strlen($phrase))) {
		$i++;
        echo "i : " . $i . '<br />';
	}

	while ($phrase[$j] == ' ') {
		$j--;
	}

	if ($i >= $j) {
		return TRUE;
	} else {
		if ($phrase[$i] == $phrase[$j]) {
		    $i++;
		    $j--;
			return Palindrome($phrase, $i, $j);
		} else {
			return FALSE;
		}
	}
}

// PGM
//echo "Entrez une phrase";
//$phrase = trim(fgets(STDIN));
$phrase = 'azertyytreza';
$l = strlen($phrase);

$est_palindrom = Palindrome($phrase,0,$l-1);

echo "phrase : " . $phrase . '<br />';
if ($est_palindrom) {
	echo "C'est un palindrome".PHP_EOL . '<br />';
} else {
	echo "Ce n'est pas un palindrome".PHP_EOL . '<br />';
}

$phrase = 'azertyeza';
$l = strlen($phrase);

$est_palindrom = Palindrome($phrase,0,$l-1);

echo "phrase : " . $phrase . '<br />';
if ($est_palindrom) {
    echo "C'est un palindrome".PHP_EOL . '<br />';
} else {
    echo "Ce n'est pas un palindrome".PHP_EOL . '<br />';
}

?>