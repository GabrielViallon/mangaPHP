<!DOCTYPE html>
  <html lang="fr" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../view/design/magasin.css">
  <link rel="stylesheet" href="../view/design/main.css">
  <title>MangaStarter</title>
  </head>
  <?php include('header.view.html'); ?>
  <body>
    <h1>Vos librairies de Grenoble :</h1>
    <?php
    foreach ($tableauLibrairies as $val) {
     echo '<div><a href="mangasLib.view.php?lib='.$val['Adresse'].'"><h2>'.$val['Nom'].'</h2><p>| '.$val['Adresse'].'</p></a></div>';
    }
     ?>
