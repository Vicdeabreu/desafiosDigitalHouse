create database fakegram;

create table usuarios (
	id int primary key not null auto_increment,
    nome varchar(400) not null,
    nomeUsuario varchar(400) not null,
    img varchar(400) not null,
    senha varchar(400)
);

create table posts (
	id int primary key not null auto_increment,
    usuarios_id int,
    foreign key(usuarios_id) references usuarios(id),
    img varchar(400) not null,
    descricao varchar(400),
    likes int
);

select * from usuarios;
select * from posts;