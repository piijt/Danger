-- tag enum('html', 'php', 'sql', 'javaScript', 'CSS', 'Ruby', 'Python', 'C', 'C#');
drop database if exists yadda;
create database yadda;
use yadda;

drop table if exists user;
create table user (
id int unsigned not null auto_increment, 
uid varchar(8) not null,
first varchar(245) not null,
last varchar(245) not null,
email varchar(245) not null,
password blob(10) not null,
mediaurl varchar(64) not null,
mimetype varchar(32) not null,
activated tinyint(1) not null,
profile enum('admin', 'regular') not null default 'regular',
primary key (id)
)ENGINE=innoDB default CHARSET=latin1;

drop table if exists yadda;
create table yadda (
id int unsigned not null auto_increment,
content varchar(167) not null,
primary key (id),
foreign key (id) references user(id)
);

drop table if exists yaddaImg;
create table yaddaImg (
id int unsigned not null auto_increment,
mediaurl varchar(64) not null,
mimetype varchar(32) not null,
primary key (id),
foreign key(id) references yadda(id)
);


INSERT INTO user (id, uid, first, last,  email, password, mediaurl, mimetype, activated, profile) VALUES
(1, 'Yadda', 'Yadda', 'Yaddasen', 'Yadda@yadda.com', 'Yadda', '', '', '1','admin'),
(2, 'Peeta', 'Peter', 'Jespersen', 'Peter@yadda.com', 'Yadda', '', '', '1','regular'),
(3, 'Frede', 'Frederik', 'Bruun', 'Frederik@yadda.com', 'Yadda', '', '', '1','regular');

INSERT INTO yadda (id, content) VALUES
(1, 'What is PHP?'),
(2, 'What does PHP stand for?'),
(3, 'I think I found a bug! Who should I tell?');












