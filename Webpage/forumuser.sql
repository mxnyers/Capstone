create table forumusers(
id int auto_increment not null,
username varchar(100) not null,
password varchar(255) not null,
email varchar(100),
firstname varchar(50),
lastname varchar(50),
type varchar(25) not null DEFAULT 'GUEST',
forum_notifcation enum('0','1') default '1',
PRIMARY KEY (id)
);

insert into forumusers(id,username,password,email,firstname,lastname) 
values (1,"test1","testa","drinkalljustin@yahoo.com","Justin","Drinkall");
insert into forumusers(id,username,password,email,firstname,lastname) 
values (2,"test2","testb","drinkalljustin2@yahoo.com","Justin2","Drinkall2");

DROP TABLE festivalcategory;
create table festivalcategory(
id int auto_increment not null,
category_title varchar(150) not null,
category_description varchar(255) not null,
lastpost_date datetime,
lastuser_posted int,
Primary key(id)
);

insert into festivalcategory(category_title, category_description) values("Festival Reviews", "Come here to see what people are saying about Festivals!");

drop table topics;
drop table posts;


create table topics (
id int auto_increment not null,
category_id int not null,
topic_title varchar(50) not null,
topic_creator int not null,
topic_last_user int,
topic_date datetime not null,
topic_reply_date datetime not null,
topic_views int not null default 0 ,
Primary key (id)
 );

create table posts (
id int auto_increment not null,
category_id int not null,
topic_id int not null,
post_creator int not null,
post_content text,
post_date datetime not null,
Primary key (id)
 );
 
create table postsv2 (
id int auto_increment not null,
category_id int not null,
topic_id int not null,
post_creator int not null,
post_content int,
post_date datetime not null,
Primary key (id),
Foreign Key (topic_id) references topics(id)
 );