-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2024 a las 17:30:44
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbacteur`
--

CREATE TABLE `tbacteur` (
  `noActeur` smallint(6) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `taille` decimal(5,2) DEFAULT NULL,
  `nationalite` varchar(20) NOT NULL,
  `dateNaissance` date DEFAULT NULL,
  `noAdress` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbacteur`
--

INSERT INTO `tbacteur` (`noActeur`, `prenom`, `nom`, `taille`, `nationalite`, `dateNaissance`, `noAdress`) VALUES
(12, 'Gagnon', 'Jessica', '175.00', 'Canadienne', '1998-02-02', 6),
(14, 'Reilnos', 'Ryan', '190.00', 'Canadienne', '1988-02-02', 8),
(15, 'Smith', 'Emma', '190.00', 'Britannique', '1995-07-15', 9),
(16, 'Garcia', 'Antonio', '165.00', 'Espagnol', '1990-11-20', 10),
(17, 'Choi', 'Soo-jin', '165.00', 'Coréenne', '1993-04-25', 11),
(18, 'Wang', 'Li', '165.00', 'Chinoise', '1991-09-10', 12),
(19, 'Dubois', 'Pierre', '178.00', 'Français', '1987-12-05', 13),
(20, 'Müller', 'Hans', '178.00', 'Allemand', '1992-06-30', 14),
(21, 'Ivanov', 'Dmitry', '178.00', 'Russe', '1986-10-18', 15),
(22, 'Tanaka', 'Yuki', '178.00', 'Japonaise', '1994-03-12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbadress`
--

CREATE TABLE `tbadress` (
  `noAdress` smallint(6) NOT NULL,
  `rue` varchar(40) NOT NULL,
  `noCivique` varchar(10) NOT NULL,
  `codePostal` char(7) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbadress`
--

INSERT INTO `tbadress` (`noAdress`, `rue`, `noCivique`, `codePostal`, `province`, `pays`, `ville`) VALUES
(1, 'Nueva calle', '90', '12345', 'Quebec', 'Canada', 'Madrid'),
(2, 'Itzaes', '109', '97300', 'Yucatan', 'Mexico', 'Madrid'),
(3, 'Montreal', '23', 'GWE902', 'Quebec', 'Canada', 'Merida'),
(4, 'MinTwon', '9', 'YTU902', 'Ontario', 'Canada', 'Merida'),
(5, 'Paseo Reforma', '00', '10000', 'CDMX', 'Mexico', 'Centre-ville'),
(6, 'Vieux port', '990', 'GXT322', 'Quebec', 'Canada', 'Centre-ville'),
(8, '1 Mayo', '90', '97000', 'Merida', 'Mexico', 'D\'hor ville'),
(9, 'Maisella', '21', 'GOPE90', 'Paris', 'France', 'D\'hor ville'),
(10, 'St hubert', '2022', 'GTX123', 'Quebec', 'Canada', 'Balieu'),
(11, 'Royaume', '232', 'HTEOPQ', 'Quebec', 'Canada', 'Balieu'),
(12, 'Rue de la Paix', '15', '75002', 'Île-de-France', 'France', 'Balieu'),
(13, 'Broadway', '1234', 'NY 1000', 'New York', 'USA', 'Monre'),
(14, 'Sunset Boulevard', '456', 'CA 9002', 'California', 'USA', 'Monre'),
(15, 'Piazza San Marco', '1', '30124', 'Veneto', 'Italy', 'Monre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfilm`
--

CREATE TABLE `tbfilm` (
  `noFilm` smallint(6) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `note` tinyint(4) DEFAULT NULL,
  `lienImage` varchar(255) DEFAULT NULL,
  `noType` smallint(6) NOT NULL,
  `dateSortie` date DEFAULT NULL,
  `budgetEstime` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbfilm`
--

INSERT INTO `tbfilm` (`noFilm`, `titre`, `note`, `lienImage`, `noType`, `dateSortie`, `budgetEstime`) VALUES
(1, 'Inception', 8, 'http://localhost:800/lab04/images/drive.jpg', 1, '2023-02-24', '10000000.00'),
(2, 'The Shawshank Redemption', 8, 'http://localhost:800/lab04/images/drive.jpg', 2, '2023-02-24', '10000000.00'),
(3, 'The Godfather', 9, 'http://localhost:800/lab04/images/drive.jpg', 1, '2009-01-24', '20000000.00'),
(4, 'Pulp Fiction', 9, 'http://localhost:800/lab04/images/matrix.jpg', 3, '2009-01-24', '20000000.00'),
(5, 'The Dark Knight', 10, 'http://localhost:800/lab04/images/matrix.jpg', 2, '1998-07-04', '30000000.00'),
(7, 'The Lord of the Rings: The Ret', 10, 'http://localhost:800/lab04/images/matrix.jpg', 1, '1998-07-04', '30000000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfilmacteur`
--

CREATE TABLE `tbfilmacteur` (
  `noFilm` smallint(6) NOT NULL,
  `noActeur` smallint(6) NOT NULL,
  `revenue` decimal(9,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbfilmacteur`
--

INSERT INTO `tbfilmacteur` (`noFilm`, `noActeur`, `revenue`) VALUES
(1, 12, '100000.00'),
(1, 15, '9223.00'),
(1, 22, '9223.00'),
(2, 1, '150000.00'),
(2, 4, '123332.00'),
(2, 5, '312332.00'),
(2, 12, '321323.00'),
(2, 14, '123332.00'),
(2, 15, '312332.00'),
(3, 3, '250000.00'),
(3, 6, '312312.00'),
(3, 16, '312312.00'),
(4, 7, '12233.00'),
(4, 17, '12233.00'),
(5, 8, '12222.00'),
(5, 18, '12222.00'),
(6, 19, '312332.00'),
(7, 10, '234123.00'),
(7, 11, '123444.00'),
(7, 20, '234123.00'),
(7, 21, '123444.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbstudio`
--

CREATE TABLE `tbstudio` (
  `noStudio` smallint(6) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `description` varchar(30) DEFAULT NULL,
  `dateCreation` date DEFAULT NULL,
  `noAdress` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbstudio`
--

INSERT INTO `tbstudio` (`noStudio`, `nom`, `description`, `dateCreation`, `noAdress`) VALUES
(1, 'Studio Mágico', 'Productora de animación mágica', '1995-02-22', 1),
(2, 'Walt Disney Studios', 'Productora de cine y animación', '1912-08-10', 4),
(3, 'Pixar', 'Grand studio de animation', '1989-01-10', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtype`
--

CREATE TABLE `tbtype` (
  `noType` smallint(6) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbtype`
--

INSERT INTO `tbtype` (`noType`, `nom`, `description`) VALUES
(1, 'Science-fiction', 'La science-fiction peut racont'),
(2, 'Musical', 'La comédie musicale est un gen'),
(3, 'Comédie', 'Au cinéma, la comédie présente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbutilisateur`
--

CREATE TABLE `tbutilisateur` (
  `noUtilisateur` smallint(6) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `courreil` varchar(50) NOT NULL,
  `motDePasse` varchar(25) NOT NULL,
  `noAdress` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbutilisateur`
--

INSERT INTO `tbutilisateur` (`noUtilisateur`, `nom`, `prenom`, `courreil`, `motDePasse`, `noAdress`) VALUES
(1, 'Christian', 'Reyes', 'christian@example.com', '87654321', 3),
(2, 'test', 'cegep', 'test@example.com', 'test12345', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbacteur`
--
ALTER TABLE `tbacteur`
  ADD PRIMARY KEY (`noActeur`),
  ADD KEY `noAdress` (`noAdress`);

--
-- Indices de la tabla `tbadress`
--
ALTER TABLE `tbadress`
  ADD PRIMARY KEY (`noAdress`);

--
-- Indices de la tabla `tbfilm`
--
ALTER TABLE `tbfilm`
  ADD PRIMARY KEY (`noFilm`),
  ADD UNIQUE KEY `titre` (`titre`),
  ADD KEY `noType` (`noType`);

--
-- Indices de la tabla `tbfilmacteur`
--
ALTER TABLE `tbfilmacteur`
  ADD PRIMARY KEY (`noFilm`,`noActeur`);

--
-- Indices de la tabla `tbstudio`
--
ALTER TABLE `tbstudio`
  ADD PRIMARY KEY (`noStudio`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `noAdress` (`noAdress`);

--
-- Indices de la tabla `tbtype`
--
ALTER TABLE `tbtype`
  ADD PRIMARY KEY (`noType`);

--
-- Indices de la tabla `tbutilisateur`
--
ALTER TABLE `tbutilisateur`
  ADD PRIMARY KEY (`noUtilisateur`),
  ADD KEY `noAdress` (`noAdress`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbacteur`
--
ALTER TABLE `tbacteur`
  MODIFY `noActeur` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tbadress`
--
ALTER TABLE `tbadress`
  MODIFY `noAdress` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbfilm`
--
ALTER TABLE `tbfilm`
  MODIFY `noFilm` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbstudio`
--
ALTER TABLE `tbstudio`
  MODIFY `noStudio` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbtype`
--
ALTER TABLE `tbtype`
  MODIFY `noType` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbutilisateur`
--
ALTER TABLE `tbutilisateur`
  MODIFY `noUtilisateur` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbacteur`
--
ALTER TABLE `tbacteur`
  ADD CONSTRAINT `tbacteur_ibfk_1` FOREIGN KEY (`noAdress`) REFERENCES `tbadress` (`noAdress`);

--
-- Filtros para la tabla `tbfilm`
--
ALTER TABLE `tbfilm`
  ADD CONSTRAINT `tbfilm_ibfk_1` FOREIGN KEY (`noType`) REFERENCES `tbtype` (`noType`);

--
-- Filtros para la tabla `tbstudio`
--
ALTER TABLE `tbstudio`
  ADD CONSTRAINT `tbstudio_ibfk_1` FOREIGN KEY (`noAdress`) REFERENCES `tbadress` (`noAdress`);

--
-- Filtros para la tabla `tbutilisateur`
--
ALTER TABLE `tbutilisateur`
  ADD CONSTRAINT `tbutilisateur_ibfk_1` FOREIGN KEY (`noAdress`) REFERENCES `tbadress` (`noAdress`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
