<!DOCTYPE html>
  <html lang="fr" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="design/mangaTri.css">
  <link rel="stylesheet" href="design/main.css">
  <title>MangaStarter</title>
  </head>

<?php

require_once('header.view.html');

echo '<body>';
require_once('../model/MangaDAO.class.php');
$mangas = new MangaDAO('../model/data');

if (isset($_GET['cat'])){
  $categorie = $_GET['cat'];
  echo '<h1>'.$categorie.'</h1>';
$tableauMangas = $mangas->getCat($categorie)->fetchAll();
}

else if (isset($_GET['search'])){

  $search = $_GET['search'];
  $tableauMangas = $mangas->getSearch($search)->fetchAll();
}

require_once('../model/StockDAO.class.php');
$stocks = new StockDAO('../model/data');
echo '<container>';
foreach ($tableauMangas as $val) {

  $dispo = $stocks->getDispo($val['Reference'])->fetchAll()[0];

 echo '<div><a href="product.view.php?ref='.$val['Reference']
 .'"><img src="../model/data/images_manga/'.$val['Image'].'" alt="'.$val['Image']
 .'"><article><h2>'.$val['Titre'].'</h2><p>dispo dans '.$dispo[0].' magasins</p></article></a></div>';
}

echo '</container></body>';
require_once('footer.view.html');
?>
