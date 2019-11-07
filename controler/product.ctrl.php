<?php
    $refManga = $_GET['ref'];

    require_once('../model/MangaDAO.class.php');
    $mangas = new MangaDAO('../model/data');
    $selectManga = $mangas->get($refManga)->fetchAll()[0];

    require_once('../model/StockDAO.class.php');
    $stocks = new StockDAO('../model/data');

    require_once('../model/LibrairieDAO.class.php');
    $librairies = new LibrairieDAO('../model/data');

    $stockLib = $stocks->getLibDispo($selectManga['Reference'])->fetchAll();

require'../view/product.view.php';
require'footer.view.html';
?>
