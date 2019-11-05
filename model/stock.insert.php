<!-- fichier utilisé seulement pour créer un fichier texte qui a été utilisé pour remplir la base de données -->
<?php
require_once('LibrairieDAO.class.php');
$librairies = new LibrairieDAO('data');
$tableauLibrairies = $librairies->getAll()->fetchAll();

require_once('MangaDAO.class.php');
$mangas = new MangaDAO('data');
$tableauMangas = $mangas->getAll()->fetchAll();

require_once('StockDAO.class.php');
$stock = new StockDAO('data');

foreach ($tableauLibrairies as $j) {
  $libAddr = $j['Adresse'];
  foreach ($tableauMangas as $i) {
    $mangaRef = $i['Reference'];
    $randNb = mt_rand(0, 8);
    echo $libAddr.'|'.$mangaRef.'|'.$randNb."\n";
  }
}
?>
