<!DOCTYPE html>
  <html lang="fr" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./design/magasin.css">
  <link rel="stylesheet" href="./design/main.css">
  <title>MangaStarter</title>
  </head>
  <?php require_once('header.view.html'); ?>
  <body>
    <h1>Vos librairies de Grenoble :</h1>
    <?php
    require_once('../model/LibrairieDAO.class.php');
    $librairies = new LibrairieDAO('../model/data');
    $tableauLibrairies = $librairies->getAll()->fetchAll();

    foreach ($tableauLibrairies as $val) {

     echo '<div><a href="mangasLib.view.php?lib='.$val['Adresse'].'"><h2>'.$val['Nom'].'</h2><p>| '.$val['Adresse'].'</p></a></div>';
    }
     ?>
   </body>
   <?php require_once('footer.view.html'); ?>
