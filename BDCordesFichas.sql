

CREATE TABLE tipousuario
(
    id serial PRIMARY KEY,
    nombre character(100) NOT NULL,
    descripcion character(100) NOT NULL,
    estado integer
);

INSERT INTO tipousuario VALUES(1, 'ADMINISTRADOR', 'ADMINISTRADOR Y JEFE', 0);
INSERT INTO tipousuario VALUES(2, 'FICHAJE', 'RECEPCIONA LA FICHAS MEDICAS', 0);
INSERT INTO tipousuario VALUES(3, 'ASEGURADOS', 'PACIENTES DE LA CAJA CORDES REGIONAL SANTA CRUZ', 0);


CREATE TABLE modulos
(
    id serial PRIMARY KEY,
    nombre character(40) NOT NULL,
    observacion character(40) NOT NULL,
    archivo character(60) NOT NULL,
    nivel integer NOT NULL,
    estado integer,
    icono_archivo character(40)
);
---Pacientes------------------------------------------
INSERT INTO modulos VALUES(1,'FICHAS','OK','GestionFicha.php',1,0,'fa fa-list-alt'); 
---Fichaje--------------------------------------------
INSERT INTO modulos VALUES(2,'MEDICOS','OK','GestionMedico.php',1,0,'fa fa-user-md'); 
INSERT INTO modulos VALUES(3,'HORARIO','OK','GestionHorario.php',1,0,'fa fa-pencil-square-o'); 
INSERT INTO modulos VALUES(4,'FICHAS','OK','GestionAdmFicha.php',1,0,'fa fa-list-alt'); 
---Administrador---------------------------------------
INSERT INTO modulos VALUES(5,'MODULOS','OK','GestionAdmModulo.php',1,0,'fa fa-desktop'); 
INSERT INTO modulos VALUES(6,'MEDICOS','OK','GestionAdmMedico.php',1,0,'fa fa-user-md'); 
INSERT INTO modulos VALUES(7,'FICHAS','OK','GestionAdmFicha.php',1,0,'fa fa-list-alt'); 
INSERT INTO modulos VALUES(8,'USUARIOS','OK','GestionAdmUsuario.php',1,0,'fa fa-user'); 
INSERT INTO modulos VALUES(9,'ESPECIALIDAD','OK','GestionAdmEspecialidad.php',1,0,'fa fa-pencil-square-o'); 
INSERT INTO modulos VALUES(10,'ASEGURADOS','OK','GestionAdmAsegurado.php',1,0,'fa fa-male')
INSERT INTO modulos VALUES(11,'EMPRESAS','OK','GestionAdmEmpresa.php',1,0,'fa fa-building-o')


/*INSERT INTO modulos VALUES(1,'Dashboard','OK','Dashboard.php',1,0,'fa fa-pie-chart'); 
INSERT INTO modulos VALUES(2,'Entrantes','OK','Entrantes.php',1,0,'fa fa-envelope-o'); 
INSERT INTO modulos VALUES(3,'Pendientes','OK','Pendientes.php',1,0,''); 
INSERT INTO modulos VALUES(4,'Enviados','OK','Enviados.php',1,0,'fa fa-location-arrow'); 
INSERT INTO modulos VALUES(5,'Historial','OK','Historial.php',1,0,'root'); 
INSERT INTO modulos VALUES(6,'Documentos','OK','Documentos.php',1,0,'fa fa-file'); 
INSERT INTO modulos VALUES(7,'Archivados','OK','Archivados.php',1,0,'fa fa-archive'); 
INSERT INTO modulos VALUES(8,'Usuarios','OK','Usuarios.php',1,0,'fa fa-user'); 
INSERT INTO modulos VALUES(9,'Encaminamiento','OK','Encaminamiento.php',1,0,'fa fa-file-text'); 
INSERT INTO modulos VALUES(10,'Recepcion','OK','Recepcion.php',1,0,'fa fa-book'); 
INSERT INTO modulos VALUES(11,'CITE','OK','Cite.php',1,0,'fa fa-book'); 
*/


CREATE TABLE mod_tipousuario
(
    id serial primary key, 
    id_tipousuario BIGINT UNSIGNED ,
    id_modulos BIGINT UNSIGNED ,
    mod_tipousuario_fech_install date NOT NULL,
    FOREIGN KEY(id_tipousuario)  REFERENCES tipousuario(id)
    on DELETE CASCADE
    on UPDATE CASCADE,    
    FOREIGN KEY(id_modulos)  REFERENCES modulos(id)
    on DELETE CASCADE
    on UPDATE CASCADE
);

--PACIENTES
INSERT INTO mod_tipousuario (id_tipousuario,id_modulos,mod_tipousuario_fech_install)  VALUES(3,1,now());
--FICHAJE
INSERT INTO mod_tipousuario (id_tipousuario,id_modulos,mod_tipousuario_fech_install)  VALUES(2,2,now());
INSERT INTO mod_tipousuario (id_tipousuario,id_modulos,mod_tipousuario_fech_install)  VALUES(2,3,now());
INSERT INTO mod_tipousuario (id_tipousuario,id_modulos,mod_tipousuario_fech_install)  VALUES(2,4,now());
--Administrador
INSERT INTO mod_tipousuario (id_tipousuario,id_modulos,mod_tipousuario_fech_install)  VALUES(1,5,now());
INSERT INTO mod_tipousuario (id_tipousuario,id_modulos,mod_tipousuario_fech_install)  VALUES(1,6,now());
INSERT INTO mod_tipousuario (id_tipousuario,id_modulos,mod_tipousuario_fech_install)  VALUES(1,7,now());
INSERT INTO mod_tipousuario (id_tipousuario,id_modulos,mod_tipousuario_fech_install)  VALUES(1,8,now());
INSERT INTO mod_tipousuario (id_tipousuario,id_modulos,mod_tipousuario_fech_install)  VALUES(1,9,now());
INSERT INTO mod_tipousuario (id_tipousuario,id_modulos,mod_tipousuario_fech_install)  VALUES(1,10,now());
INSERT INTO mod_tipousuario (id_tipousuario,id_modulos,mod_tipousuario_fech_install)  VALUES(1,11,now());


CREATE TABLE acciones
(
    id serial primary key,
    id_modulos BIGINT UNSIGNED ,
    accion numeric,
    descripcion character(60),
    parametros character(40),
    estado integer,
    FOREIGN KEY(id_modulos)  REFERENCES modulos(id)
    on UPDATE CASCADE
    on DELETE CASCADE
    
);
--Menu de Fichas Pacientes
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(1,1,'Registrar','opcion=1' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(1,2,'Historial','opcion=2' ,0);

--Menu de Administradora de Fichajes
--Medicos-----------
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(2,1,'Ver Medicos','opcion=1' ,0);
--Horario-----------
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(3,1,'Ver Horario','opcion=1' ,0);
--Ver Fichas-----------
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(4,1,'Ver Fichas','opcion=1' ,0);
--Menu de Administradora de Fichajes
---modulos------------
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(5,1,'Registrar','opcion=1' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(5,2,'Modificar','opcion=2' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(5,3,'Ver Modulos','opcion=3' ,0);
---medicos
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(6,1,'Registrar','opcion=1' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(6,2,'Modificar','opcion=2' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(6,3,'Ver Medicos','opcion=3' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(6,4,'Dar Baja Medico','opcion=4' ,0);
---fichas
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(7,1,'Registrar','opcion=1' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(7,2,'Modificar','opcion=2' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(7,3,'Ver Fichas','opcion=3' ,0);
---Usuario
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(8,1,'Registrar','opcion=1' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(8,2,'Modificar','opcion=2' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(8,3,'Ver Usuarios','opcion=3' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(8,4,'Dar Baja Usuarios','opcion=4' ,0);
---Especialidad
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(9,1,'Registrar','opcion=1' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(9,2,'Ver Especialidad','opcion=2' ,0);
---Asegurados
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(10,1,'Registrar','opcion=1' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(10,2,'Ver Asegurados','opcion=2' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(10,3,'Reporte','opcion=3' ,0);
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(10,4,'Estado Afiliado','opcion=4' ,0);
--Empresas
INSERT INTO acciones (id_modulos,accion,descripcion,parametros,estado) VALUES(11,1,'Adm. Empresas','opcion=1' ,0);


create table usuario(
    id serial PRIMARY KEY,
    nombre varchar(50) not null,
    apellido varchar(50) not null,
    username VARCHAR(50) not null,
    password VARCHAR(100) not null,
    estado int not null,
    fecha date not null,
    id_tipousuario BIGINT UNSIGNED not null,
    FOREIGN Key (id_tipousuario) REFERENCES tipousuario (id)
    on DELETE CASCADE
    on UPDATE CASCADE
);

--$2y$10$5f6Y41SLYh22a/y6kZ.yrexe8wpbYv/9ThcPsPsqiwC18otPYmjM2   = cordes123
insert into usuario (nombre,apellido,username,password,estado,fecha,id_tipousuario) 
values ('GUADALUPE','MORON ARANDIA','guadalupe','$2y$10$5f6Y41SLYh22a/y6kZ.yrexe8wpbYv/9ThcPsPsqiwC18otPYmjM2',0,now(),2);

insert into usuario (nombre,apellido,username,password,estado,fecha,id_tipousuario) 
values ('NATHALIA','CUELLAR SALDAÑA','nathalia','$2y$10$5f6Y41SLYh22a/y6kZ.yrexe8wpbYv/9ThcPsPsqiwC18otPYmjM2',0,now(),2);

insert into usuario (nombre,apellido,username,password,estado,fecha,id_tipousuario) 
values ('EDWIN EDSON','SUYO ALBORNOS','edwin','$2y$10$5f6Y41SLYh22a/y6kZ.yrexe8wpbYv/9ThcPsPsqiwC18otPYmjM2',0,now(),1);


--Procedimiento almacenados para Verificar Usuario
CREATE OR REPLACE FUNCTION VerificarUsuario (usuario VARCHAR,contrasena VARCHAR) 
    RETURNS TABLE (
        id int,
    	nombre varchar,
    	apellido varchar,
    	username VARCHAR,
    	password VARCHAR,
    	estado int ,
    	grupo_id int
) 
AS $$
BEGIN
    RETURN QUERY SELECT
	u.id,
	u.nombre,
	u.apellido,
	u.username,
	u.password,
	u.estado,
	u.grupo_id
	from usuario u where u.username=usuario and u.password=contrasena;
END; $$ 
LANGUAGE 'plpgsql';

select * from VerificarUsuario ('esuyo','cordes123');


create table paciente(
    id serial primary key,
    carnet varchar(20) null,
    matricula varchar (20) not null,
    nombre varchar (100)  null,
    genero char(1) null,
    fecha_nacimiento date  null,
    empresa varchar(200) null,
    parentesco varchar(50)  null,
    regional varchar(20)  null,
    estado varchar(1) null   
);

LOAD DATA INFILE '/var/www/html/afiliados.csv' INTO TABLE paciente
FIELDS TERMINATED BY ';' ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

--antiguo--------------
create table medico(
    id serial primary key,
    codigo varchar(10)null,
    nombre varchar (100) null,
    especialidad varchar(100) null,
    estado int null
);

create table especialidad(
    id serial primary key,
    nombre varchar (100) not null,
    estado int not null 
);

insert into especialidad (nombre,estado) values ('MEDICINA INTERNA',0);
insert into especialidad (nombre,estado) values ('MEDICINA LABORAL',0);
insert into especialidad (nombre,estado) values ('MEDICINA GENERAL',0);
insert into especialidad (nombre,estado) values ('MEDICINA GENERAL-COVID-19',0);
insert into especialidad (nombre,estado) values ('CIRUGIA GENERAL',0);
insert into especialidad (nombre,estado) values ('PEDIATRIA',0);
insert into especialidad (nombre,estado) values ('GINECOLOGIA',0);
insert into especialidad (nombre,estado) values ('OFTALMOLOGIA',0);
insert into especialidad (nombre,estado) values ('OTORRINOLARINGOLOGIA',0);
insert into especialidad (nombre,estado) values ('TRAUMATOLOGIA',0);
insert into especialidad (nombre,estado) values ('CARDIOLOGIA',0);
insert into especialidad (nombre,estado) values ('NEUROCIRUGIA',0);
insert into especialidad (nombre,estado) values ('UROLOGIA',0);
insert into especialidad (nombre,estado) values ('NEUMOLOGIA',0);
insert into especialidad (nombre,estado) values ('NEFROLOGIA',0);
insert into especialidad (nombre,estado) values ('ENDOCRINOLOGIA',0);
insert into especialidad (nombre,estado) values ('ENDOCRINOLOGIA PEDIATRICA',0);
insert into especialidad (nombre,estado) values ('PROGTOLOGIA',0);
insert into especialidad (nombre,estado) values ('CARDIOVASCULAR -CIRUJANO TORAX',0);
insert into especialidad (nombre,estado) values ('REUMATOLOGIA',0);
insert into especialidad (nombre,estado) values ('DERMATOLOGIA',0);
insert into especialidad (nombre,estado) values ('CIRUGIA ONCOLOGICA',0);
insert into especialidad (nombre,estado) values ('EMERGENCIA',0);
insert into especialidad (nombre,estado) values ('ODONTOLOGIA',0);
insert into especialidad (nombre,estado) values ('MASTOLOGIA',0);
insert into especialidad (nombre,estado) values ('CIRUGIA PEDIATRICA',0);
insert into especialidad (nombre,estado) values ('NUTRICION',0);
insert into especialidad (nombre,estado) values ('PSICOLOGIA',0);


----nuevo---------------
create table medico(
    id serial primary key,
    codigo varchar(10)null,
    nombre varchar (100) null,
    apellido_p varchar (100) null,
    apellido_m varchar (100) null,
    genero char not null,
    direccion varchar(100) null,
    estado int null
);

INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('21','ALEXANDER','LOPEZ','VILTE','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('28','MIGUEL ANGEL','GOITIA','IBAÑEZ','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('24','GRISELDA','VILLARROEL','RAMALLO','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('66','JACKELYA','VELASQUEZ','CORTEZ','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('31','KATHERINE CECILIA','ARANDIA','RODRIGUEZ','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('65','VIVIAN','TRUJILLO','PARADA COIMBRA','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('34','ADOLFO','MALDONADO','TORREZ','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('33','ELENA ISABEL','PARADA','COIMBRA','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('60','KEVIN CESAR','VALVERDE','ESCOBAR','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('6','VANY LORENA','QUISPE','SANCHEZ','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('43','ERNESTO ELOY','SALVATIERRA','ALVAREZ','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('40','MIGUEL ANGEL','DELGADILLO','SANCHEZ','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('18','PAULA','FLORES','MORALES','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('17','PAOLA G.',' AYALA','ROJAS','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('55','RODRIGO ALEXIS','ZABALA','VELARDE','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('62','EDUARDO LUIS','CHURQUI','CALIZAYA','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('59','DANIELA SYDNEY.','MARQUEZ','ALANOCA','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('58','FATIMA GERALDINE','ROJAS','PADILLA','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('23','MARIA SUSANA','SALINAS','LUPA','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('22','VICTOR HUGO','GUERRERO','DURAN','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('27','ESTHER','VASQUEZ','MONDAQUE','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('30','HELEN','PAMELA','GUZMAN','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('64','MARGARITA MARIA PATRICIA','ARTEAGA','JIMENEZ','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('26','CLAUDIO MARCELO','PEÑARRIETA','CHAGA','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('25','JUAN MANUEL','ZALLES','ESPAÑA','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('37','BENJAMIN LUIS','RODRIGUEZ','AGUILAR','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('42','NOELIA VANESSA','GONZALES','ROCA','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('38','CARMEN JUDITH','BUCETT','SANTA CRUZ','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('35','JAIME','COLQUE','ARCE','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('53','WILBER','TOLA','YUPANQUI','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('36','RENE SILVESTRE','MORENO','IQUISE','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('48','VANIA SUSANA','SANCHEZ','YUCRA','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('47','WILSON','CHOQUE','CHOQUE','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('54','ROLY','MAMANI','MOLINA','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('39','HUGO','BECERRA','CABALLERO','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('41','SABINO','JIMENEZ','VARGAS','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('32','VIVIAN MABEL','ORSI','DORADO','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('29','JESSIE','LAGUNA','EID','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('44','SERGIO','CHUNGARA','REYNOLDS','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('45','HENRY','JANCO','LLANOS','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('16','AHMED ASIN','SALVATIERRA','BARRETO','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('9','DEIVIS FRANCO','MAMANI','RODRIGUEZ','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('11','EDUARDO','QUINTELA','ROJAS','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('7','LILIANA','GUTIERREZ','ARAMAYO','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('4','JONATHAN EDGAR','DELGADILLO','VILLARROEL','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('1','JOSE MANUEL','BALDIVIEZO','CONDE','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('2','ROMINA ALEJANDRA','RODA','CUELLAR','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('3','TANIA FABIOLA','SACACA','ROCHA','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('50','LIZETH','CALLE','VALDA','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('46','GERARDO','GOMEZ','MENDEZ','M','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('-','YOSSELINE','PEREZ','PEREZ','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('-','JANETH ELSA','PEREIRA','ZARATE','F','ninguno',0);
INSERT INTO medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) values ('-','MONICA C.','GANDARILLAS','TORO','F','ninguno',0);



create table medicoespecialidad(
    id serial primary key,
    idmedico BIGINT UNSIGNED,
    idespecialidad BIGINT UNSIGNED,
    estado int not null,
    FOREIGN Key (idmedico) REFERENCES medico (id)
    on DELETE CASCADE
    on UPDATE CASCADE,
    FOREIGN Key (idespecialidad) REFERENCES especialidad (id)
    on DELETE CASCADE
    on UPDATE CASCADE
);

insert into medicoespecialidad (idmedico,idespecialidad,estado) values (1,1,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (2,1,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (3,1,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (4,1,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (5,2,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (6,2,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (7,3,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (8,3,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (9,3,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (10,4,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (11,5,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (12,5,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (13,6,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (14,6,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (15,6,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (16,6,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (17,6,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (18,7,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (19,7,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (20,7,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (21,7,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (22,8,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (23,9,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (24,10,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (25,10,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (26,11,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (27,11,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (28,12,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (29,13,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (30,13,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (31,14,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (32,15,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (33,16,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (34,17,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (35,18,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (36,19,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (37,20,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (38,21,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (39,22,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (40,22,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (41,23,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (42,23,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (43,23,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (44,23,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (45,24,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (46,24,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (47,24,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (48,24,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (49,25,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (50,26,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (51,27,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (52,28,0);
insert into medicoespecialidad (idmedico,idespecialidad,estado) values (53,28,0);

LOAD DATA INFILE '/var/www/html/medicos.csv' INTO TABLE medico
FIELDS TERMINATED BY ';' ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;


create table horario(
    id serial primary key,
    horario varchar (50) not null,
    turno varchar(10) not null,
    estado int not null
);

insert into horario(horario,turno,estado) values ('8:00-12:00','Mañana',0);
insert into horario(horario,turno,estado) values ('14:00-18:00','Tarde',0);

create TABLE diasemana(
    id serial primary key,
    nro int not null,
    nombre varchar (15),
    estado int not null
);

insert into diasemana (nro,nombre,estado) values (1,'LUNES',0);
insert into diasemana (nro,nombre,estado) values (2,'MARTES',0);
insert into diasemana (nro,nombre,estado) values (3,'MIERCOLES',0);
insert into diasemana (nro,nombre,estado) values (4,'JUEVES',0);
insert into diasemana (nro,nombre,estado) values (5,'VIERNES',0);
insert into diasemana (nro,nombre,estado) values (6,'SABADO',0);
insert into diasemana (nro,nombre,estado) values (7,'DOMINGO',0);


CREATE TABLE horariomedico
(
    id serial primary key, 
    idhorario BIGINT UNSIGNED,
    idmedico BIGINT UNSIGNED,
    estado int not null,
    FOREIGN KEY(idhorario)  REFERENCES horario(id)
    on DELETE CASCADE
    on UPDATE CASCADE,    
    FOREIGN KEY(idmedico)  REFERENCES medico(id)
    on DELETE CASCADE
    on UPDATE CASCADE
);

---Pediatria----
insert into horariomedico(idhorario,idmedico,estado) values (1,15,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,15,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,17,0);
---Ginecologia---
insert into horariomedico(idhorario,idmedico,estado) values (1,27,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,27,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,18,0);
---Urologia---
insert into horariomedico(idhorario,idmedico,estado) values (1,29,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,30,0);                  
---Oftalmologia---
insert into horariomedico(idhorario,idmedico,estado) values (1,22,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,22,0);
---Traumatologia---
insert into horariomedico(idhorario,idmedico,estado) values (1,24,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,24,0);
---Traumatologia---
insert into horariomedico(idhorario,idmedico,estado) values (1,25,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,25,0);
---Medicina Laboral---
insert into horariomedico(idhorario,idmedico,estado) values (1,6,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,5,0);
------Dermatologia------
insert into horariomedico(idhorario,idmedico,estado) values (1,38,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,38,0);
-------Endocrinologia---
insert into horariomedico(idhorario,idmedico,estado) values (1,34,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,34,0);
-------odontologia---
insert into horariomedico(idhorario,idmedico,estado) values (1,45,0);
insert into horariomedico(idhorario,idmedico,estado) values (1,46,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,47,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,48,0);
-------Nuticion---
insert into horariomedico(idhorario,idmedico,estado) values (1,51,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,51,0);
-------Psicologia---
insert into horariomedico(idhorario,idmedico,estado) values (1,52,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,52,0);
insert into horariomedico(idhorario,idmedico,estado) values (1,53,0);
insert into horariomedico(idhorario,idmedico,estado) values (2,53,0);
----------------------------------------------------------------------
create table cupo (
    id serial primary key,
    idhorariomedico BIGINT UNSIGNED,
    horainicio time not null,
    horafinal time not null,
    timeconsulta int not null, 
    cupo int not null,  
    estado int not null,
    FOREIGN key (idhorariomedico) REFERENCES horariomedico (id)
    on DELETE CASCADE
    on UPDATE CASCADE
);

-----------cupo------------------------------------------
-----------cupo anterior--------------------------------
create table cupo(
    id serial primary key, 
    idmedico BIGINT UNSIGNED,
    cantidad int not null,
    estado int not null,
    FOREIGN Key (idmedico) REFERENCES medico (id)
    on DELETE CASCADE
    on UPDATE CASCADE
);

insert into cupo (idmedico,cantidad,estado) values (15,6,0);
insert into cupo (idmedico,cantidad,estado) values (17,4,0);
insert into cupo (idmedico,cantidad,estado) values (30,6,0);
insert into cupo (idmedico,cantidad,estado) values (29,6,0);
insert into cupo (idmedico,cantidad,estado) values (22,2,0);

insert into cupo (idmedico,cantidad,estado) values (24,4,0);
insert into cupo (idmedico,cantidad,estado) values (25,4,0);
insert into cupo (idmedico,cantidad,estado) values (51,4,0);
insert into cupo (idmedico,cantidad,estado) values (52,4,0);
insert into cupo (idmedico,cantidad,estado) values (53,4,0);

insert into cupo (idmedico,cantidad,estado) values (45,2,0);
insert into cupo (idmedico,cantidad,estado) values (46,2,0);
insert into cupo (idmedico,cantidad,estado) values (47,2,0);
insert into cupo (idmedico,cantidad,estado) values (48,2,0);
insert into cupo (idmedico,cantidad,estado) values (38,2,0);
insert into cupo (idmedico,cantidad,estado) values (34,2,0);

------------------------------------------------------------

create table diamedico(
    id serial primary key,
    iddiasemana BIGINT UNSIGNED ,
    idmedico BIGINT UNSIGNED ,
    estado int not null,
    FOREIGN Key (idmedico) REFERENCES medico (id)
    on DELETE CASCADE
    on UPDATE CASCADE,
    FOREIGN Key (iddiasemana) REFERENCES diasemana (id)
    on DELETE CASCADE
    on UPDATE CASCADE
);

-------Psicologia---

insert into diamedico (iddiasemana,idmedico,estado) values (1,52,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,53,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,52,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,53,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,52,0);

-------Nuticion---

insert into diamedico (iddiasemana,idmedico,estado) values (1,51,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,51,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,51,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,51,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,51,0);

-------odontologia---

insert into diamedico (iddiasemana,idmedico,estado) values (1,45,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,45,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,45,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,45,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,45,0);

insert into diamedico (iddiasemana,idmedico,estado) values (1,46,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,46,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,46,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,46,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,46,0);

insert into diamedico (iddiasemana,idmedico,estado) values (1,47,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,47,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,47,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,47,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,47,0);

insert into diamedico (iddiasemana,idmedico,estado) values (1,48,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,48,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,48,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,48,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,48,0);

-------Endocrinologia---
insert into diamedico (iddiasemana,idmedico,estado) values (1,34,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,34,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,34,0);
-------------------Dermatologia---------------------------------
insert into diamedico (iddiasemana,idmedico,estado) values (1,38,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,38,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,38,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,38,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,38,0);

-------------------Traumatologia---------------------------------
insert into diamedico (iddiasemana,idmedico,estado) values (1,24,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,25,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,24,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,25,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,24,0);
-------------------Medicina Laboral------------------------------

insert into diamedico (iddiasemana,idmedico,estado) values (1,6,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,6,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,6,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,6,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,6,0);


insert into diamedico (iddiasemana,idmedico,estado) values (1,5,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,5,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,5,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,5,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,5,0);

----------------------------------------------------------------
insert into diamedico (iddiasemana,idmedico,estado) values (1,15,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,15,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,15,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,15,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,15,0);

insert into diamedico (iddiasemana,idmedico,estado) values (1,17,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,17,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,17,0);


insert into diamedico (iddiasemana,idmedico,estado) values (1,18,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,18,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,18,0);

insert into diamedico (iddiasemana,idmedico,estado) values (1,30,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,30,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,30,0);


insert into diamedico (iddiasemana,idmedico,estado) values (1,27,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,27,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,27,0);


insert into diamedico (iddiasemana,idmedico,estado) values (2,29,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,29,0);


insert into diamedico (iddiasemana,idmedico,estado) values (1,22,0);
insert into diamedico (iddiasemana,idmedico,estado) values (2,22,0);
insert into diamedico (iddiasemana,idmedico,estado) values (3,22,0);
insert into diamedico (iddiasemana,idmedico,estado) values (4,22,0);
insert into diamedico (iddiasemana,idmedico,estado) values (5,22,0);


create table reserva(
    id serial primary key,
    fecha date not null,
    color varchar(255) not null,
    turno varchar(255) not null,
    horareserva varchar (255) not null,
    cupo int not null,
    idturno int not null,
    idpaciente BIGINT UNSIGNED,
    idmedico BIGINT UNSIGNED,
    FOREIGN Key (idpaciente) REFERENCES paciente(id)
    on DELETE CASCADE
    on UPDATE CASCADE,
    FOREIGN Key (idmedico) REFERENCES medico (id)
    on DELETE CASCADE
    on UPDATE CASCADE
);

insert into reserva (fecha,color,turno,cupo,idturno,idpaciente,idmedico) values ('2023-11-20','#FF0F0','MAÑANA 8:00-12:00',1,4,36,1);

create table consultavirtual(
    id serial primary key,
    distanciaconsulta int not null,
    estado int not null
);


insert into consultavirtual(distanciaconsulta,estado) values(4,0);

--15 zabala

create table afiliado(
    id serial primary key,
    matricula_titular varchar (20) null,
    matricula_beneficiario varchar (20) null,
    nombre varchar(50) null,
    apellido_pat varchar(50) null,
    apellido_mat varchar(50) null,
    fecha_nacimiento date null,
    ci varchar(20) null,
    expirado varchar(50) null,
    genero varchar (10) null,
    factorrh varchar(20) null,
    grupo varchar(10) null,
    puntocardinal varchar (20) null,
    zona varchar(250) null,
    calle varchar(250) null,
    nro varchar(50) null,
    localidad varchar(250) null,
    telefono varchar(50) null,
    correo varchar(250)null,
    empresa varchar(250) null,
    numeropatronal varchar (50) not null,
    nroempleador varchar(250) null,
    ocupacion varchar (250) null,
    fecha_ingreso date null,
    salario  float null,
    categoria varchar(250) null,
    parentesco varchar (100) null,
    fecha_presentacion date null,
    fecha_recepcion date null,
    recepcion varchar(50) null,
    regional varchar(250) null,
    baja varchar(50) null,
    fecha_baja date null,
    fecha_limite date null,
    fecha_extincion date null,
    vivo varchar(50) null,
    cotiza varchar(50) null,
    edad varchar(4) null,
    fecha_verificacion date null 
)

LOAD DATA INFILE '/var/www/html/afiliacion.csv' 
INTO TABLE afiliado 
FIELDS TERMINATED BY ';' ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
(apellido_pat,apellido_mat,nombre,matricula_titular,fecha_nacimiento,genero,edad,fecha_ingreso,empresa,numeropatronal,fecha_presentacion,ci,expirado,factorrh,grupo,categoria,parentesco,fecha_extincion,matricula_beneficiario,recepcion,fecha_verificacion,vivo,baja,regional,cotiza)
IGNORE 1 LINES;


LOAD DATA INFILE '/var/www/html/afiliacion.csv' 
INTO TABLE afiliado
FIELDS TERMINATED BY ';' ENCLOSED BY '"'
LINES TERMINATED BY '\n'
(apellido_pat,apellido_mat,nombre,matricula_titular,fecha_nacimiento,genero,edad,fecha_ingreso,empresa,numeropatronal,fecha_presentacion,ci,expirado,factorrh,grupo,categoria,parentesco,fecha_extincion,matricula_beneficiario,recepcion,fecha_verificacion,vivo,baja,regional,cotiza);

SET expired_date = STR_TO_DATE(@expired_date, '%m/%d/%Y');


create table empresa(
    id serial primary key,
    nombre varchar(250) null,
    codigoempleador varchar(250) null,
    representante varchar (250) null,
    numeropatronal varchar(250),
    telefono varchar (100) null,
    direccion varchar (250) null,
    regional varchar (250) null,
    fechainicio date null,
    fechafinal date null,
    fechaingreso date null,
    estado int not null
)

create table historiaempresa(
    id serial primary key,
    idempresa int not null,
    descripcion varchar (255) not null,
    fechainicio date not null,
    fechafinal date not null,
    fechadesbloqueo date not null,
    estado int not null
);

LOAD DATA INFILE '/var/www/html/nombre_emp.csv' 
INTO TABLE empresa
FIELDS TERMINATED BY ';' ENCLOSED BY '"'
LINES TERMINATED BY '\n'
(nombre,codigoempleador,numeropatronal);

------------------------------------------------------
LOAD DATA INFILE '/var/www/html/nombre_empresas.csv' 
INTO TABLE empresa
FIELDS TERMINATED BY ';' ENCLOSED BY '"'
LINES TERMINATED BY '\n'
(nombre,codigoempleador,numeropatronal,estado);



-------------------------
ALTER TABLE afiliado ADD INDEX enc_ter_usu(id,matricula_titular, matricula_beneficiario, nombre,apellido_pat,apellido_mat,empresa)


create table parentesco(
    id serial primary key,
    nro int not null,
    nombre varchar (250) not null,
    estado int not null
)

insert into parentesco (nro,nombre,estado) values (1,'TITULAR',1);
insert into parentesco (nro,nombre,estado) values (2,'ESPOSA(O) TITULAR',1);
insert into parentesco (nro,nombre,estado) values (3,'CONVIVIENTE TITULAR',1);
insert into parentesco (nro,nombre,estado) values (4,'PADRES TITULAR',1);
insert into parentesco (nro,nombre,estado) values (5,'HIJO(A) TITULAR',1);
insert into parentesco (nro,nombre,estado) values (6,'HERMANO(A) TITULAR',1);
insert into parentesco (nro,nombre,estado) values (7,'MAYOR 19 AÑOS',1);
insert into parentesco (nro,nombre,estado) values (10,'RENTISTA COTIZANTE',1);
insert into parentesco (nro,nombre,estado) values (11,'VIUDA(O)',1);
insert into parentesco (nro,nombre,estado) values (12,'HUERFANO(A)',1);
insert into parentesco (nro,nombre,estado) values (13,'ESPOSA(O) RENTISTA',1);
insert into parentesco (nro,nombre,estado) values (14,'CONVIVENTE RENTISTA',1);
insert into parentesco (nro,nombre,estado) values (15,'RENTISTA DIFUNTO',1);
insert into parentesco (nro,nombre,estado) values (16,'HIJO(A) RENTISTA',1);
insert into parentesco (nro,nombre,estado) values (17,'PADRES RENTISTA',1);
insert into parentesco (nro,nombre,estado) values (27,'SEG. ESTUDIANTIL',1);



insert into parentesco (nro,nombre,estado) values (8,'TITULAR',1);
insert into parentesco (nro,nombre,estado) values (9,'TITULAR',1);