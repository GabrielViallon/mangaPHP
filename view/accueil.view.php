<!DOCTYPE html>
  <html lang="fr" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./design/accueil.css">
  <link rel="stylesheet" href="./design/main.css">
  <title>MangaStarter</title>
  </head>
<?php
require_once('header.view.html');
?>

<body>
  <article>
  <h1>Bienvenue chez</h1>
  <img src="../model/data/Logo.jpg" alt=""><h1>Manga Starter !</h1>
</article>

<!-- <container> -->

</body>
<?php
// require_once('../model/MangaDAO.class.php');
// $mangas = new MangaDAO('../model/data');
// $tableauMangas = $mangas->getAll()->fetchAll();
//
// foreach ($tableauMangas as $val) {
//
//   echo '<a href="product.view.php?ref='.$val['Reference']
//   .'"><img src="../model/data/images_manga/'.$val['Image'].'" alt="'.$val['Image']
//   .'">'.$val['Titre'].'</a>';
// }
// echo '</container>';
//
require_once('footer.view.html');
 ?>
</html>
