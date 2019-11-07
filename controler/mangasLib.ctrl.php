<?php

$libAdr = $_GET['lib'];

require_once('../model/LibrairieDAO.class.php');
$librairies = new LibrairieDAO('../model/data');
$librairie = $librairies->get($libAdr)->fetchAll()[0];

require_once('../model/StockDAO.class.php');
$stock = new StockDAO('../model/data');
$tableauRefs = $stock->getRef($libAdr)->fetchAll();

require_once('../model/MangaDAO.class.php');
$mangas = new MangaDAO('../model/data');

require_once('../model/StockDAO.class.php');
$stocks = new StockDAO('../model/data');

require'../view/mangasLib.view.php';
require'../view/footer.view.html';
?>
