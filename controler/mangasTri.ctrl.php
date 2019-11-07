<?php
require_once('../model/MangaDAO.class.php');
$mangas = new MangaDAO('../model/data');

//On choisi la première catégorie si quelqu'un ouvre la page sans donner de paramètres
if (!isset($_GET['search']) && !isset($_GET['cat'])){
  $titre = "Shonen";
  $tableauMangas = $mangas->getCat($titre)->fetchAll();
}
else if (isset($_GET['cat'])){
  $titre = $_GET['cat'];
  $tableauMangas = $mangas->getCat($titre)->fetchAll();
}
else if (isset($_GET['search'])){
  $search = $_GET['search'];
  //si la recherche ne donne rien on récupère et affiche l'exception
  try{
    $titre = $mangas->getMatch($search);
    $tableauMangas = $mangas->getSearch($titre)->fetchAll();
  }
  catch (Exception $e){
    $titre = '';
    $tableauMangas = $mangas->getSearch("")->fetchAll();
    echo $e->getMessage();
  }
}

require_once('../model/StockDAO.class.php');
$stocks = new StockDAO('../model/data');

require'../view/mangasTri.view.php';
require'../view/footer.view.html';
 ?>
