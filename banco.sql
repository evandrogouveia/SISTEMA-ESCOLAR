create database banco_escola;

use banco_escola;

create table aluno(
     idaluno integer auto_increment primary key,
     matricula varchar(20)not null,
     nome varchar(50)not null,
     telefone varchar(20)not null,
     sexo varchar(5)not null,
     email varchar(50)not null
    
);

create table endereco(
     idendereco integer auto_increment primary key,
     endereco varchar(50)not null,
     bairro varchar(50)not null,
     cep varchar(20)not null,
     cidade varchar(50)not null,
     estado varchar(20)not null,
     idaluno integer
);

alter table endereco add constraint fkendaluno
   foreign key(idaluno)references aluno(idaluno)
   on delete cascade;


alter table aluno add column idcurso integer unsigned;

alter table aluno add column datanasc date not null;

alter table aluno add column estadocivil varchar(20) not null, add column nacionalidade varchar(20) not null;

alter table aluno add constraint fkalunocurso
    foreign key(idcurso) references cursos(idcurso)
    on delete cascade;

alter table aluno add column foto varchar(50);
