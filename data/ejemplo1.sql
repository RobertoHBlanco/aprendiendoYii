SET NAMES 'utf8';

DROP DATABASE IF EXISTS ejemplo1yii2;

CREATE DATABASE IF NOT EXISTS ejemplo1yii2
CHARACTER SET utf8
COLLATE utf8_spanish_ci;

--
-- Set default database
--
USE ejemplo1yii2;

--
-- Create table `noticias`
--
CREATE TABLE IF NOT EXISTS noticias (
  id int(11) NOT NULL AUTO_INCREMENT,
  titulo varchar(255) NOT NULL,
  texto text DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 5,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8,
COLLATE utf8_spanish_ci;

-- 
-- Dumping data for table noticias
--
INSERT INTO noticias VALUES
(1, 'Noticia1', '<p>Muy lejos, más allá de las montañas de palabras, alejados de los países de las vocales y las consonantes, viven los textos simulados. Viven aislados en casas de letras, en la costa de la semántica, un gran océano de lenguas. Un riachuelo llamado Pons fluye por su pueblo y los abastece con las normas necesarias. Hablamos de un país paraisomático en el que a uno le caen pedazos de frases asadas en la boca.</p>\r\n\r\n<p>Ni siquiera los todopoderosos signos de puntuación dominan a los textos simulados; una vida, se puede decir, poco ortográfica. Pero un buen día, una pequeña línea de texto simulado, llamada Lorem Ipsum, decidió aventurarse y salir al vasto mundo de la gramática. El gran Oxmox le desanconsejó hacerlo, ya que esas tierras estaban llenas de comas malvadas, signos de interrogación salvajes y puntos y coma traicioneros, pero el texto simulado no se dejó atemorizar. Empacó sus siete versales, enfundó su inicial en el cinturón y se puso en camino. Cuando ya había escalado las primeras colinas de las montañas cursivas, se dio media vuelta para dirigir su mirada por última vez, hacia su ciudad natal Letralandia, el encabezamiento del pueblo Alfabeto y el subtítulo de su</p>'),
(2, 'Noticia2', '<p>Y, viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro. Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca.</p>\r\n\r\n<p>Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no te cabe parte dellas. Y, viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro. Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca. Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no</p>'),
(3, 'Noticia3', '<p>Reina en mi espíritu una alegría admirable, muy parecida a las dulces alboradas de la primavera, de que gozo aquí con delicia. Estoy solo, y me felicito de vivir en este país, el más a propósito para almas como la mía, soy tan dichoso, mi querido amigo, me sojuzga de tal modo la idea de reposar, que no me ocupo de mi arte.</p>\r\n\r\n<p>Ahora no sabría dibujar, ni siquiera hacer una línea con el lápiz; y, sin embargo, jamás he sido mejor pintor Cuando el valle se vela en torno mío con un encaje de vapores; cuando el sol de mediodía centellea sobre la impenetrable sombra de mi bosque sin conseguir otra cosa que filtrar entre las hojas algunos rayos que penetran hasta el fondo del santuario, cuando recostado sobre la crecida hierba, cerca de la cascada, mi vista, más próxima a la tierra, descubre multitud de menudas y diversas plantas; cuando siento más cerca de mi corazón los rumores de vida de ese pequeño mundo que palpita en los tallos de las hojas, y veo las formas innumerables e infinitas de los gusanillos y de los insectos; cuando siento, en fin, la presencia del Todopoderoso, que nos ha creado</p>'),
(4, 'Noticia4', '<p>Quiere la boca exhausta vid, kiwi, piña y fugaz jamón. Fabio me exige, sin tapujos, que añada cerveza al whisky. Jovencillo emponzoñado de whisky, ¡qué figurota exhibes! La cigüeña tocaba cada vez mejor el saxofón y el búho pedía kiwi y queso. El jefe buscó el éxtasis en un imprevisto baño de whisky y gozó como un duque.</p>\r\n\r\n<p>Exhíbanse politiquillos zafios, con orejas kilométricas y uñas de gavilán. El cadáver de Wamba, rey godo de España, fue exhumado y trasladado en una caja de zinc que pesó un kilo. El pingüino Wenceslao hizo kilómetros bajo exhaustiva lluvia y frío, añoraba a su querido cachorro. El veloz murciélago hindú comía feliz cardillo y kiwi.</p>\r\n\r\n<p>La cigüeña tocaba el saxofón detrás del palenque de paja. Quiere la boca exhausta vid, kiwi, piña y fugaz jamón. Fabio me exige, sin tapujos, que añada cerveza al whisky. Jovencillo emponzoñado de whisky, ¡qué figurota exhibes! La cigüeña tocaba cada vez mejor el saxofón y el búho pedía kiwi y queso. El jefe buscó el éxtasis en un imprevisto baño de whisky y gozó como un duque. Exhíbanse politiquillos zafios, con orejas kilométricas y uñas de gavilán. El cadáver de Wamba, rey godo de España, fue</p>');
