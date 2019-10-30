<!DOCTYPE html>
  <html lang="fr" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./design/product.css">
  <link rel="stylesheet" href="./design/main.css">
  <title>MangaStarter</title>
  </head>
<?php
    require_once('header.view.html');
    echo '<body><div>';
    $refManga = $_GET['ref'];

    require_once('../model/MangaDAO.class.php');
    $mangas = new MangaDAO('../model/data');
    $selectManga = $mangas->get($refManga)->fetchAll()[0];

    require_once('../model/StockDAO.class.php');
    $stocks = new StockDAO('../model/data');

    require_once('../model/LibrairieDAO.class.php');
    $librairies = new LibrairieDAO('../model/data');

    $stockLib = $stocks->getLibDispo($selectManga['Reference'])->fetchAll();

    echo '<img src="../model/data/images_manga/'.$selectManga['Image'].'" alt="">';
    echo '<article><h1>'.$selectManga['Titre'].'</h1><h2> écrit par : '.$selectManga['Auteur'].'</h2>';
    echo '<container><p>Reference '.$selectManga['Reference'].'</p>';
    echo '<p>'.$selectManga['Categorie'].', '.$selectManga['Genre'].'</p></container>';
    echo '<p>'.$selectManga['Resume'].'</p></article></div><div><h3>Disponibilité :</h3><ul>';

    foreach ($stockLib as $val){
      $nomLib = $librairies->get($val['LibrairieAddr'])->fetchAll()[0];
      echo '<li><p>'.$nomLib[0].' ('.$val['LibrairieAddr'].') :</p><p>'.$val['Dispo'].' exemplaires</p></li>';
    }
     ?>
   </ul>
 </div>
  </body>
  <?php require_once('footer.view.html'); ?>
