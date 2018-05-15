USE docur;

/* Procedimiento crear docente */
DELIMITER $$
CREATE PROCEDURE crear_docente(rut VARCHAR(12), nom VARCHAR(100))
BEGIN
    INSERT INTO docente VALUES(NULL, rut, nom);
END $$
DELIMITER ;
/* Procedimiento crear docente */


/* Procedimiento crear curso */
DELIMITER $$
CREATE PROCEDURE crear_curso(nom VARCHAR(500))
BEGIN
    INSERT INTO curso VALUES(NULL, nom);
END $$
DELIMITER ;
/* Procedimiento crear curso */


/* Procedimiento add_curso_docente */
DELIMITER $$
CREATE PROCEDURE add_curso_docente(idDocente INT, idCurso INT, anio VARCHAR(4))
BEGIN
    INSERT INTO docente_curso VALUES(NULL, idDocente, idCurso, CONCAT(anio,'-01-01'));
END $$
DELIMITER ;
/* Procedimiento add_curso_docente */


/* Procedimiento get_cursos*/
/* El filtro puede ser el rut o el nombre */
DELIMITER $$
CREATE PROCEDURE get_cursos(filtro VARCHAR(100))
BEGIN
    SELECT
        d.id AS 'ID Docente', 
        d.rut AS 'Rut', 
        d.nombre AS 'Docente',
        c.id AS 'ID curso', 
        c.nombre AS 'Nombre curso', 
        YEAR(dc.fecha) AS 'Año de rendición'
    FROM
        curso c
    INNER JOIN 
        docente_curso dc ON c.id = dc.fk_curso
    INNER JOIN
        docente d ON dc.fk_docente = d.id
    WHERE 
        d.nombre LIKE CONCAT('%',filtro,'%') OR
        d.rut = filtro;
END $$
DELIMITER ;
/* Procedimiento  get_cursos*/

/* Procedimiento  get_alumnos*/
DELIMITER $$
CREATE PROCEDURE get_alumnos(idCurso INT)
BEGIN
    SELECT
        d.id AS 'ID', 
        d.rut AS 'Rut', 
        d.nombre as 'Nombre', 
        YEAR(dc.fecha) AS 'Año rendición'
    FROM
        curso c
    INNER JOIN 
        docente_curso dc ON c.id = dc.fk_curso
    INNER JOIN
        docente d ON dc.fk_docente = d.id
    WHERE 
        c.id = idCurso;
END $$
DELIMITER ;
/* Procedimiento  get_alumnos*/

/*TEST PROCEDURES*/
CALL crear_docente('11-1','Patricio Pérez Pinto');
CALL crear_docente('22-2','Cristián Estay Valenzuela');
CALL crear_docente('33-3','María HortaGonzález');
CALL crear_curso('Curso 1');
CALL crear_curso('Curso 2');
CALL crear_curso('Curso 3');
CALL add_curso_docente(1, 1, '2018');
CALL add_curso_docente(1, 2, '2018');
CALL add_curso_docente(1, 3, '2018');
CALL add_curso_docente(2, 3, '2018');
CALL add_curso_docente(3, 3, '2018');
CALL get_cursos('perez');
CALL get_alumnos(3);
/*TEST PROCEDURES*/

/*DROP PROCEDURES*/
DROP PROCEDURE crear_docente;
DROP PROCEDURE crear_curso;
DROP PROCEDURE add_curso_docente;
DROP PROCEDURE get_cursos;
DROP PROCEDURE get_alumnos;
/*DROP PROCEDURES*/

SELECT * FROM docente;
SELECT * FROM curso;
SELECT * FROM docente_curso;