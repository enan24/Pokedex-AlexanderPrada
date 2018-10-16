drop database if exists pokemons_alexander_prada;

create database pokemons_alexander_prada;

use pokemons_alexander_prada;

CREATE TABLE tipo(
	id int primary key auto_increment,
	descripcion varchar(35) not null
);

CREATE TABLE pokemon(
	id int primary key auto_increment,
	imgurl varchar(70) not null,
	nombre varchar(30) not null,
	tipo_id int,
	foreign key(tipo_id) references tipo(id)
);

CREATE TABLE user(
	nick varchar(30) primary key,
	pass varchar(40) not null
);

INSERT INTO user(nick, pass)
VALUES ('Ash Ketchum','admin');

INSERT INTO tipo(descripcion) 
VALUES
        ("Agua"),
        ("Bicho"),
        ("Electrico"),
        ("Fuego"),
		("Hada"),
        ("Planta");

INSERT INTO pokemon(imgurl, nombre, tipo_id)
VALUES ('src/images/pokemones/pikachu.png','Pikachu',3),
       ('src/images/pokemones/squirtle.png','Squirtle',1),
       ('src/images/pokemones/charmander.png','Charmander',4);