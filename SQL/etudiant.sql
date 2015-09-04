-- création tables

CREATE TABLE situation_famille (
	id SERIAL PRIMARY KEY,
	libelle VARCHAR
);

CREATE TABLE nationalite (
	id SERIAL PRIMARY KEY,
	libelle VARCHAR
);

CREATE TABLE type_remuneration (
	id SERIAL PRIMARY KEY,
	libelle VARCHAR
);


CREATE TABLE stagiaire (
	id SERIAL PRIMARY KEY,
	nom VARCHAR NOT NULL,
	prenom VARCHAR NOT NULL,
	date_naissance DATE NOT NULL,
	lieu_naissance VARCHAR NOT NULL,
	sexe BOOLEAN NOT NULL,
	adresse_off_rue VARCHAR NOT NULL,
	adresse_off_complement VARCHAR NOT NULL,
	adresse_off_codpost VARCHAR NOT NULL,
	adresse_off_ville VARCHAR NOT NULL,
	adresse_form_rue VARCHAR NOT NULL,
	adresse_form_complement VARCHAR NOT NULL,
	adresse_form_codpost VARCHAR NOT NULL,
	adresse_form_ville VARCHAR NOT NULL,
	telepĥone VARCHAR NOT NULL,
	email VARCHAR NOT NULL,
	mobile VARCHAR NOT NULL,
	numero_securite_sociale INTEGER NOT NULL,
	photo VARCHAR NOT NULL,
	id_type_remuneration INTEGER NOT NULL,
	FOREIGN KEY (id_type_remuneration) REFERENCES type_remuneration(id),
	id_statut_stagiaire INTEGER NOT NULL,
	FOREIGN KEY (id_statut_stagiaire) REFERENCES statut_stagiaire(id),
	id_niveau_etude INTEGER NOT NULL,
	FOREIGN KEY (id_niveau_etude) REFERENCES niveau_etude(id),
	id_situation_famille INTEGER NOT NULL,
	FOREIGN KEY (id_situation_famille) REFERENCES situation_famille(id),
	id_nationalite INTEGER NOT NULL,
	FOREIGN KEY (id_nationalite) REFERENCES nationalite(id)
); 

CREATE TABLE session_stagiaire (
	id_session INTEGER NOT NULL,
	id_stagiaire INTEGER NOT NULL,
	PRIMARY KEY (id_session,id_stagiaire),
	nb_heure_effectuee_cours INTEGER NOT NULL,
	nb_heure_effectuee_stage INTEGER NOT NULL	
);




