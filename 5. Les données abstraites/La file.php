Procédure initialiser_file()<?php
// utilisation de SplQueue

$File = new SplQueue;
echo "Entrez un nom de ville";
$phrase = trim(fgets(STDIN));

$nbcaract = strlen($phrase);
for ($i=0; $i < $nbcaract; $i++) { 
	$caract = $phrase[$i];
	echo "Ajout de :".$caract.PHP_EOL;
	$File->enqueue($caract);
}

echo "Taille de la file : ".$File->count().PHP_EOL;

// Parcour de la File
echo "Contenu de la File".PHP_EOL;
$File->rewind();
while ($File->valid()) {
	echo "Valeur suivante".$File->current().PHP_EOL;
	$File->next();
}

while (!File->isEmpty()) {
	echo "Suppression de : ".$File->dequeue()." ==> Reste ".$File->count()." élément(s)".PHP_EOL;
}

