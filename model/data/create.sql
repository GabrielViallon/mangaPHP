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
  Nom  VARCHAR,
  Adresse VARCHAR primary key,
  Numero VARCHAR
);

CREATE TABLE Stock (
  LibrairieAddr VARCHAR,
  Ref INTEGER,
  Dispo INTEGER,
  PRIMARY KEY ('LibrairieAddr','Ref'),
  FOREIGN KEY ('LibrairieAddr')
  REFERENCES Libraire('Adresse'),
  FOREIGN KEY ('Ref')
  REFERENCES Manga('Reference')
);
