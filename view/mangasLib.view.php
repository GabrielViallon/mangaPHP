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
    <h1>Les mangas dispos à <?=$librairie['Nom']?> </h1>
    <container>

      <?php foreach ($tableauRefs as $ref):

      $nbMangas = $stock->getNb($ref['Ref'], $librairie['Adresse'])->fetchAll()[0];
      $manga = $mangas->get($ref['Ref'])->fetchAll()[0];
      ?>

     <div><a href="product.ctrl.php?ref=<?= $manga['Reference'] ?>">
       <img src="../model/data/images_manga/<?= $manga['Image'] ?>" alt="<?= $manga['Image'] ?>">
       <article>
         <h2><?= $manga['Titre'] ?></h2><p><?= $nbMangas['Dispo'] ?> exemplaires</p>
     </article></a>
   </div>
   <?php endforeach; ?>
</container>
