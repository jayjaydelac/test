CREATE TABLE formation	(
	id SERIAL PRIMARY KEY, 
	intitule VARCHAR,
	effectif_moyen INT,
	heure_convention_centre TIME,
	heure_convention_entreprise TIME,
	code_marche VARCHAR,
	donneur_ordre VARCHAR,
	date_debut_marche DATE,
	date_fin_marche DATE
);

CREATE TABLE session_formation 	(
	formation_id INT PRIMARY KEY,
	date_debut DATE,
	date_fin DATE,
	FOREIGN KEY (formation_id) REFERENCES formation(id)
);

CREATE TABLE ref_pedago(
	formation_id INT,
	matiere_id INT,
	PRIMARY KEY (formation_id, matiere_id),
	FOREIGN KEY (formation_id) REFERENCES formation(id),
	FOREIGN KEY (matiere_id) REFERENCES matiere(id)
);