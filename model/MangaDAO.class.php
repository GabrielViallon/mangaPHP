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
    //on récupère tous les mangas
    $tabMangas = $this->getAll();

    //on met la recherche en majusucle sans espaces
    $searchMajInter = strtoupper($search);
    $searchMaj = str_replace(' ', '', $searchMajInter);

    //pour chaque manga,
    foreach ($tabMangas as $key) {
      //on met en majuscule et sans espace le titre,
      $titreMajInter = strtoupper($key['Titre']);
      $titreMaj = str_replace(' ', '', $titreMajInter);
      //l'auteur,
      $auteurMajInter = strtoupper($key['Auteur']);
      $auteurMaj = str_replace(' ', '', $auteurMajInter);
      //et le genre
      $genreMajInter = strtoupper($key['Genre']);
      $genreMaj = str_replace(' ', '', $genreMajInter);

      //on compare ensuite la recherche avec le titre, l'auteur et le genre
      //on part du principe que les titres, auteurs et genres sont uniques entre eux
      if($titreMaj == $searchMaj){
        $match = $key['Titre'];
      }
      else if($auteurMaj == $searchMaj){
        $match = $key['Auteur'];
      }
      else if($genreMaj == $searchMaj){
        $match = $key['Genre'];
      }
    }

    if (!isset($match)){
      throw new Exception("'$search' n'est pas enregistré dans notre base de données");
    }

    $sql = "SELECT * FROM Manga WHERE Titre='$match' OR Auteur='$match' OR Genre='$match'";
    echo '<h1>'.$match.'</h1>';

    $res = $this->db->query($sql);
    return $res;
  }

  public function getCat(string $categorie){
    $sql = "SELECT * FROM Manga WHERE Categorie='$categorie'";
    echo '<h1>'.$categorie.'</h1>';
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
