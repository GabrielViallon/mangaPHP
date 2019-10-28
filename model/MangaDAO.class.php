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

  public function get(int $ref){
    $sql = "SELECT * FROM Manga WHERE Reference=$ref";
    $res = $this->db->query($sql);
    return $res;
  }

  public function getSearch(string $search){
    $tabMangas = $this->getAll();
    foreach ($tabMangas as $key) {
      $mangaMajInter = strtoupper($key['Titre']);
      $searchMajInter = strtoupper($search);
      $mangaMaj = str_replace(' ', '', $mangaMajInter);
      $searchMaj = str_replace(' ', '', $searchMajInter);
      if($mangaMaj == $searchMaj){
        $titre = $key['Titre'];
      }
    }
    if (!isset($titre)){
      echo "Le titre n'est pas enregistré dans notre base de données";
    }
    $sql = "SELECT * FROM Manga WHERE Titre='$titre'";
    $res = $this->db->query($sql);
    return $res;
  }

  public function getCat(string $categorie){
    $sql = "SELECT * FROM Manga WHERE Categorie='$categorie'";
    $res = $this->db->query($sql);
    return $res;
  }

  public function getAll(){
    $sql = "SELECT * FROM Manga";
    $res = $this->db->query($sql);
    return $res;
  }

};
 ?>
