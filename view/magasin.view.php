<!DOCTYPE html>
  <html lang="fr" dir="ltr">
  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../view/design/magasin.css">
  <link rel="stylesheet" href="../view/design/main.css">
  <title>MangaStarter</title>
  </head>
  <?php require'header.view.html'; ?>
  <body>
    <h1>Vos librairies de Grenoble :</h1>
    <?php foreach ($tableauLibrairies as $val): ?>
     <div><a href="mangasLib.ctrl.php?lib=<?= $val['Adresse'] ?>">
       <h2><?= $val['Nom'] ?></h2><p>| <?= $val['Adresse'] ?></p></a></div>
  <?php endforeach; ?>
