-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2019 a las 10:17:41
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdauxiliar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `tipo` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `tipo`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Hardware', 'Microprocesador', 'Problemas relacionados con el sobrecalentamiento y fallas de los microprocesadores', 1),
(2, 'Hardware', 'Fuente de poder', 'Problemas relacionados con la alimentación de la energía eléctrica a la PC', 1),
(3, 'Hardware', 'RAM', 'Problemas relacionados con los fallos o malas configuraciones de las tarjetas RAM', 1),
(4, 'Hardware', 'Disco Duro', 'Problemas con almacenamiento de la información', 1),
(5, 'Hardware', 'Ventilador', 'Fallas relacionadas a la no ventilación o sobrecalentamiento de la máquina', 1),
(6, 'Hardware', 'Tarjeta de video', 'Problemas relacionados a problemas de salida de imagen en la PC', 1),
(7, 'Hardware', 'Motherboard', 'Fallos en la placa madre', 1),
(8, 'Hardware', 'Batería CMOS', 'Fallos en el encendido de la PC o desconfiguración en la hora o fecha', 1),
(9, 'Software', 'Sistema Operativo', 'Fallas generales del sistema operativo', 1),
(10, 'Software', 'Office', 'Problemas al utilizar la paquetería de Office', 1),
(11, 'Software', 'Controlador', 'Problemas debido a la falta o desactualización de los drivers', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` varchar(11) COLLATE latin1_spanish_ci NOT NULL,
  `nombreCompleto` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `direccion` varchar(75) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `dui` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombreCompleto`, `fechaNac`, `direccion`, `telefono`, `dui`, `userid`, `idDepartamento`, `estado`) VALUES
('AJPC194', 'Alexis Josue Pérez Cruz', '1987-06-23', 'La Libertad, Antiguo Cuscatlán, col. los naranjos ', '7590-3214', '95674328-3', 9, 7, 1),
('JARC192', 'José Adalberto Rivera Cruz', '1985-03-01', 'La Libertad, Zaragoza, condominio los otakus #2', '7676-0502', '43215867-0', 11, 3, 1),
('JCRP191', 'Juan Carlos Romero Portilllo', '1990-05-02', 'La Libertad, Santa Tecla, calle Principal #12', '7676-0909', '43520061-2', 12, 1, 1),
('JMAM195', 'jose mariano arce martinez', '2019-06-04', 'calle concepcion', '7485-9658', '95862498-9', 10, 5, 1),
('KASA196', 'Karla Abigail Sosa Aguilar', '1990-07-04', 'San Salvador, col. Robles', '7532-1345', '78633245-9', 9, 4, 1),
('PBFC193', 'Paola Beatriz Fernandez Chicas', '1995-02-01', 'San Salvador, Mejicanos, Com. Barrios #5', '7575-5353', '81276345-3', 10, 5, 1),
('RRIP195', 'Rafel Roberto Iraheta Pérez', '1996-01-01', 'San Salvador, Soyapango, col. los honestos 2', '7632-2045', '09870054-3', 11, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Dirección General', 'Establece objetivos y dirige a la empresa hacia ellos. Está relacionada con el resto de áreas, ya que es quien las controla.', 1),
(2, 'Administración y Recursos Humanos', 'Relacionada con el funcionamiento de la empresa. Es la operación del negocio desde contrataciones, hasta aplicación de campañas en el recurso humano.', 1),
(3, 'Producción', 'Lleva a cabo la producción de los bienes que la empresa comercializará.', 1),
(4, 'Finanzas y Contabilidad', 'Tendrá en cuenta todos los movimientos de dinero, tanto dentro como fuera de la empresa, además realiza el cálculo de pagos para los empleados.', 1),
(5, 'Publicidad y Mercadotecnia', 'Se encarga de realizar las investigación en el mercado, determinar cuál será el siguiente producto para llegar a una negociación en el mercado.', 1),
(6, 'Informática', 'Se encarga de mantener siempre en buen estado el funcionamiento técnico y tecnológico de la empresa.', 1),
(7, 'Atención al cliente', 'Dedicado a la recepción, resolución y seguimiento de quejas, dudas o sugerencias hechas por los clientes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `idDiagnostico` int(11) NOT NULL,
  `fechaAsignacion` datetime NOT NULL,
  `fechaCierre` datetime DEFAULT NULL,
  `diagnostico` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `solucion` varchar(350) COLLATE latin1_spanish_ci DEFAULT NULL,
  `idTecnico` varchar(11) COLLATE latin1_spanish_ci NOT NULL,
  `idTicket` int(11) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `estadoDiagnostico` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`idDiagnostico`, `fechaAsignacion`, `fechaCierre`, `diagnostico`, `solucion`, `idTecnico`, `idTicket`, `idCategoria`, `estadoDiagnostico`, `estado`) VALUES
(1, '2019-06-11 00:00:00', '2019-06-14 00:00:00', 'Problemas con la batería CMOS, necesidad de ser reemplazada', 'Se verificó que la falla no fuese de Software, posteriormente se analizó la batería CMOS.', 'ADAO191', 1, 8, 'Cerrado', 1),
(2, '2019-06-11 00:00:00', '2019-06-14 00:00:00', 'Paquetería de office no actualizada', 'Se llegó a la conclusión que era debido a que la paquetería de office no estaba actualizada.', 'EAAS192', 2, 10, 'Cerrado', 1),
(3, '2019-06-11 00:00:00', '2019-06-15 00:00:00', 'Problema debido a tarjeta de video', 'Se vio si la tarjeta de vídeo estaba bien asentada, siendo este problema de las manchas parpadeantes en la pantalla.', 'AEDS194', 3, 6, 'Cerrado', 1),
(4, '2019-06-11 00:00:00', '2019-06-16 00:00:00', 'Ventilador dañado', 'Se verificó que la energía eléctrica llegará a los ventiladores, luego de esto se vio si estaban bien conectados, finalmente, se vio si el ventilador funcionaba en otra pc, resultando que no, se procedió a analizarlo a detalle y se llegó a la conclusión que el motor estaba dañado.', 'DAAM193', 4, 5, 'Cerrado', 1),
(5, '2019-06-11 00:00:00', '2019-06-14 00:00:00', 'Suciedad en motherboard', 'Primero se procedió a ver las configuraciones de pantalla para descartar esta opción, luego, se vio que la tarjeta madre presentaba una suciedad no habitual, se aplicó una limpieza general en la motherboard, siendo esta la solución.', 'RACF196', 5, 7, 'Cerrado', 1),
(6, '2019-06-11 00:00:00', '2019-06-15 00:00:00', 'Driver de audio desactualizado', 'Se revisó el administrador de dispositivos en búsqueda de fallos en los controladores, encontrando que el driver de audio se encontraba desactualizado, por lo que se procedió a actualizarlo.', 'JCEP195', 6, 11, 'Cerrado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `idTecnico` varchar(11) COLLATE latin1_spanish_ci NOT NULL,
  `nombreCompleto` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `dui` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `especialidad` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `userid` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`idTecnico`, `nombreCompleto`, `direccion`, `telefono`, `dui`, `especialidad`, `fechaNac`, `userid`, `estado`) VALUES
('ADAO191', 'Alexis David Aguilar Olmedo', 'San Salvador, Ciudad Delgado, col. los eraldos 2', '7198-9423', '87653412-1', 'Hardware', '1996-01-05', 5, 1),
('AEDS194', 'Alirio Esaú Díaz Sosa', 'La Libertad, Quezaltepeque, com. cafesoso ', '7643-0895', '87875623-2', 'Hardware', '1994-03-27', 4, 1),
('DAAM193', 'Daniel Alexander Angel Morales', 'La Libertad, Playa el Majahual, col. la piraya 2', '7453-0954', '76503218-3', 'Hardware', '2000-05-05', 6, 1),
('EAAS192', 'Eduardo Antonio Aguilar Solórzano', 'San Salvador, Mejicanos, Col. la gloria 2', '7634-2434', '76541234-3', 'Software', '2000-05-22', 7, 1),
('JCEP195', 'Juan Carlos Estrada Portillo', 'Sonsonate, Juayúa, col. conejos 3', '7674-8458', '87542098-2', 'Software', '1998-04-29', 8, 1),
('RACF196', 'Rocio Alejandra Chicas Fortis', 'La Libertad, Antiguo Cuscatlán', '7654-2442', '76540909-2', 'Hardware', '1999-05-21', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `asunto` varchar(75) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(600) COLLATE latin1_spanish_ci NOT NULL,
  `adjunto` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `idCliente` varchar(11) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`idTicket`, `fechaCreacion`, `asunto`, `descripcion`, `adjunto`, `idCliente`, `estado`) VALUES
(1, '2019-06-10 09:15:20', 'Problemas de fecha y hora', 'Recientemente cuando enciendo la pc por las mañanas siempre me aparece la fecha desconfigurada, una vez la configuro no se cambia el resto del día, pero al siguiente día si lo hace.', NULL, 'JCRP191', 1),
(2, '2019-06-10 09:18:11', 'Problemas con office', 'Buenas tardes, en estos últimos días cuando he estado trabajando con word u otro programa de office, este deja de funcionar repentinamente sin guardar mi trabajo, lo que me provoca retrasos en la entrega de reportes.', NULL, 'JARC192', 1),
(3, '2019-06-10 16:21:18', 'Problemas con la imagen de la pantalla', 'Ya hace varios días que he venido presentando este problema, el cual consiste en unas líneas blancas que me aparecen repentinamente en mi pantalla, lo que me provoca molestias ya que es muy molesto que aparezcan cada 5 minutos.', NULL, 'PBFC193', 1),
(4, '2019-06-10 13:40:53', 'sobrecalentamiento del case ', 'Buenos días, hoy les traigo un problema referente al calor que almacena el case, no se el por que, pero esto me provoca miedo al trabajar porque puede provocar un incendio o puede dañar los componentes internos.', NULL, 'AJPC194', 1),
(5, '2019-06-10 15:28:51', 'la computadora no da imagen', 'El dia de ayer me ocurrio que al encender la computadora, esta no brindo imagen, revise que estuviera bien conectada, incluido el cable VGA, sin embargo, aun asi no da imagen.', NULL, 'RRIP195', 1),
(6, '2019-06-10 15:47:21', 'la computadora no reproduce audio', 'Buenas tardes, el dia de ayer cuando me disponía a reproducir un video que el departamento de publicidad y mercadotecnía había elaborado, sucede que la compùtadora no reproducio el audio, pero el video si lo reproducio, este problema es reciente, puesto que un día anterior había reproducido videos y el audio funcionaba correctamente.', NULL, 'KASA196', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `username` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `avatar` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `rol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`username`, `password`, `avatar`, `rol`, `userid`) VALUES
('eduardo', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'usuario1.jpg', 'Administrador', 1),
('alirio', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'usuario4.jpg', 'Administrador', 2),
('daniel', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'user5.jpg', 'Administrador', 3),
('alexis', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'usuario.jpg', 'Administrador', 4),
('juan', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'defecto.jpg', 'Tecnico', 5),
('carlos', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'defecto.jpg', 'Tecnico', 6),
('mariano', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'user3.jpg', 'Tecnico', 7),
('luis', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'usuario4.jpg', 'Tecnico', 8),
('rocio', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'usuario8.jpg', 'Cliente', 9),
('andrea', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'usuario2.jpg', 'Cliente', 10),
('angy', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'user4.jpg', 'Cliente', 11),
('rafael', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'usuario3.jpg', 'Cliente', 12),
('jorge', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'usuario3.jpg', 'Administrador', 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_cliente_usuario` (`userid`),
  ADD KEY `fk_cliente_departamento` (`idDepartamento`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`idDiagnostico`),
  ADD KEY `fk_diagnostico_tecnico` (`idTecnico`),
  ADD KEY `fk_diagnostico_ticket` (`idTicket`),
  ADD KEY `fk_diagnostico_categoria` (`idCategoria`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`idTecnico`),
  ADD KEY `fk_tecnicos_usuario` (`userid`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `fk_ticket_cliente` (`idCliente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `idDiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_departamento` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`),
  ADD CONSTRAINT `fk_cliente_usuario` FOREIGN KEY (`userid`) REFERENCES `usuario` (`userid`);

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `fk_diagnostico_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `fk_diagnostico_tecnico` FOREIGN KEY (`idTecnico`) REFERENCES `tecnicos` (`idTecnico`),
  ADD CONSTRAINT `fk_diagnostico_ticket` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`idTicket`);

--
-- Filtros para la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD CONSTRAINT `fk_tecnicos_usuario` FOREIGN KEY (`userid`) REFERENCES `usuario` (`userid`);

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
