<?php
//Si quelqu'un accède à la page sans choisir de librairie, la première est choisie
if (isset($_GET['lib'])){
  $libAdr = $_GET['lib'];
}
else{
  $libAdr = "19 Avenue Alsace Lorraine, 38000 Grenoble";
}

require_once('../model/LibrairieDAO.class.php');
$librairies = new LibrairieDAO('../model/data');
$librairie = $librairies->get($libAdr)->fetchAll()[0];

require_once('../model/StockDAO.class.php');
$stock = new StockDAO('../model/data');
$tableauRefs = $stock->getRef($libAdr)->fetchAll();

require_once('../model/MangaDAO.class.php');
$mangas = new MangaDAO('../model/data');

require'../view/mangasLib.view.php';
require'../view/footer.view.html';
?>
