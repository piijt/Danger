create table(
  uid int unsigned not null auto_increment,
  password blob(10) not null,
  activated tinyint(1) not null default 1,
  profile enum ('admin', 'regular') default 'regular',
  primary key(uid)
);
