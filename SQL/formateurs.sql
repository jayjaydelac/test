CREATE TABLE formateur
(
	id SERIAL PRIMARY KEY,
	infos_complementaires TEXT
);


CREATE TABLE externe
(
	tarif_horaire FLOAT NOT NULL
);


CREATE TABLE niveau
(
	note INT NOT NULL DEFAULT(0),
	appreciation TEXT,
	matiere_id INT,
	formateur_id INT 
);


CREATE TABLE feuille_presence
(
	mois INT NOT NULL,
	annee INT NOT NULL,
	total_heures INT NOT NULL DEFAULT(0)
	
);



