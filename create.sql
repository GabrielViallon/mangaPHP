CREATE TABLE Manga (
  Reference INTEGER primary key,
  Titre VARCHAR,
  Auteur VARCHAR,
  Categorie VARCHAR,
  Genre VARCHAR,
  Resume VARCHAR,
  Image VARCHAR
);

CREATE TABLE Librairie (
  Nom  VARCHAR primary key,
  Adresse VARCHAR,
  Numero VARCHAR
);
