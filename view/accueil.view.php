<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="main.css">
<title>MangaStarter</title>
</head>
<body>
<header>
  <article>
  <a href="#"><img src="data/Logo.jpg" alt="Logo"></a>
  <h1>Bienvenue chez Manga Starter !</h1>
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
<?php

echo "<article>";

require_once('../model/MangaDAO.class.php');
$mangas = new MangaDAO('../model/data');
$tableauImages[] = $mangas.getImages();

foreach ($tableauImages as $val) {

  echo '<img src="../model/data/images_manga/'.$val.'" alt="'.$val.'">';
}

echo "</article>";
 ?>
</body>
</html>
