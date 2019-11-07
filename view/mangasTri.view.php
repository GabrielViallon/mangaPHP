<!DOCTYPE html>
  <html lang="fr" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../view/design/mangaTri.css">
  <link rel="stylesheet" href="../view/design/main.css">
  <title>MangaStarter</title>
  </head>

<?php require'header.view.html'; ?>
<body>
  <h1><?= $titre ?></h1>
<container>
<?php foreach ($tableauMangas as $val):
  $dispo = $stocks->getDispo($val['Reference'])->fetchAll()[0]; ?>

 <div><a href="product.ctrl.php?ref=<?= $val['Reference'] ?>">
   <img src="../model/data/images_manga/<?= $val['Image'] ?>" alt="<?= $val['Image'] ?>">
   <article>
     <h2><?= $val['Titre'] ?></h2>
     <p>dispo dans <?= $dispo[0] ?> magasins</p>
   </article>
 </a>
</div>
<?php endforeach; ?>

</container>
