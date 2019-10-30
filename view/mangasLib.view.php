<!DOCTYPE html>
  <html lang="fr" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./design/mangaTri.css">
  <link rel="stylesheet" href="./design/main.css">
  <title>MangaStarter</title>
  </head>
<?php
    $libAdr = $_GET['lib'];

    require_once('header.view.html');

    require_once('../model/LibrairieDAO.class.php');
    $librairies = new LibrairieDAO('../model/data');
    $librairie = $librairies->get($libAdr)->fetchAll()[0];

    echo '<body><h1>Les mangas dispos à '.$librairie['Nom'].'</h1><container>';

    require_once('../model/StockDAO.class.php');
    $stock = new StockDAO('../model/data');
    $tableauRefs = $stock->getRef($libAdr)->fetchAll();

    require_once('../model/MangaDAO.class.php');
    $mangas = new MangaDAO('../model/data');

    require_once('../model/StockDAO.class.php');
    $stocks = new StockDAO('../model/data');


    foreach ($tableauRefs as $ref) {

      $nbMangas = $stocks->getNb($ref['Ref'], $librairie['Adresse'])->fetchAll()[0];
      $manga = $mangas->get($ref['Ref'])->fetchAll()[0];

     echo '<div><a href="product.view.php?ref='.$manga['Reference']
     .'"><img src="../model/data/images_manga/'.$manga['Image'].'" alt="'.$manga['Image']
     .'"><article><p>'.$manga['Titre'].'</p><p>'.$nbMangas['Dispo'].' exemplaires</p></article></a></div>';
    }

    echo '</container></body>';
    require_once('footer.view.html');
    ?>