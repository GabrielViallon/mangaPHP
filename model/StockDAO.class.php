<?php
class StockDAO{
  private $db;

  public function __construct($path){
    $database = 'sqlite:'.$path.'/mangas.db';
    try {
      $this->db = new PDO($database);
    } catch (\Throwable $th) {
      echo 'Erreur du constructeur StockDAO';
    }

    }

    // public function insert(string $adresse, int $ref, int $dispo){
    //   $sql = $db->prepare("INSERT INTO Stock (LibrairieAddr, Ref, Dispo) VALUES (:LibrairieAddr, :Ref, :Dispo)");
    //   $res = $sql->execute(array(
    //     'LibrairieAddr'=>$adresse,
    //     'Ref'=>$ref,
    //     'Dispo'=>$dispo
    //   ));
    // }
};
?>
