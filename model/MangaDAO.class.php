<?php
class MangaDAO{
  private $db;

  public function __construct($path){
    $database = 'sqlite:'.$path.'/mangas.db';
    try {
      $this->db = new PDO($database);
    } catch (\Throwable $th) {
      echo 'Erreur constructeur MangaDAO';
    }

    }

  public function get(int $id){
    $sql = "SELECT * FROM Manga WHERE Ref='$id'";
    return $this->db->query($sql);
  }

  public function getImages(){
    $sql = "SELECT Image FROM Manga WHERE *";
    return $this->db->query($sql);
  }

};
 ?>
