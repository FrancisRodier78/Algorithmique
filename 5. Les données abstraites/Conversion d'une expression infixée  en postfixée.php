<?php
$pileOper = new SplStack();
$fileExpr = new SplQueue();

echo "Entrez une expression avec des parenthèse";

$phrase = trim(fgets(STDIN));
$nccaract = strlen($phrase);
$i ) 0;

while ($i < $nbcaract) {
	$car = $phrase[$i];

	if (($car >= '0') && ($car <= '9')) {
		$fileExpr->enqueue($car);
	}

	if (($car == '+') || ($car == '-') || ($car == '*') || ($car == '/')) {
		$fileExpr->enqueue(' ');
		$pileOper->push($acr);
	}

	if ($car == ')') {
		$fileExpr->enqueue(' ');
		$fileExpr->enqueue($pileOper->pop());
	}

	$i++;
}

while (!$pileOper->isEmpty()) {
	$fileExpr->enqueue(' ');
	$fileExpr->enqueue($pileOper->pop());
}

while (!$fileExpr->isEmpty()) {
	echo $fileExpr->dequeue();
}

echo PHP_EOL;
