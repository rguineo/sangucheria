create table usuarios(
	id_usuario int not null auto_increment,
	usr_usuario varchar(50),
	pass_usuario varchar(50),
	nom_usuario varchar(50),
	ape_usuario varchar(50),
	lvl_usuario int(1),
	primary key(id_usuario));

create table empresa(
	id_empresa int not null auto_increment,
	rut_empresa varchar(15),
	nom_empresa varchar(50),
	giro_empresa varchar(50),
	dire_empresa varchar(50),
	eml_empresa varchar(60),
	primary key(id_empresa));

create table producto(
	id_prod int not null auto_increment,
	cod_prod int,
	nom_prod varchar(50),
	desc_prod text,
	precio_prod int(10),
	disp_prod int(1),
	public_prod int(1),
	primary key(id_prod));

create table tmp_cotizacion(
	id_prod int not null auto_increment,
	cod_prod int,
	nom_prod varchar(50),
	desc_prod text,
	precio_prod int(10),
	disp_prod int(1),
	public_prod int(1),
	primary key(id_prod));

create table aderezo(
	id_aderezo int not null auto_increment,
	cod_aderezo int,
	nom_aderezo varchar(50),
	precio_aderezo int(15),
	disp_aderezo int(1),
	primary key(id_aderezo));

create table ingredientes(
	id_ingr int not null auto_increment,
	cod_ingr int,
	nom_ingr varchar(50),
	precio_ingr int,
	disp_ingr int(1),
	primary key(id_ingr));

create table refresco(
	id_ref int not null auto_increment,
	cod_ref int,
	nom_ref varchar(50),
	precio_ref int,
	disp_ref int(1),
	primary key(id_ref));

create table venta(
	id_venta int not null auto_increment,
	fecha_venta date,
	hora_venta datetime,
	id_usuario int,
	foreign key(id_usuario) references usuarios(id_usuario),
	primary key(id_venta));

create table det_venta(
	id_detventa int not null,
	id_venta int,
	id_prod int(11) NOT NULL,
	obs_prod varchar(100) NOT NULL,
	uni_prod int(11) NOT NULL,
	val_ing_prod int(11) NOT NULL,
	ing_ext_prod varchar(100) NOT NULL,
	cant_prod int(11) NOT NULL,
	tot_prod int(11) NOT NULL,
	foreign key(id_venta) references venta(id_venta),
	primary key(id_detventa));

create table temp(
	id_temp int(11) NOT NULL,
	id_prod int(11) NOT NULL,
	obs_prod varchar(100) NOT NULL,
	uni_prod int(11) NOT NULL,
	val_ing_prod int(11) NOT NULL,
	ing_ext_prod varchar(100) NOT NULL,
	cant_prod int(11) NOT NULL,
	tot_prod int(11) NOT NULL);

create table ing_extra(
	id_ext_ing int not null auto_increment,
	id_ingr int,
	id_detventa int,
	foreign key(id_ingr) references ingredientes(id_ingr),
	foreign key(id_detventa) references det_venta(id_detventa),
	primary key(id_ext_ing));

create table aderezo_pedido(
	id_ader_pedido int not null auto_increment,
	cant_ader_pedido int,
	id_aderezo int,
	id_detventa int,
	foreign key(id_aderezo) references aderezo(id_aderezo),
	foreign key(id_detventa) references det_venta(id_detventa),
	primary key(id_ader_pedido));

create table refresco_pedido(
	id_ref_pedido int not null auto_increment,
	cant_refresco int,
	id_ref int,
	id_detventa int,
	foreign key(id_ref) references refresco(id_ref),
	foreign key(id_detventa) references det_venta(id_detventa),
	primary key(id_ref_pedido));

create table log(
	id_log int not null auto_increment,
	url_log varchar(80),
	fecha datetime,
	primary key(id_log));