<?php
require_once('../model/LibrairieDAO.class.php');
$librairies = new LibrairieDAO('../model/data');
$tableauLibrairies = $librairies->getAll()->fetchAll();

include('../view/magasin.view.php');
include('../view/footer.view.html');
 ?>
