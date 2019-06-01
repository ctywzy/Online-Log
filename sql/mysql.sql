create database final default character set utf8 collate utf8_unicode_ci;
use final;

create table users(
	id integer auto_increment primary key,
	uname varchar(50) not null,
	password varchar(50) not null,
	uemail varchar(50) not null,
	role varchar(50) ,

	create_at timestamp
);

create table logs(
	id integer auto_increment primary key,
	user_email varchar(100) not null,
	content varchar(10000) not null,
	ltime varchar(50) not null,
	create_on timestamp
);

create table puser(
	id integer auto_increment primary key,
	pemail varchar(50) not null,
	password varchar(50) not null,
	token varchar(100),
	status tinyint(1)
);

insert into users(uname,password,uemail,role) values("Admin","Wzy02130.0","wangzu@phpstudywzy.xyz","Admin");
