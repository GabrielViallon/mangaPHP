<?php
require_once('../model/MangaDAO.class.php');
$mangas = new MangaDAO('../model/data');

if (isset($_GET['cat'])){
  $categorie = $_GET['cat'];
$tableauMangas = $mangas->getCat($categorie)->fetchAll();
}

else if (isset($_GET['search'])){
  $search = $_GET['search'];
  try{
  $tableauMangas = $mangas->getSearch($search)->fetchAll();
}
catch (Exception $e){
  echo $e->getMessage();
}
}

require_once('../model/StockDAO.class.php');
$stocks = new StockDAO('../model/data');

require'../view/mangasTri.view.php';
php require'../view/footer.view.html';
 ?>
