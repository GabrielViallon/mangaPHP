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

    $searchMajInter = strtoupper($search);
    $searchMaj = str_replace(' ', '', $searchMajInter);

    foreach ($tabMangas as $key) {
      $titreMajInter = strtoupper($key['Titre']);
      $titreMaj = str_replace(' ', '', $titreMajInter);

      $auteurMajInter = strtoupper($key['Auteur']);
      $auteurMaj = str_replace(' ', '', $auteurMajInter);

      $genreMajInter = strtoupper($key['Genre']);
      $genreMaj = str_replace(' ', '', $genreMajInter);

      if($titreMaj == $searchMaj){
        $titre = $key['Titre'];
        // $auteur = $genre = '';
      }
      else if($auteurMaj == $searchMaj){
        $auteur = $key['Auteur'];
        // $titre = $genre = '';
      }
      else if($genreMaj == $searchMaj){
        $genre = $key['Genre'];
        // $titre = $auteur = '';
      }
    }

    if (!isset($titre) && !isset($auteur) && !isset($genre)){
      echo "Le titre, auteur ou genre n'est pas enregistré dans notre base de données";
      $sql = "SELECT * FROM Manga WHERE 0=1";
    }

    echo '<h1>';
    if (isset($titre)){
      echo $titre;
      $sql = "SELECT * FROM Manga WHERE Titre='$titre'";
    }
    else if(isset($auteur)){
      echo $auteur;
      $sql = "SELECT * FROM Manga WHERE Auteur='$auteur'";
    }
    else if(isset($genre)){
      echo $genre;
      $sql = "SELECT * FROM Manga WHERE Genre='$genre'";
    }
    echo '</h1>';

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
