CREATE TABLE entreprises (
	id SERIAL PRIMARY KEY,
	nom VARCHAR(120) UNIQUE NOT NULL,
	raison_sociale VARCHAR(120) NOT NULL,
	secteur VARCHAR NOT NULL,
	adresse VARCHAR(250) NOT NULL,
	code_postal VARCHAR(6) DEFAULT NULL,
	ville VARCHAR(60) NOT NULL,
	pays VARCHAR(60) NOT NULL,
	telephone VARCHAR(15) NOT NULL,
	mobile VARCHAR(15) DEFAULT NULL,
	fax VARCHAR(15) DEFAULT NULL,
	dirigeant VARCHAR(60) DEFAULT NULL,
	create_date TIMESTAMP DEFAULT(NOW()),
	update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
	create_uid INT NOT NULL,
	update_uid INT DEFAULT NULL,
	date_visite TIMESTAMP DEFAULT NULL,
	active BOOLEAN DEFAULT(true)
);

CREATE TABLE stages (
	id SERIAL PRIMARY KEY,
	titre VARCHAR(120) NOT NULL,
	entreprise_id INT REFERENCES entreprises(id),
	--formation_id INT(4) REFERENCES formations(id),
	descriptif TEXT DEFAULT NULL,
	referent VARCHAR(60) DEFAULT NULL,
	create_date TIMESTAMP DEFAULT(NOW()),
	update_date TIMESTAMP CHECK(update_date >= create_date) DEFAULT(NOW()),
	create_uid INT NOT NULL,
	update_uid INT NOT NULL,
	active BOOLEAN DEFAULT(true),
	remuneration BOOLEAN DEFAULT(false),
	indemnisation NUMERIC DEFAULT(0)
);

CREATE TABLE stagiaire_entreprise (
	--stagiaire_id INT REFERENCES stagiaires(id),
	entreprise_id INT REFERENCES entreprises(id),
	stage_id INT REFERENCES  stages(id),
	en_cours BOOLEAN DEFAULT(false),
	embauche BOOLEAN DEFAULT(false),
	nombre_heures INT NOT NULL DEFAULT(0),
	date_debut TIMESTAMP DEFAULT(NOW()),
	date_fin TIMESTAMP CHECK(date_fin >= date_debut) DEFAULT(NOW())
);