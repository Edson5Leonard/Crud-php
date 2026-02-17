CREATE DATABASE IF EXITS datos;

USE datos;

CREATE TABLE `alumno` (
  `cod_estudiante` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombres` varchar(20) NOT NULL,
  `apellidos` varchar(30) NOT NULL
);

INSERT INTO `alumno` (`cod_estudiante`, `dni`, `nombres`, `apellidos`) VALUES
(101, 75854549, 'Juan Carlos', 'Herrera Sanches'),
(103, 75854551, 'Jimena', 'Sandobal Gutierre'),
(105, 75854553, 'jvh turoriales', 'suscribete y dale lik');
COMMIT;