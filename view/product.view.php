<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./design/product.css">
    <title>MangaStarter</title>
    </head>
    <body>
    <header>
      <article>
      <h1>Bienvenue chez</h1>
      <a href="accueil.view.php"><img src="../model/data/Logo.jpg" alt=""><h1>Manga Starter !</h1></a>
    </article>
      <div>
        <ul>
            <li><a href="#">Magasin</a></li>
            <li><a href="#">Shonen</a></li>
            <li><a href="#">Seinen</a></li>
            <li><a href="#">Light Novel</a></li>
            <li><a href="#">Kodomo</a></li>
        </ul>
        <input type="text" placeholder="Rechercher...">
      </div>
    </header>
  <body>
    <?php
    $imgManga = $_GET['img'];
    require_once('../model/MangaDAO.class.php');
    $mangas = new MangaDAO('../model/data');
    $selectManga = $mangas->getFromImg($imgManga)->fetchAll()[0];
    // var_dump($selectManga);

    echo '<h2>'.$selectManga['Titre'].' par '.$selectManga['Auteur'].'</h2>';
    echo '<img src="../model/data/images_manga/'.$selectManga['Image'].'" alt="">';
     ?>
  </body>
</html>
