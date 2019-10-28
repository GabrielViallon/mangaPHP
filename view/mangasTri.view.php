<!DOCTYPE html>
  <html lang="fr" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./design/mangaTri.css">
  <link rel="stylesheet" href="./design/main.css">
  <title>MangaStarter</title>
  </head>

<?php
$categorie = $_GET['cat'];

require_once('header.view.html');

echo '<body><h1>'.$categorie.'</h1><container>';
require_once('../model/MangaDAO.class.php');
$mangas = new MangaDAO('../model/data');

if (isset($_GET['cat'])){
  $categorie = $_GET['cat'];
$tableauMangas = $mangas->getCat($categorie)->fetchAll();
}

else if (isset($_GET['search'])){

  $search = $_GET['search'];
  $tableauMangas = $mangas->getSearch($search)->fetchAll();
}

foreach ($tableauMangas as $val) {

 echo '<div><a href="product.view.php?ref='.$val['Reference']
 .'"><img src="../model/data/images_manga/'.$val['Image'].'" alt="'.$val['Image']
 .'">'.$val['Titre'].'</a></div>';
}

echo '</container></body>';
require_once('footer.view.html');
?>
