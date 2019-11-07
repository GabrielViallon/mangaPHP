<?php
class LibrairieDAO{
  private $db;

  public function __construct($path){
    $database = 'sqlite:'.$path.'/mangas.db';
    try {
      $this->db = new PDO($database);
    } catch (\Throwable $th) {
      echo 'Erreur constructeur LibrairieDAO';
    }
    }

  public function get(string $addr){
    //on récupère les informations d'une librairie selon son adresse (clé primaire)
    $sql = 'SELECT * FROM Librairie WHERE Adresse = "'.$addr.'"';
    $res = $this->db->query($sql);
    return $res;
  }

  public function getAll(){
    //on récupère un array de toutes les infos de chaque librairie
    $sql = "SELECT * FROM Librairie";
    $res = $this->db->query($sql);
    return $res;
  }

};
 ?>
