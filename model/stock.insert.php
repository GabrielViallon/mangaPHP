<?php
//Ayant essayé de nombreuses techniques différentes pour réaliser un insert into avec un fonction sans résussite
//On récupère le texte généré par ce code dans un fichier texte qui a ensuite été inséré manuellement dans la BD
//Il n'est présent dans le projet que pour montrer notre raisonnement mais jamais utilisé par un controlleur
require_once('LibrairieDAO.class.php');
$librairies = new LibrairieDAO('data');
$tableauLibrairies = $librairies->getAll()->fetchAll();

require_once('MangaDAO.class.php');
$mangas = new MangaDAO('data');
$tableauMangas = $mangas->getAll()->fetchAll();

require_once('StockDAO.class.php');
$stock = new StockDAO('data');

//on parcours les librairies pour récupérer leur adresse
foreach ($tableauLibrairies as $j) {
  $libAddr = $j['Adresse'];
  //en parcourant les mangas pour chaque librairie pour récupérer leur ref
  foreach ($tableauMangas as $i) {
    $mangaRef = $i['Reference'];
    //on génère un entier aléatoire entre 0 et 8 qui représentera la disponibilité du manga dans la libriairie.
    $randNb = mt_rand(0, 8);
    echo $libAddr.'|'.$mangaRef.'|'.$randNb."\n";
    //ce fichier texte aidera à remplir la table stock de notre BD
  }
}
?>
