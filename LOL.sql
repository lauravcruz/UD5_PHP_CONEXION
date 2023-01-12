DROP DATABASE IF EXISTS lol;
CREATE DATABASE lol CHARACTER SET utf8mb4;
USE lol; 

CREATE TABLE champ(
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    rol ENUM("Asesino", "Luchador", "Mago", "Tirador", "Apoyo", "Tanque") NOT NULL,
    difficulty ENUM("Baja", "Moderada", "Alta") NOT NULL, 
    `description` TEXT NOT NULL
);

CREATE TABLE `user`(
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    `name` VARCHAR(100) NOT NULL, 
    username VARCHAR(100) UNIQUE NOT NULL, 
    `password` VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(100) NOT NULL
); 

INSERT INTO champ(`name`, rol, difficulty, `description`) VALUES
	("Lux", "Mago", "Moderada", "Luxanna Crownguard procede de Demacia, un reino insular en el que las habilidades mágicas se observan con temor y suspicacia. Capaz de manipular la luz a su voluntad, creció temiendo que la descubriesen y la exiliaran, por lo que se vio obligada a mantener su poder en secreto a fin de preservar el estatus de su familia. No obstante, el optimismo y la resistencia de Lux la han llevado a aceptar su talento especial, y ahora emplea su poder disimuladamente al servicio de su tierra natal."),
    ("Annie", "Mago", "Moderada", "Peligrosa pero encantadoramente precoz, Annie es una pequeña maga con un inmenso poder piromántico. Incluso en los parajes montañosos al norte de Noxus es una hechicera sin precedentes. Su afinidad natural con el fuego se manifestó a temprana edad en arrebatos emocionales e impredecibles, aunque finalmente aprendió a controlar esos trucos traviesos. Uno de sus favoritos es invocar a su adorado osito de peluche Tibbers. Una bestia protectora envuelta en llamas. Atrapada en la perpetua inocencia de la niñez, Annie vaga por bosques oscuros, siempre buscando a alguien con quien jugar."),
    ("Teemo", "Tirador", "Moderada", "Sin inmutarse siquiera por los obstáculos más peligrosos y amenazantes, Teemo explora el mundo con un entusiasmo infinito y una alegría desbordante. Con un inquebrantable sentido de la moralidad, este yordle se enorgullece de seguir el Código de los Exploradores de Bandle, a veces con tal afán que no es consciente de las consecuencias de sus acciones. Aunque algunos dicen que la existencia de los Exploradores es cuestionable, una cosa es cierta: la convicción de Teemo no es para tomarla a broma."), 
    ("Jinx", "Tirador", "Moderada", "Jinx, una criminal perturbada e impulsiva de Zaun, vive para sembrar el caos sin importarle las consecuencias. Provoca las explosiones más ruidosas y cegadoras con su arsenal de armas letales para dejar un rastro de terror y destrucción a su paso. Jinx aborrece el aburrimiento y disfruta dejando su peculiar impronta allá donde va."),
    ("Ashe", "Tirador", "Moderada", "Ashe, comandante hija del hielo de la tribu de Avarosa, lidera las hordas más numerosas del norte. Impasible, inteligente e idealista, aunque incómoda en su papel de líder, utiliza los poderes mágicos ancestrales de su linaje para empuñar un arco de Hielo Puro. Su gente cree que Ashe es la heroína mitológica Avarosa reencarnada, y ella espera unificar Freljord una vez más al recuperar sus antiguas tierras tribales.");