CREATE TABLE modulos(
	id_modulo INT NOT NULL AUTO_INCREMENT,
	modulo varchar(24) NOT NULL,
	primary key(id_modulo)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE cuestionario(
	id_cuestionario INT NOT NULL AUTO_INCREMENT,
	id_modulo INT NOT NULL,
	nombre varchar(140) NOT NULL,
	posicion int NOT NULL,
	primary key(id_cuestionario)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;