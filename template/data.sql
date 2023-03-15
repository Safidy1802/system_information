CREATE TABLE entreprise (
    id_entreprise varchar(6) PRIMARY KEY,
    nom varchar(10),
    date_creation timestamp,
    siege varchar,
    email_entreprise varchar(20),
    tel varchar(10)
);

CREATE TABLE info_etat (
    id_info_e varchar(6) PRIMARY KEY,
    id_entreprise varchar(6),
    capitale double precision,
    nif varchar,
    ns varchar,
    nrcs varchar,
    FOREIGN KEY (id_entreprise) REFERENCES entreprise(id_entreprise)
);

CREATE TABLE info_situation (
    id_info_s varchar(6) PRIMARY KEY,
    id_e varchar(6),
    adresse_exploitation varchar,
    FOREIGN KEY (id_e) REFERENCES entreprise(id_e)
);

CREATE TABLE exercice (
    id_exercice varchar(6) PRIMARY KEY,
    id_e varchar(6),
    devise_tenue_compte varchar(8),
    date_exercice timestamp,
    FOREIGN KEY (id_e) REFERENCES entreprise(id_e)
);

CREATE TABLE utilisateur (
    id_user serial PRIMARY KEY,
    mail_user varchar(25),
    mdp varchar(16)
);

CREATE TABLE plan_comptable (
    id_pc serial PRIMARY KEY,
    num_compte int(5),
    nom_compte varchar(15)
);

CREATE TABLE compte_tiers (
    id_ct serial PRIMARY KEY,
    compte int,
    name varchar(15),
    FOREIGN KEY (compte) REFERENCES plan_comptable(id_pc)
);

CREATE TABLE code_journal (
    id_cj serial PRIMARY KEY,
    code varchar(6),
    libelle varchar(15)
);