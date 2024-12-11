-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 11-12-2024 a las 19:02:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `id_pedidos` int(11) NOT NULL,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellidos`, `correo`, `pass`, `id_pedidos`, `eliminado`) VALUES
(1, 'Cliente', 'a', 'cliente@mail.com', 'cliente', 1, 0),
(2, 'prueba', 'a', 'prueba@mail.com', 'prueba', 12, 0),
(5, 'prueba2', 'a', 'prueba2@mail.com', 'prueba2', 0, 0),
(7, 'prueba3', 'a', 'prueba3@mail.com', 'prueba3', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `rol` int(1) NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellidos`, `correo`, `pass`, `rol`, `archivo_n`, `archivo`, `eliminado`) VALUES
(1, 'ejemplo', 'a', 'ejemplo@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, 'cf2d656e41d7a091c32d8d63111fdcee.jpeg', 'WhatsApp Image 2024-10-19 at 11.20.46.jpeg', 0),
(2, 'das', 'dwq', 'fwe', '3c59dc048e8850243be8079a5c74d079', 2, '', '', 0),
(3, '3', 'ds', 'fwe', 'f495be79bad3d692686f63d43283c1f8', 1, '', '', 0),
(4, 'Juan', 'Ontiveros', 'juan@mail.com', '202cb962ac59075b964b07152d234b70', 2, '', '', 0),
(5, 'Argos', 'Gonzalez', 'argos@mail.com', '202cb962ac59075b964b07152d234b70', 2, '', '', 0),
(6, 'Zara', 'Herrera', 'zara@mail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 1, '', '', 0),
(7, 'a', 'a', 'a@g.com', '0cc175b9c0f1b6a831c399e269772661', 2, '', '', 0),
(8, 'a', 'a', 'a@g.com', '0cc175b9c0f1b6a831c399e269772661', 2, '', '', 0),
(9, 'a', 'a', 'a@b.com', '0cc175b9c0f1b6a831c399e269772661', 1, '', '', 0),
(10, 'b', 'b', 'bdfas@udg.mx', 'f970e2767d0cfe75876ea857f92e319b', 1, '', '', 0),
(11, 'dasd', 'Ontiveros', 'dasdssa@udg.mx', 'a24a3fcb2eb836a3b669eb10b88abcda', 1, '', '', 0),
(12, 'Perro', 'Otro', 'perro@mail.com', '202cb962ac59075b964b07152d234b70', 2, '', '', 0),
(13, 'dasdDA', 'FWEQFR', 'FWEF@GMA.com', 'aeb09aef065c8179846c8bf0bb1664cb', 2, '', '', 0),
(14, 'Arturo', 'Massiosare', 'Massiosare@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '', '', 0),
(15, 'b', 'b', 'bdfas@udg.mx', '73b8140af162c3b3125df052cb8e4fd8', 1, '', '', 0),
(16, 'Arturo2', 'Massiosare', 'Massiosare@gmail.com', '73b8140af162c3b3125df052cb8e4fd8', 2, '', '', 0),
(17, '\r\n            Nuevo', 'Foto', 'Nuevo@corre.com', '202cb962ac59075b964b07152d234b70', 1, '3cba2707aa16d3154ac41bf6c15a7bb8', '3cba2707aa16d3154ac41bf6c15a7bb8.jpeg', 0),
(18, '\r\n            Nuevo2', 'Foto', 'correo@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 'f1910714c2bb341a99bc961ba5617b5c', 'FotoPerfilEjemplo2.png.png', 0),
(19, '\r\n            Nuevo3', 'Otro', 'correo3@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 'f1910714c2bb341a99bc961ba5617b5c', 'C:xampp	mpphpAFFA.tmp.png', 0),
(20, 'Nuevo4', 'Foto', 'correo4@gmail.com', '73b8140af162c3b3125df052cb8e4fd8', 2, '', '', 0),
(21, '\r\n            Nuevo5', 'Foto', 'correo5@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 'dcb0b9174403481899fd37b550fde7df', 'FotoPerfilEjemplo.jpg.jpg', 0),
(22, '            NuevoFoto', 'a', 'a@g.com', '202cb962ac59075b964b07152d234b70', 2, 'dcb0b9174403481899fd37b550fde7df', 'FotoPerfilEjemplo.jpg', 0),
(23, 'Perro3', 'a', 'perro2@mail.com', '202cb962ac59075b964b07152d234b70', 1, 'f1910714c2bb341a99bc961ba5617b5c', 'FotoPerfilEjemplo2.png', 0),
(24, 'a', 'a', 'juan@mail.com', '0cc175b9c0f1b6a831c399e269772661', 1, '0ad5ff1093f84cba12b0c8903c194316', 'Clase UML (2).jpeg', 0),
(25, 'b', 'b', 'juan@mail.com', '92eb5ffee6ae2fec3ad71c777531578f', 1, '0ad5ff1093f84cba12b0c8903c194316', 'Clase UML (2).jpeg', 0),
(26, 'ab', 'ab', 'xb', 'e10adc3949ba59abbe56e057f20f883e', 1, '3466127a7114e04e764d1acf151d62e6', 'Clase UML (1).jpeg', 0),
(27, 'Juan 2', 'a', 'juan2@mail.com', '0cc175b9c0f1b6a831c399e269772661', 1, '0ad5ff1093f84cba12b0c8903c194316', 'Clase UML (2).jpeg', 0),
(28, 'admin', 'a', 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 2, '44b79fc6a473b8da346c0ee974b5676a.webp', 'admin.webp', 0),
(29, 'admin2', 'a', 'admin2@mail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '0ad5ff1093f84cba12b0c8903c194316', 'Clase UML (2).jpeg', 1),
(30, 'ejemplo512', 'a', 'foto3@mail.com', '202cb962ac59075b964b07152d234b70', 1, 'f1910714c2bb341a99bc961ba5617b5c.png', 'FotoPerfilEjemplo2.png', 0),
(31, 'prueb6', 'a', 'admin5@mail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'ba8fdd64c92e8299b6c02f9ff6ffb756.png', 'Screenshot 2024-02-04 115904.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fecha`, `id_usuario`, `status`, `eliminado`) VALUES
(1, '2024-11-23', 1, 1, 0),
(2, '2024-11-24', 2, 1, 0),
(3, '2024-11-27', 2, 1, 0),
(4, '2024-11-27', 1, 0, 0),
(5, '2024-11-27', 5, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedi_productos`
--

CREATE TABLE `pedi_productos` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedi_productos`
--

INSERT INTO `pedi_productos` (`id`, `id_pedido`, `id_producto`, `cantidad`, `precio`) VALUES
(1, 1, 3, 5, 2),
(2, 1, 5, 4, 12),
(4, 2, 3, 2, 4690),
(5, 2, 12, 1, 16399),
(7, 2, 1, 4, 4690),
(9, 3, 3, 1, 4690),
(10, 3, 11, 1, 6180),
(11, 4, 1, 2, 4690),
(12, 4, 3, 1, 4690),
(13, 4, 9, 1, 12999),
(14, 4, 14, 1, 10999),
(16, 5, 3, 1, 4690),
(17, 5, 10, 1, 5399);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `codigo` varchar(32) NOT NULL,
  `descripcion` text NOT NULL,
  `costo` double NOT NULL,
  `stock` int(11) NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `descripcion`, `costo`, `stock`, `archivo_n`, `archivo`, `eliminado`) VALUES
(1, 'Samsung Galaxy S21 5G 128GB Phantom Gray', '12345', 'Samsung Galaxy S21 5G 128GB Phantom Gray Reacondicionado Grado A Experiencia visual increíble Mira tus series y películas favoritas con la mejor definición a través de su pantalla Dynamic AMOLED 2X de 6.2\". Disfruta de colores brillantes y detalles precisos en todos tus contenidos.', 4690, 8, 'a019998bbc2003475c9a614a7c6caff6.webp', 'cel1.webp', 0),
(2, 'Samsung Galaxy S21 5G 128GB Phantom White', '12346', 'Samsung Galaxy S21 5G 128GB Phantom WhiteReacondicionado Grado A Experiencia visual increíble Mira tus series y películas favoritas con la mejor definición a través de su pantalla Dynamic AMOLED 2X de 6.2\". Disfruta de colores brillantes y detalles precisos en todos tus contenidos.', 4690, 5, 'd8310d09db4d551a4d170ffb393015c4.webp', 'cel2.webp', 0),
(3, 'Samsung Galaxy S21 5G128GB Phantom Pink', '12347', 'Pantalla: 6.2', 4690, 15, '7fa2887348eedcee4eb0ca85c6def2ee.webp', 'cel3.webp', 0),
(4, 'Samsung Galaxy S20 FE 5G G781V (Verizon desbloqueado) 128GB Nube Azul Marino', '12348', 'Samsung Galaxy S20 FE (Fan Edition) es el sucesor de Galaxy S10 Lite. Las especificaciones incluyen una pantalla FHD+ de 6,5 pulgadas, chipset Snapdragon 865 con 6GB/8GB de RAM y 128GB/256GB de almacenamiento, y batería de 4500. Hay una configuración de triple cámara en la parte posterior, con el mismo sensor principal que se encuentra en el Galaxy S20 regular.', 3826, 12, '3c3ff3dfe21c63f3963e056dc54dca2c.webp', 'cel4.webp', 0),
(5, 'iPhone X 64 Gb Gris Espacial Reacondicionado', '12349', 'Experiencia visual increíble Mira tus series y películas favoritas con la mejor definición a través de su pantalla OLED de 5.8 Pulgadas. Disfruta de colores brillantes y detalles precisos en todos tus contenidos. Capacidad y eficiencia Con su potente procesador Apple A11 Bionic (10 nm) y memoria RAM de 3 GB tu equipo alcanzará un alto rendimiento con gran velocidad de transmisión de contenidos y ejecutará múltiples aplicaciones a la vez sin demoras. Batería de duración superior ¡Desenchúfate! Con la súper batería de 2716 mAh tendrás energía por mucho más tiempo para jugar, ver series o trabajar sin necesidad de realizar recargas.', 4970, 191, '37b20ae69b06af037d2bb68b8483fa88.webp', 'iphone x.webp', 0),
(6, 'Samsung Galaxy S24 FE 8GB RAM 256GB ROM Grafito', '12350', 'Se concentra más en los valores premium fundamentales. - Herencia en el Diseño de Pantalla de bisel delgado - Próximo AP de nivel y batería de mayor duración - IA basado en Nightography Gen - IA Editing -Mejora de la experiencia de Galaxy AI. -S24 FE, es la serie premium más equilibrada con Experiencia Galaxy AI. - IA que impulsa la vida; búsqueda sin esfuerzo Emotivo & Preciso -Comunicación desatada. Creatividad; teléfono insignia basado en IA nivel - Fotografía nocturna y zoom -Privacidad y seguridad: bloqueo automático / Knox Matrix / Actualización.', 10999, 15, 'a3cad3761208d5cb89021fac7803d88a.webp', 's24 fe grafito.webp', 0),
(7, 'Motorola Moto G04 Verde', '12351', 'Su diseño delgado y elegante está fabricado con materiales de primer nivel que realzan su apariencia. Te encantarán sus atractivos detalles y las cuatro opciones de color que ofrece. Disfruta de programas y películas en una pantalla amplia y fluida de 6.6 pulgadas y 90 Hz con el modo Brillo alto y el sonido Dolby Atmos. Toma fotos perfectas para las redes gracias a la cámara de 16 MP con IA. Usa la Expansión de memoria para convertir el almacenamiento en una memoria RAM virtual y hacer varias tareas sin problemas. Desbloquea el teléfono con la mirada o un simple toque. El moto g04 revoluciona tu mundo.', 1999, 23, '0d049d4cfe0fdd36db297874df567396.webp', 'Moto G04 Verde.webp', 0),
(8, 'Xiaomi Celular Poco M5s Grey 4GB Ram 128GB ROM', '12352', 'Pantalla 6.43 pulgadas Batería 5000 mah Cámara trasera: 64 MP.', 1993, 43, '97a725e8a6d7207df1ff89dea03db0cb.webp', 'POCO M5s Gris.webp', 0),
(9, 'Phone 14 Plus Apple 128GB eSIM Morado', '12353', 'El Apple iPhone 14 Plus se suma a la serie iPhone 14 con una pantalla OLED de 6.7 pulgadas y procesador A15 Bionic. El iPhone 14 Plus cuenta con una cámara dual de 12MP + 12MP, con estabilización por sensor, y modo Cinemático, mientras que la cámara frontal suma autofoco PDAF. El iPhone 14 Plus también cuenta con carga inalámbrica, parlantes stereo y corre iOS 16. Compañias Compatibles. AT&T, Movistar y Telcel', 12999, 71, '5870762e4fd767a7f4c593d8c59b5117.webp', 'iPhone 14 Plus morado.webp', 0),
(10, 'Oppo Reno 11F 8Gb 256GB 5G Azul', '12354', 'Ofrece una pantalla AMOLED sin bordes de 6.78 pulgadas con una velocidad de 144 Hz -Cuenta con una carga rápida SUPERVOOC de 67 W que permite cargar la batería de 5000 mAh al 100 % en solo 48 minutos -Su cámara triple de 64 MP+ 8MP + 2MP captura imágenes ultra nítidas con detalles precisos y un equilibrio perfecto entre luz y color -Este teléfono combina una experiencia visual excepcional con una carga eficiente y fotografías de alta calidad.', 5399, 26, 'fcfd6ea6d506ab28dc33160461c1a0b2.webp', 'Oppo Reno 11F Azul.webp', 0),
(11, 'iPhone XS Max 64 Gb Oro ', '12355', 'Mira tus series y películas favoritas con la mejor definición a través de su pantalla OLED de 6.5 Pulgadas. Disfruta de colores brillantes y detalles precisos en todos tus contenidos. Capacidad y eficiencia Con su potente procesador Apple A12 Bionic (7 nm) y memoria RAM de 4 GB tu equipo alcanzará un alto rendimiento con gran velocidad de transmisión de contenidos y ejecutará múltiples aplicaciones a la vez sin demoras. Batería de duración superior', 6180, 19, 'bb898a5092267df464e7aaf45a4e98a0.webp', 'iPhone XS Max Oro.webp', 0),
(12, 'REDMAGIC 9S Pro 5G Blanco', '12356', 'Pantalla completa FHD+ de 6,8\": este teléfono para juegos con una frecuencia de actualización de 120 Hz y una resolución de 2480 x 1116 píxeles ofrece hermosas imágenes HD+ a hasta 120 cuadros por segundo. Con una frecuencia de muestreo táctil instantánea de 2000 Hz y una frecuencia de muestreo táctil general de 960 Hz, este dispositivo tiene una amplia gama de colores DCI-P3, que se suma al 100 % a la calidad general de la pantalla.', 16399, 23, 'e777edb6eb78714e75f6a39c48ae17a1.webp', 'REDMAGIC 9S Pro 5G Blanco.webp', 0),
(13, 'Apple iPhone SE (2022) 128 Gb Negro', '12357', 'A highly efficient chip, an enhanced battery, and iOS 15 work together to boost battery life. When you do need to charge, just place iPhone SE on a wireless charger. Or connect a 20W or higher adapter to fast charge from zero to up to 50 percent charge in 30 minutes flat.  Faster downloads. Faster streaming. Faster gaming. Less lag. More fun.', 6318, 12, 'e573b29830d5a2f9b9998e010119fe93.webp', 'Apple iPhone SE (2022) Negro.webp', 0),
(14, 'iPad Mini Apple con Wifi 64 GB Malva', '12358', 'El iPad Mini de 6 generación con 64GB de almacenamiento y color malva es una excelente opción para usuarios que buscan un dispositivo compacto y potente. La pantalla Liquid Retina, el chip A15 Bionic y la compatibilidad con el Apple Pencil de segunda generación lo hacen ideal para una variedad de tareas, desde la creatividad y la productividad hasta el entretenimiento y la navegación web. ', 10999, 7, 'f1dfcbdd18c13f21b6e744b798367c37.webp', 'iPad Mini Apple Malva.webp', 0),
(15, ' Honor Magic 6 Lite 8GB RAM 256GB Plata', '12359', 'El HONOR MAGIC 6 LITE 8GB 256GB 5G cuenta con una pantalla AMOLED de 6.78 pulgadas con una resolución de 1200 x 2652 píxeles, disfruta de los colores vibrantes y detalles nítidos que hacen que cada experiencia sea más envolvente, esta equipado con un procesador Qualcomm SM6450 Snapdragon 6 Gen 1 8 núcleos, es un teléfono que combina potencia y estilo en un diseño elegante en color plata.', 7998, 9, '287198821828753cd9eee3d9f3d88aec.webp', 'Honor Magic 6 Lite Plata.webp', 0),
(16, 'Producto de prueba', '123', 'Prueba', 21, 12, 'e9fcdb02c11ee835d98d26378947a761.png', 'Screenshot 2024-01-21 140728.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `archivo` varchar(64) NOT NULL,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `nombre`, `archivo`, `eliminado`) VALUES
(1, 'Paquetes', '7a40af064beefe0a7e8d011943ba19ad.png', 0),
(2, 'Compra chip', '97dc1eb381b69c1be1da7ce67a0a1948.png', 0),
(3, '6 Meses', '0436ece9c344003278794504c6892ac3.jpg', 0),
(4, 'Mas gigas', 'ba2050d131aba94770f2be75860faeeb.png', 0),
(5, 'Paquete chico', '0f8dfeeb0e347f477b3e796485b40a22.webp', 0),
(6, 'Mas gigas', '04d34a78e5e7924dd3710de2b7ce30c5.jpg', 0),
(7, 'Promocion prueba', '4e10d990684b34b466168c33db862491.png', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedi_productos`
--
ALTER TABLE `pedi_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedi_productos`
--
ALTER TABLE `pedi_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
