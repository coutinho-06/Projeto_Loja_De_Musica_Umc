create database groovesound;
use groovesound;

create table tipo_instrumento (
	id_tipo_instrumento int primary key auto_increment,
    tipo_instrumento varchar(50)
);

create table categoria (
	id_categoria int primary key auto_increment,
    categoria varchar(50),
    id_tipo_instrumento int,
    constraint fk_id_tipo_instrumento foreign key (id_tipo_instrumento) references tipo_instrumento (id_tipo_instrumento)
);

create table instrumento (
	id_instrumento int primary key auto_increment,
    nome_instrumento varchar(100),
    valor decimal(10,2),
    id_categoria int,
    constraint fk_id_categoria foreign key (id_categoria) references categoria (id_categoria)
);

create table cliente (
	id_cliente int primary key auto_increment,
    nome varchar(50) not null,
    sobrenome varchar (100) not null,
    data_nascimento date not null,
    cpf char(11) not null unique,
    email varchar(50) not null unique,
    senha varchar(20) not null unique,
    telefone char(11) not null unique
);

create table compra (
	id_compra int primary key auto_increment,
    forma_pagamento enum('Crédito', 'Débito', 'Pix', 'Boleto'),
    data_compra datetime,
    id_instrumento int,
    id_cliente int,
    constraint fk_id_instrumento foreign key (id_instrumento) references instrumento (id_instrumento),
    constraint fk_id_cliente foreign key (id_cliente) references cliente (id_cliente)
);

create table item_compra (
	id_item int primary key auto_increment,
    quantidade int not null,
    valor_unitario decimal(10,2) not null,
    id_compra int,
    id_instrumento int,
    constraint fk_id_compra foreign key (id_compra) references compra (id_compra),
    constraint fk_id_instrumento_item foreign key (id_instrumento) references instrumento (id_instrumento)
);

create table endereco (
	id_endereco int primary key auto_increment,
    estado varchar(30),
    cep char(8),
    numero varchar(6)
);

create table encomenda (
	id_encomenda int primary key auto_increment,
    data_encomenda datetime,
    id_endereco int,
    id_compra int,
    constraint fk_id_endereco foreign key (id_endereco) references endereco (id_endereco),
    constraint fk_id_compra_encomenda foreign key (id_compra) references compra (id_compra)
);

