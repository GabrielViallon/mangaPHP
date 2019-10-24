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

  public function getFromImg(string $chaine){
    $sql = "SELECT * FROM Manga WHERE Image='$chaine'";
    $inter = $this->db->query($sql);
    return $inter;
  }

  public function getImages(){
    $sql = "SELECT Image FROM Manga";
    $inter = $this->db->query($sql);
    return $inter;
  }

};
 ?>
