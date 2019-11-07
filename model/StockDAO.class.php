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

    public function getRef(string $adr){
      //on récupère les références des mangas qui sont dispo dans la librairie (son adresse est sa clé primaire)
      $sql = 'SELECT Ref FROM Stock WHERE LibrairieAddr="'.$adr.'" AND Dispo > 0';
      $res = $this->db->query($sql);
      return $res;
    }

    public function getDispo(int $ref){
      //on récupère le nombre de librairie dans lesquelles le manga est disponible
      $sql = "SELECT count(*) FROM Stock WHERE Ref = $ref AND Dispo > 0";
      $res = $this->db->query($sql);
      return $res;
    }

    public function getLibDispo(int $ref){
      //on récupère le nombre d'exemplaires du manga (ref est la clé primaire) disponibles dans chaque librairie
      $sql = "SELECT LibrairieAddr, Dispo FROM Stock WHERE Ref = $ref";
      $res = $this->db->query($sql);
      return $res;
    }

    public function getNb(int $ref, string $libadr){
      //on récupère le nombre d'exemplaires du manga dans une librairie en particulier
      $sql = 'SELECT Dispo FROM Stock WHERE Ref = '.$ref.' AND LibrairieAddr = "'.$libadr.'"';
      $res = $this->db->query($sql);
      return $res;
    }

//La fonction mise en commentaire ci dessous est une ébauche de ce que nous voulions faire pour insérer les valeurs dans stock
//Cette technique n'a pas fonctionné et l'insertion des valeurs dans stock est expliquée dans model/stock.insert.php

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
