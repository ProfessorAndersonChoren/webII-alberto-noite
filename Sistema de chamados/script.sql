create database if not exists call_alberto_night;
use call_alberto_night;
create table if not exists users(
	id tinyint unsigned primary key auto_increment,
    name varchar(50) not null,
    email varchar(30) not null,
    password char(60) not null
);
create table if not exists equipments(
	id tinyint unsigned primary key auto_increment,
    floor tinyint not null,
    room tinyint not null
);
create table if not exists calls(
	id tinyint unsigned primary key auto_increment,
    user_id tinyint unsigned not null,
    equipment_id tinyint unsigned not null,
    classification varchar(5) not null,
    description text not null,
    notes text null,
    constraint fk_user foreign key (user_id) references users(id),
    constraint fk_equipment foreign key (equipment_id) references equipments(id)
);