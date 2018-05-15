CREATE DATABASE docur;

USE docur;

CREATE TABLE docente(
    id INT AUTO_INCREMENT,
    rut VARCHAR(12),
    nombre VARCHAR(100),
    PRIMARY KEY(id)
);

CREATE TABLE curso(
    id INT AUTO_INCREMENT,
    nombre VARCHAR(500),
    PRIMARY KEY(id)
);

CREATE TABLE docente_curso(
    id INT AUTO_INCREMENT,
    fk_docente INT,
    fk_curso INT,
    fecha DATE,
    PRIMARY KEY(id),
    FOREIGN KEY(fk_docente) REFERENCES docente(id),
    FOREIGN KEY(fk_curso) REFERENCES curso(id)
);

SELECT * FROM docente;
SELECT * FROM curso;
SELECT * FROM docente_curso;

DROP DATABASE docur;
