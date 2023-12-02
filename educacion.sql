-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-05-2019 a las 15:33:41
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `educacion`
--
CREATE DATABASE IF NOT EXISTS `educacion` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `educacion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `Cod_alum` int(10) NOT NULL AUTO_INCREMENT,
  `Nom_com_alu` varchar(20) NOT NULL,
  `Tlf_alum` int(9) NOT NULL,
  `Direc_alum` varchar(20) NOT NULL,
  `Ca_Cod_curso` int(10) NOT NULL,
  PRIMARY KEY (`Cod_alum`)
) ENGINE=InnoDB AUTO_INCREMENT=6549 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`Cod_alum`, `Nom_com_alu`, `Tlf_alum`, `Direc_alum`, `Ca_Cod_curso`) VALUES
(12, 'Juanito Alimaña', 55252326, 'Carrera 7 3490', 22),
(47, 'Ernesto Toro', 111222, 'avda 38', 25),
(122, 'jmk', 423, 'jnjnono', 123),
(125, 'juanito', 12345, 'calle 32', 18),
(2568, 'Camilo Orozco', 55555555, 'Avda del Estado ', 22),
(6548, 'Daniela Montoya', 33333333, 'Barrio el libano', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

DROP TABLE IF EXISTS `centros`;
CREATE TABLE IF NOT EXISTS `centros` (
  `Nombre` varchar(20) NOT NULL,
  `Tlf_cent` int(9) NOT NULL,
  `Direccion` varchar(20) NOT NULL,
  `Localidad` varchar(10) NOT NULL,
  `CIF` int(6) NOT NULL,
  PRIMARY KEY (`CIF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `centros`
--

INSERT INTO `centros` (`Nombre`, `Tlf_cent`, `Direccion`, `Localidad`, `CIF`) VALUES
('hh', 999, 'hbhb', 'hbi', 88),
('nnu', 333, 'njnj', 'ubub', 445),
('hh', 333, 'njnj', 'nnu', 383883);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `Id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_cur` varchar(15) NOT NULL,
  `Cod_curso` int(10) NOT NULL DEFAULT '0',
  `Ca_Cod_pro` int(10) DEFAULT NULL,
  PRIMARY KEY (`Id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`Id_curso`, `Nom_cur`, `Cod_curso`, `Ca_Cod_pro`) VALUES
(1, 'Algebra', 18, 2),
(2, 'TROLLEO', 22, 2),
(3, 'Matematicas', 25, 1),
(4, 'Algebra', 18, 3),
(5, 'Amarillo', 19, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

DROP TABLE IF EXISTS `nota`;
CREATE TABLE IF NOT EXISTS `nota` (
  `Ca1_Cod_curso` int(10) NOT NULL,
  `Ca_Cod_alum` int(10) NOT NULL,
  `Nota` int(2) NOT NULL,
  PRIMARY KEY (`Ca1_Cod_curso`,`Ca_Cod_alum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`Ca1_Cod_curso`, `Ca_Cod_alum`, `Nota`) VALUES
(22, 122, 4),
(25, 6548, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `Cod_per` int(10) NOT NULL AUTO_INCREMENT,
  `Nom_com` varchar(30) NOT NULL,
  `Tlf_per` int(9) NOT NULL,
  `Direccion` varchar(20) NOT NULL,
  `Puesto_per` varchar(20) NOT NULL,
  `Salario_per` int(4) NOT NULL,
  `Formacion` varchar(20) NOT NULL,
  `Ca_CIF` int(6) DEFAULT NULL,
  PRIMARY KEY (`Cod_per`)
) ENGINE=InnoDB AUTO_INCREMENT=1235 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`Cod_per`, `Nom_com`, `Tlf_per`, `Direccion`, `Puesto_per`, `Salario_per`, `Formacion`, `Ca_CIF`) VALUES
(1, 'BATMAN', 1234567, 'VILLA VERDE', 'LA DEA', 200, 'RELACIONES PERSONALE', 1),
(2, 'ELVIS TEK', 1234568, 'LOS DOSMILQUI', 'COCINA', 0, 'CHEF', 2),
(3, '3', 3, '3', '3', 3, '3', 0),
(44, '44', 44, '44', '44', 44, '44', 0),
(1234, 'miji', 343, 'njnj', 'jnjn', 13444, 'njn', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE IF NOT EXISTS `profesores` (
  `Cod_pro` int(10) NOT NULL AUTO_INCREMENT,
  `Nom_com_pro` varchar(20) NOT NULL,
  `Formacion_pro` varchar(100) NOT NULL,
  `Direcc_pro` varchar(20) NOT NULL,
  `Especialidad` varchar(15) NOT NULL,
  `Tlf_pro` int(9) NOT NULL,
  `Salario_pro` int(4) NOT NULL,
  `CA1_CIF` int(6) DEFAULT NULL,
  `curso` int(11) DEFAULT NULL,
  PRIMARY KEY (`Cod_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`Cod_pro`, `Nom_com_pro`, `Formacion_pro`, `Direcc_pro`, `Especialidad`, `Tlf_pro`, `Salario_pro`, `CA1_CIF`, `curso`) VALUES
(1, 'AQUILES BRINCO', 'CIENCIAS DEL DEPORTE', 'PINARES', 'DORMIR', 44, 2222, 1, 25),
(2, 'CAOS', 'TROLL', 'PINARES', 'TROLLEAR', 44, 5555, 1, 22),
(3, 'Juan de Jesús Marin', 'Profesional', 'Calle 4 10b11', 'Analista de Neg', 311008100, 38000000, 88, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prof_curso`
--

DROP TABLE IF EXISTS `prof_curso`;
CREATE TABLE IF NOT EXISTS `prof_curso` (
  `PROFESOR` int(11) NOT NULL DEFAULT '0',
  `Curso` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PROFESOR`,`Curso`),
  KEY `Curso` (`Curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prof_curso`
--
ALTER TABLE `prof_curso`
  ADD CONSTRAINT `prof_curso_ibfk_1` FOREIGN KEY (`PROFESOR`) REFERENCES `profesores` (`Cod_pro`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prof_curso_ibfk_2` FOREIGN KEY (`Curso`) REFERENCES `cursos` (`Id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
