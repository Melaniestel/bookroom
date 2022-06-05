USE bookroom;

CREATE TABLE usuarios(
    dni_usu varchar(200) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    clave VARCHAR(200) NOT NULL,
    PRIMARY KEY (dni_usu)
	);

INSERT INTO usuarios VALUES ('022898987', "pepe", '$2y$10$ZMZjQyYAI2QNT5HpHSFtweGURzDTiA20JMY8m/qgzlGK61addc7.e' );
INSERT INTO usuarios VALUES ('022233221', "juan", '$2y$10$zc66sBPQjBSvDBTvKfJ78ev6P/yuzI.AMobcEmkj2Or/uRCgNAGoi' );

# pepe contrasenia
# juan 1234



CREATE TABLE reservas(
    id_reserva int NOT NULL AUTO_INCREMENT,
    dni_usu varchar(200) NOT NULL,
    fecha date NOT NULL,
    hora time NOT NULL,
    id_sala int NOT NULL,
    estado varchar(200),
	PRIMARY KEY (id_reserva),
        FOREIGN KEY (dni_usu) REFERENCES usuarios(dni_usu),
        FOREIGN KEY (id_sala) REFERENCES salas(id_sala)
	);

INSERT INTO reservas VALUES (1, '022898987', '2022-05-19', '10:00', 100, 'reservada');


 CREATE TABLE `bookroom`.`salas` 
 (
  id_sala int NOT NULL ,
  descripcion VARCHAR(200) NOT NULL ,
  aforo int 
 PRIMARY KEY (id_sala)
 );

INSERT INTO salas VALUES (100, 'sala con proyector', 20);
INSERT INTO salas VALUES (101, 'sala con ordenadores', 10);



CREATE TABLE `agenda` (
  `id` int(30) NOT NULL,
`dni_usu` varchar(200) NOT NULL,
  `sala` text,
  `datos` text,
  `fecha` date NOT NULL,
  `hora` time DEFAULT NULL
);

ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `agenda`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

ALTER TABLE `agenda`  ADD FOREIGN KEY (dni_usu) REFERENCES usuarios(dni_usu);

#Creación de usuario administrador y usuario limitado y grants.

CREATE USER 'administrador'@'localhost' IDENTIFIED BY '1234';

GRANT SELECT, INSERT, DELETE, UPDATE ON bookroom.* TO 'administrador'@'localhost';

FLUSH PRIVILEGES;

CREATE USER 'usuarios'@'localhost' IDENTIFIED BY '123';

GRANT SELECT, INSERT, DELETE, UPDATE ON bookroom.reservas TO 'usuarios'@'localhost';

GRANT SELECT ON bookroom.salas TO 'usuarios'@'localhost';

GRANT SELECT, INSERT, DELETE, UPDATE ON bookroom.agenda TO 'usuarios'@'localhost';

FLUSH PRIVILEGES;


//quiero mostrar el id de salas que estan disponibles según fecha y hora y que tengan el aforo y descripcion que diga el usuario.

select id_sala , estado from reservas
where fech_inicio='' and fecha_fin='';

select r.id_sala , r.estado from reservas r
join salas s
on r.id_sala= s.id_sala
where s.descripcion ='sala con proyector' and s.aforo='20';

select s.id_sala
from salas s
where aforo=20 and descripcion='sala con proyector';

select r.estado, r.fech_inicio, r.fech_fin from reservas r 
join salas s
on r.id_sala=s.id_sala
where '2022-05-19 08:00:00' >= fech_inicio
or '2022-05-19 08:30:00'<= fech_fin



select r.estado 
from reservas r
join salas s
on s.id_sala=r.id_sala
where fecha='' and
hora_ini in(select hora_ini
from reservas where
hora_ini = 10:00:00
and hora_fin >= 10:30:00);

select * from horarios where
fecha='2022-05-19' and
h_ini in(select h_ini
from horarios
where h_ini='09:00:00' and
 h_fin > '09:00:00');

Mostrar la sala segun descripcion y aforo y mostrar las horas que estan reservadas. Despues el usuario podrá elegir que hora desea reservar.

select s.id_sala, s.descripcion, s.aforo , r.estado, r.fech_inicio, r.fech_fin
from salas s
join reservas r
on s.id_sala = r.id_sala
where s.descripcion='' and s.aforo='';




select * from salas;
select * from usuarios;
select * from reservas;


----Creación usuario administrador

CREATE USER 'admin'@'localhost' IDENTIFIED BY '1234';
GRANT
SELECT, INSERT, DELETE
ON bookroom.usuarios
TO 'admin'@'localhost';

GRANT
INSERT, SELECT, DELETE
ON bookroom.salas
TO 'admin'@'localhost';



