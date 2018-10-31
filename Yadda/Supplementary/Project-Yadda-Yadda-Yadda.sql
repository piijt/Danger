-- tag enum('html', 'php', 'sql', 'javaScript', 'CSS', 'Ruby', 'Python', 'C', 'C#');

create table images (
  uid varchar(8) not null,
  imageitself blob not null,
  mimetype varchar(32) not null,
  primary key(uid),
  foreign key(uid) references user(uid)
);

drop table if exists user;
drop table if exists yaddaImg;
drop table if exists images;
drop table if exists yadda;

drop database if exists yadda;
create database yadda;
use yadda;

drop table if exists user;
create table user (
uid varchar(8) not null,
first varchar(245) not null,
last varchar(245) not null,
email varchar(245) not null,
password blob not null,
imageitself blob not null,
mimetype varchar(32) not null,
activated boolean not null,
profile enum('admin', 'regular') not null default 'regular',
primary key (uid),
unique(email)
);

create table yadda (
  uid varchar(8) not null,
  tstamp datetime not null,
  content varchar(167) not null,
  primary key (uid, tstamp),
  foreign key (uid) references user(uid)
);


create table yaddaImg (
  uid varchar(8) not null,
  tstamp datetime not null,
  primary key(uid, tstamp),
  foreign key(uid, tstamp) references yadda(uid, tstamp),
  foreign key(uid) references user(uid)
);


INSERT INTO user (uid, first, last,  email, password, imageitself, mimetype, activated, profile) VALUES
('Yadda', 'Yadda', 'Yaddasen', 'Yadda@yadda.com', 'Yadda', '', '', '1','admin'),
('Peeta', 'Peter', 'Jespersen', 'Peter@yadda.com', 'Yadda', '', '', '1','regular'),
('Frede', 'Frederik', 'Bruun', 'Frederik@yadda.com', 'Yadda', '', '', '1','regular');

INSERT INTO yadda (uid, tstamp, content) VALUES
('Peeta', current_timestamp, 'What is PHP?'),
('Frede', current_timestamp, 'What does PHP stand for?'),
('Yadda', current_timestamp, 'I think I found a bug! Who should I tell?');
