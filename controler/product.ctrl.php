<?php
//Si quelqu'un accède à la page sans donner de référence, la première est donnée
if(isset($_GET['ref'])){
  $refManga = $_GET['ref'];
}
else{
  $refManga = "1";
}

    require_once('../model/MangaDAO.class.php');
    $mangas = new MangaDAO('../model/data');
    $selectManga = $mangas->get($refManga)->fetchAll()[0];

    require_once('../model/StockDAO.class.php');
    $stocks = new StockDAO('../model/data');

    require_once('../model/LibrairieDAO.class.php');
    $librairies = new LibrairieDAO('../model/data');

    $stockLib = $stocks->getLibDispo($selectManga['Reference'])->fetchAll();

require'../view/product.view.php';
require'../view/footer.view.html';
?>
