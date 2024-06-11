-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Base de datos: `changame`
--
--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `date_of_birth`, `phone_number`, `address`, `city`, `state`, `country`, `postal_code`, `photo`, `active_status`, `avatar`, `dark_mode`, `messenger_color`, `external_id`, `external_auth`) VALUES
(2, 'Guillermo Ballesteros', 'gaytan.clara@example.org', '2024-05-10 09:10:35', '$2y$12$ei8FHdyqDiWoGCV2A1sjGeP7cfeTowHtCQqkiuJ2plDArJXG1Hj7G', 'vwtGz9vNoKTKtwnRPr2e157LVvYnUkc5nm7MBkMH9UNH3BtgpVSkgRNzQfwN', '2024-05-10 09:10:35', '2024-05-10 09:10:35', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'avatar.png', 0, NULL, NULL, NULL),
(3, 'Marta Caldera', 'ruben69@example.net', '2024-05-10 09:10:35', '$2y$12$ei8FHdyqDiWoGCV2A1sjGeP7cfeTowHtCQqkiuJ2plDArJXG1Hj7G', 'SZJZppRNkg', '2024-05-10 09:10:35', '2024-05-10 09:10:35', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'avatar.png', 0, NULL, NULL, NULL),
(4, 'Ian Matías', 'orodriguez@example.net', '2024-05-10 09:10:35', '$2y$12$ei8FHdyqDiWoGCV2A1sjGeP7cfeTowHtCQqkiuJ2plDArJXG1Hj7G', 'icoktMAybT', '2024-05-10 09:10:35', '2024-05-10 09:10:35', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'avatar.png', 0, NULL, NULL, NULL),
(5, 'Lic. Eric Ramírez Tercero', 'vera68@example.com', '2024-05-10 09:10:35', '$2y$12$ei8FHdyqDiWoGCV2A1sjGeP7cfeTowHtCQqkiuJ2plDArJXG1Hj7G', 'E2fwnkaDDU', '2024-05-10 09:10:35', '2024-05-10 09:10:35', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'avatar.png', 0, NULL, NULL, NULL),
(6, 'Sr. Sergio Morales Hijo', 'cabello.ismael@example.org', '2024-05-10 09:10:35', '$2y$12$ei8FHdyqDiWoGCV2A1sjGeP7cfeTowHtCQqkiuJ2plDArJXG1Hj7G', 'grlkXUxlJo6cq4xe586kM4A7xnTUTQ5PV6sDI6Zu6QGP3sLtugMTVaSEGCkH', '2024-05-10 09:10:35', '2024-05-10 09:10:35', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'avatar.png', 0, NULL, NULL, NULL),
(7, 'Javier García', 'javier@gmail.com', '2024-05-10 09:12:11', '$2y$12$ei8FHdyqDiWoGCV2A1sjGeP7cfeTowHtCQqkiuJ2plDArJXG1Hj7G', 'm6VkeWyHkai1GYVZ0gT8cfxypQAEkD8tgcLopgmilU4WD3JmayP13kQb5ob7', '2024-04-11 09:12:11', '2024-06-03 15:25:42', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'profiles/THY1FHGXswEwUgesrH7Trr1Pj8TGh87FWtK0WPjj.png', 0, 'avatar.png', 0, NULL, NULL, NULL),
(8, 'Susana Ruiz', 'susana@gmail.com', NULL, '$2y$12$95ZU6kxho/qUuW0aRGXOuOXyG9pZU3xdH2a9mPLNAv6JrKxaKgBwq', NULL, '2024-06-03 17:12:51', '2024-06-09 17:36:25', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'avatar.png', 0, NULL, NULL, NULL);

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Dados', 'dices', NULL, NULL),
(2, 'Fichas', 'chips', NULL, NULL),
(3, 'Cartas', 'cards', NULL, NULL),
(4, 'Tablero estrategia', 'rol', NULL, NULL),
(5, 'Tablero tradicional', 'Traditional', NULL, NULL),
(6, 'Tablero de guerra', 'wargame', NULL, NULL),
(7, 'Tablero temático', 'Thematic', NULL, NULL),
(8, 'Tablero de miniatura', 'miniatures', NULL, NULL);

--
-- Volcado de datos para la tabla `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `slug`, `description`, `date_from`, `date_to`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Comparte una Sonrisa, Regala un Juguete', 'comparte_una_sonrisa_regala_un_juguete', '<p>Queremos llenar de alegría los corazones de los niños y niñas más necesitados!</p>\n<p>Únete a nuestra campaña <i>\"Comparte una Sonrisa, Regala un Juguete\"</i>, una iniciativa solidaria que busca recolectar juguetes nuevos y en buen estado para entregarlos a familias de bajos recursos.</p> \n</p>Creemos que todos los niños merecen disfrutar de la magia de los juegos, y con tu ayuda, podemos hacer que eso sea\nposible.</p>', '2024-05-20', '2024-06-20', 'product', NULL, NULL);

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `description`, `category_id`, `player_count_from`, `player_count_to`, `from_age`, `play_time`, `difficulty`, `release_year`, `condition`, `language`, `change_with`, `state`, `campaign`, `created_at`, `updated_at`) VALUES
(1, 7, 'Catán', 'Catan es la primera piedra sobre la que se construye cualquier ludoteca. Diseñado por Klaus Teuber en 1995 y ganador del Spiel des Jahres, ha sido el juego de mesa que ha revolucionado los juegos de mesa modernos. Este juego funciona con un sistema de comercio, donde los jugadores pueden intercambiar cartas de su mano entre ellos para construir carreteras, pueblos y ciudades.', 7, 3, 4, 10, 90, '1', '1995', 'very good', 'ES', NULL, NULL, NULL, NULL, '2024-06-02 07:42:21'),
(2, 6, 'Risk', 'Risk es un juego de mesa de carácter estratégico. Si tu objetivo es conquistar dos continentes para lograr la misión los territorios tendrán que estar bajo tu posesión hasta el siguiente turno de lo contrario no obtendrás la victoria.', 6, 4, 8, 10, 120, '1', '1990', 'good', 'ES', NULL, NULL, NULL, NULL, '2024-06-10 16:30:33'),
(3, 7, 'Monopoly', 'Monopoly es uno de los juegos de mesa comerciales más vendidos del mundo. El objetivo del juego es conseguir beneficios y finalmente el monopolio del mercado, teniendo todas las propiedades inmuebles imaginarias que aparecen en el juego.', 5, 4, 8, 8, 90, '1', '2002', 'like new', 'ES', NULL, NULL, NULL, NULL, '2024-06-10 16:26:58'),
(4, 3, 'Scrabble', 'Scrabble es un juego de mesa en el cual cada jugador intenta ganar más puntos mediante la construcción de palabras sobre un tablero de 15x15 casillas cuadradas. Las palabras pueden formarse, siempre y cuando aparezcan en el diccionario estándar, de forma horizontal o verticalmente y se pueden cruzar.', 5, 2, 4, 10, 45, '1', '1995', 'acceptable', 'ES', NULL, NULL, NULL, NULL, '2024-06-10 16:05:09'),
(5, 7, 'Parchís', 'El objetivo del juego consiste en llevar todas las fichas desde su casa hasta la meta recorriendo todo el circuito, intentando “comerse” o capturar el resto de fichas en el camino. Gana el primer jugador que consiga meter todas sus fichas en la meta.', 5, 2, 4, 4, 30, '1', '1995', 'acceptable', 'ES', NULL, NULL, NULL, NULL, NULL),
(6, 2, 'Reversi', 'El reversi, othello, otelo o yang es un juego entre dos personas, que comparten 64 fichas iguales, de caras distintas, que se van colocando por turnos en un tablero dividido en 64 escaques. Las caras de las fichas se distinguen por su color y cada jugador tiene asignado uno de esos colores, ganando quien tenga más fichas sobre el tablero al finalizar la partida.', 2, 2, 2, 8, 60, '1', '2000', 'very good', 'ES', NULL, NULL, NULL, NULL, NULL),
(7, 2, 'Ajedrez', 'El ajedrez es un juego de tablero entre dos contrincantes en el que cada uno dispone al inicio de dieciséis piezas móviles, desiguales en importancia y valor, que se desplazan sobre un tablero capturando piezas del jugador contrario, según ciertas reglas', 5, 2, 2, 4, 60, '1', '1995', 'like new', 'ES', NULL, NULL, NULL, NULL, NULL),
(8, 7, 'Trivial', 'El tablero está compuesto por casillas que forman una rueda con seis radios. Cada casilla lleva el color de un tipo de preguntas, con una casilla especial de cada color en el lugar en que los radios se unen a la rueda, donde aparece el quesito del respectivo color.', 5, 2, 6, 16, 90, '1', '2010', 'very good', 'ES', NULL, NULL, NULL, NULL, NULL),
(9, 3, 'Ubungo', 'Empiezas con 7 piezas con formas distintas. Uno de los jugadores tira un dado, se da la vuelta al temporizador de arena y empieza la ronda de Ubongo. Cada jugador tiene una plantilla diferente y el dado indica qué piezas tienes que usar para rellenar la plantilla. El primero en encajar todas las piezas correctamente grita «¡Ubongo!» y gana la ronda.', 2, 1, 4, 8, 30, '1', '2010', 'good', 'ES', NULL, NULL, NULL, NULL, NULL),
(10, 3, 'Catan: Piratas y Exploradores', 'Una de las mayores novedades de la expansión Piratas y exploradores es que, al empezar el juego, no formamos una gran isla central, sino que creamos tres, aunque solo una de ellas será perfectamente reconocible. Los recursos de las otras dos únicamente serán visibles una vez hayamos llegado a ellas con nuestros barcos y hayamos creado asentamientos portuarios en sus costas.', 7, 2, 4, 12, 90, '1', '1995', 'very good', 'ES', NULL, NULL, NULL, NULL, NULL),
(11, 2, 'Rummikub', 'Rummikub tiene todos los elementos que hacen un gran juego. Es fácil de aprender y de rápido movimiento. El \"tablero\" cambia todo el tiempo a medida que los jugadores ajustan las fichas de la mesa. Combina suerte y estrategia y cambia rápidamente para que cada jugador tenga la oportunidad de ganar hasta el final. Los jugadores se turnan para colocar fichas numeradas en series y grupos. Las fichas del Joker aumentan la diversión; pueden ser de cualquier color o número.', 2, 2, 4, 10, 90, '1', '2001', 'very good', 'EN', NULL, NULL, NULL, NULL, NULL),
(12, 7, 'Dixit', 'Juego basado en cartas artísticas con una mecánica sencilla y original donde se debe decir una palabra o historia sobre una carta ilustrada y los jugadores deben intentar que sus cartas sean las votadas para ganar el juego.', 3, 3, 6, 8, 30, '1', '2008', 'good', 'ES', NULL, NULL, 1, NULL, '2024-06-01 13:51:39'),
(13, 4, 'La isla prohibida', 'En La Isla Prohibida, los jugadores deberán trabajar juntos para salvar todos los tesoros de la isla, ¡antes que se hunda! Cada jugador toma el papel de un aventurero (piloto, explorador, ingeniero, etc.) y tiene que usar su poder especial para ayudar a su equipo. Este juego se gana cuando los jugadores han cogido los cuatro tesoros, van a la pista de aterrizaje y escapan en helicóptero.', 7, 2, 4, 10, 30, '1', '2010', 'very good', 'ES', NULL, NULL, NULL, NULL, NULL),
(14, 3, 'Parchís magnético', 'El objetivo del juego consiste en llevar todas las fichas desde su casa hasta la meta recorriendo todo el circuito, intentando “comerse” o capturar el resto de fichas en el camino. Gana el primer jugador que consiga meter todas sus fichas en la meta.', 5, 2, 4, 4, 30, '1', '1995', 'acceptable', 'ES', NULL, NULL, NULL, NULL, NULL),
(15, 7, 'Los hombres lobo de Castronegro', 'Se trata de un divertido juego de suspense. Un moderador supervisa el enfrentamiento entre los hambrientos hombres lobo y los aldeanos que tratan de eliminarlos. Aprende a mentir y a farolear porque en Los Hombres Lobo de Castronegro esas habilidades te harán mucha falta para seguir vivo.', 2, 4, 8, 10, 45, '1', '2010', 'like new', 'IT', NULL, NULL, NULL, NULL, NULL),
(16, 5, 'Las leyendas de Andor', 'La tierra de Andor está en peligro. Desde las montañas y los bosques, los enemigos avanzan hacia el castillo del viejo rey Brandur. Solo tu pequeño grupo de héroes se interpone en su camino. ¿Conseguirás defender el castillo y proteger a Andor?', 4, 4, 4, 14, 90, '1', '2015', 'very good', 'EN', NULL, NULL, NULL, NULL, NULL),
(21, 7, 'La Oca', 'El juego de la oca es un juego de mesa donde cada jugador tira un dado y avanza su ficha (de acuerdo al número obtenido) por un tablero en forma de caracol con 63 casillas (o más), con dibujos', 5, 2, 4, 4, 30, '1', NULL, 'good', 'ES', NULL, NULL, NULL, '2024-05-28 13:33:40', '2024-06-03 17:52:09'),
(22, 8, 'Rummikub', 'Rummikub tiene todos los elementos que hacen un gran juego. Es fácil de aprender y de rápido movimiento. El \"tablero\" cambia todo el tiempo a medida que los jugadores ajustan las fichas de la mesa. Combina suerte y estrategia y cambia rápidamente para que cada jugador tenga la oportunidad de ganar hasta el final. Los jugadores se turnan para colocar fichas numeradas en series y grupos. Las fichas del Joker aumentan la diversión; pueden ser de cualquier color o número.', 2, 2, 4, 8, 30, '2', '2015', 'very good', 'ES', NULL, NULL, NULL, '2024-06-03 17:21:56', '2024-06-03 17:56:02'),
(25, 8, 'Scrabble', 'Scrabble es un juego de mesa en el cual cada jugador intenta ganar más puntos mediante la construcción de palabras sobre un tablero de 15x15 casillas cuadradas. Las palabras pueden formarse, siempre y cuando aparezcan en el diccionario estándar, de forma horizontal o verticalmente y se pueden cruzar.', 2, 2, 4, 10, 30, '3', NULL, 'very good', 'ES', NULL, NULL, NULL, '2024-06-10 16:56:49', '2024-06-10 16:56:49');


--
-- Volcado de datos para la tabla `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 7, 4, '2024-05-26 03:33:09', '2024-05-26 03:33:09'),
(2, 7, 6, '2024-05-26 03:33:38', '2024-05-26 03:33:38'),
(3, 3, 2, '2024-05-26 03:45:14', '2024-05-26 03:45:14'),
(4, 7, 10, '2024-05-26 08:04:39', '2024-05-26 08:04:39'),
(5, 2, 10, '2024-05-26 10:14:03', '2024-05-26 10:14:03'),
(6, 7, 2, '2024-05-30 11:48:56', '2024-05-30 11:48:56'),
(7, 8, 21, '2024-06-03 17:13:47', '2024-06-03 17:13:47'),
(8, 8, 15, '2024-06-03 17:57:24', '2024-06-03 17:57:24');


