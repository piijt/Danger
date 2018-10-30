-- tag enum('html', 'php', 'sql', 'javaScript', 'CSS', 'Ruby', 'Python', 'C', 'C#');
drop database if exists yadda;
create database yadda;
use yadda;

drop table if exists user;
create table user (
uid int unsigned not null auto_increment,
first varchar(245) not null,
last varchar(245) not null,
username varchar(8) not null,
email varchar(245) not null,
password blob(10) not null,
mediaurl varchar(64) not null,
mimetype varchar(32) not null,
status tinyint(1) not null,
profile enum('admin', 'regular') not null,
primary key (uid)
);

drop table if exists yadda;
create table yadda (
yid int unsigned not null auto_increment,
content varchar(167) not null,
primary key (yid),
foreign key (yid) references user(uid)
);

drop table if exists yaddaImg;
create table yaddaImg (
imgId int unsigned not null auto_increment,
mediaurl varchar(64) not null,
mimetype varchar(32) not null,
primary key (imgId),
foreign key(imgId) references yadda(yid)
);

create table user( 
  uid int unsigned not null auto_increment, 
  password blob(10) not null, 
  activated tinyint(1) not null default 1, 
  profile enum ('admin', 'regular') default 'regular', 
  primary key(uid)
);
