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
    $librairie = $librairies->get($libAdr);
    var_dump($librairie);

    echo '<body><h1>Les mangas dispos à '.$librairie['Nom'].'</h1><container>';

    require_once('../model/StockDAO.class.php');
    $stock = new StockDAO('data');
    $tableauRefs = $stock->getRef($libAdr)->fetchAll();

    require_once('../model/MangaDAO.class.php');
    $mangas = new MangaDAO('data');

    foreach ($tableauRefs as $ref) {

      $manga = $mangas->get($ref)->fetchAll()[0];

     echo '<div><a href="product.view.php?ref='.$manga['Reference']
     .'"><img src="../model/data/images_manga/'.$manga['Image'].'" alt="'.$manga['Image']
     .'">'.$manga['Titre'].'</a></div>';
    }

    echo '</container></body>';
    require_once('footer.view.html');
    ?>
