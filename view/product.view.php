<!DOCTYPE html>
  <html lang="fr" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../view/design/product.css">
  <link rel="stylesheet" href="../view/design/main.css">
  <title>MangaStarter</title>
  </head>
  <?php require'header.view.html'; ?>
  <body>
    <div>
    <img src="../model/data/images_manga/<?= $selectManga['Image'] ?>" alt="">
    <article>
      <h1><?= $selectManga['Titre'] ?></h1>
      <h2> écrit par : <a href="mangasTri.ctrl.php?search=<?= $selectManga['Auteur'] ?>">
        <?= $selectManga['Auteur'] ?></a></h2>
    <container>
      <p>Reference <?= $selectManga['Reference'] ?></p>
      <p><a href="mangasTri.ctrl.php?cat=<?= $selectManga['Categorie'] ?>">
        <?= $selectManga['Categorie'] ?></a>
        , <a href="mangasTri.ctrl.php?search=<?= $selectManga['Genre'] ?>">
          <?= $selectManga['Genre'] ?></a></p>
        </container>
      <p><?= $selectManga['Resume'] ?></p>
    </article>
  </div>
  <div>
    <h3>Disponibilité :</h3>
    <ul>
      <?php foreach ($stockLib as $val):
      $nomLib = $librairies->get($val['LibrairieAddr'])->fetchAll()[0];
      ?>
      <li><p><?= $nomLib[0] ?> (<?= $val['LibrairieAddr'] ?>) :</p>
        <p><?= $val['Dispo'] ?> exemplaires</p>
      </li>
    <?php endforeach;?>
   </ul>
 </div>
