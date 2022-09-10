create database crud;
use crud;

create table task (
    id int auto_increment primary key,
    titulo varchar(50),
    descripcion text, 
    fecha date
);