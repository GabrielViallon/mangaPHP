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
    echo '<img src="../model/data/images_manga/'.$selectManga['Image'].'" alt="">';
    echo '<article><h2>'.$selectManga['Titre'].'</h2>';
    echo '<p>Auteur : '.$selectManga['Auteur'].'</p>';
    echo '<p>Résumé : '.$selectManga['Resume'].'</p>';
     ?>
     </article>
   </div>
  </body>
  <?php require_once('footer.view.html'); ?>
