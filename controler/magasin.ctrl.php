<?php
require_once('../model/LibrairieDAO.class.php');
$librairies = new LibrairieDAO('../model/data');
$tableauLibrairies = $librairies->getAll()->fetchAll();

require'../view/magasin.view.php';
require'../view/footer.view.html';
 ?>
