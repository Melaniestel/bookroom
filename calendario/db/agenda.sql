--
-- Base de datos: `bookroom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(30) NOT NULL,
`dni_usu` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indices de la tabla `schedule_list`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `agenda`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

ALTER TABLE `agenda`  ADD FOREIGN KEY (dni_usu) REFERENCES usuarios(dni_usu);

