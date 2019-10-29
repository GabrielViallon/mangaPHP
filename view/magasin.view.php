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
    <h2>Vos librairies de Grenoble :</h2>
    <?php
    require_once('../model/LibrairieDAO.class.php');
    $librairies = new LibrairieDAO('../model/data');
    $tableauLibrairies = $librairies->getAll()->fetchAll();

    foreach ($tableauLibrairies as $val) {

     echo '<div><h2>'.$val['Nom'].'</h2>&nbsp;|&nbsp;'.$val['Adresse'].'</div>';
    }
     ?>
   </body>
   <?php require_once('footer.view.html'); ?>
