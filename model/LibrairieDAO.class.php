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

  public function get(int $addr){
    $sql = "SELECT * FROM Libraire WHERE Adresse=$addr";
    $res = $this->db->query($sql);
    return $res;
  }

  public function getAll(){
    $sql = "SELECT * FROM Librairie";
    $res = $this->db->query($sql);
    return $res;
  }

};
 ?>
