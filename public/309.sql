-- 数据库
create database scigroup default character set utf8;


use scigroup;


-- 1.通知公告
create table info(
 infoid int unsigned  key auto_increment,
 title varchar(50),
 content text,
 hints int default 0,
 dateandtime timestamp default current_timestamp
);
insert into info(title,content)values('美国工程院P. Somasundaran院士再次来课题组学术交流','综述金属离子对矿物浮选行为的影响及机理，总结和分析直接因素(金属离子种类、价态和浓度等)与间接因素(目的矿物类别、矿浆溶液化学条件(pH和电位)、浮选药剂等)作用下，金属离子对矿物浮选行为的影响规律。据此，探究特定矿浆溶液化学条件对金属离子活化(抑制)矿物浮选的内在原因，提出金属离子影响矿物浮选行为的直接和间接作用机理，为理解金属离子对矿物浮选行为的影响提供参考。');

/*新闻表*/
create table news(
 id int unsigned  key auto_increment,
 title varchar(50),
 header text,
 imgpath varchar(100) not null,
 content text,
 hints int default 0,
 dateandtime timestamp default current_timestamp
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into news(title,header,imgpath,content)
values
('美国工程院P. Somasundaran院士再次来课题组学术交流','综述金属离子对矿物浮选行为的影响及机理，总结和分析直接因素(金属离子种类、价态和浓度等)与间接因素(目的矿物类别、矿浆溶液化学条件(pH和电位)、浮选药剂等)作用下，金属离子对矿物浮选行为的影响规律。据此，探究特定矿浆溶液化学条件对金属离子活化(抑制)矿物浮选的内在原因，提出金属离子影响矿物浮选行为的直接和间接作用机理，为理解金属离子对矿物浮选行为的影响提供参考。','public/images/lunbo/2.jpg','尚未译完，改天再译 原作者：JOHN O''NOLAN, HANNAH WOLFE 上周是 Ghost 从 Kickstarter 上推广算起的五周年纪念日。 利用这些里程碑来标记重要时刻并反思迄今为止的旅程总是显得很有趣。在上一个四周年纪念日里，我谈到了营收里程碑');
insert into news(title,header,imgpath,content)
values
('美国工程院P. Somasundaran院士再次来课题组学术交流','综述金属离子对矿物浮选行为的影响及机理，总结和分析直接因素(金属离子种类、价态和浓度等)与间接因素(目的矿物类别、矿浆溶液化学条件(pH和电位)、浮选药剂等)作用下，金属离子对矿物浮选行为的影响规律。据此，探究特定矿浆溶液化学条件对金属离子活化(抑制)矿物浮选的内在原因，提出金属离子影响矿物浮选行为的直接和间接作用机理，为理解金属离子对矿物浮选行为的影响提供参考。','public/images/lunbo/2.jpg','尚未译完，改天再译 原作者：JOHN O''NOLAN, HANNAH WOLFE 上周是 Ghost 从 Kickstarter 上推广算起的五周年纪念日。 利用这些里程碑来标记重要时刻并反思迄今为止的旅程总是显得很有趣。在上一个四周年纪念日里，我谈到了营收里程碑');


-- 2.管理员信息表
create table admin(
 id  int unsigned  key auto_increment,
 username  char(20) unique,
 password   char(32),
 placeid  int unsigned
);
insert into admin(username,password,placeid)values('mxq741852963','wsgly123789',1);

-- 3.学术交流表
create table academic(
 id int unsigned  key auto_increment,
 title varchar(50),
 header text,
 imgpath varchar(100) not null,
 content text,
 hints int default 0,
 type tinyint(1) not null,
 dateandtime timestamp default current_timestamp
);
insert into academic(title,header,imgpath,content,type)
values
('美国工程院P. Somasundaran院士再次来课题组学术交流','综述金属离子对矿物浮选行为的影响及机理，总结和分析直接因素(金属离子种类、价态和浓度等)与间接因素(目的矿物类别、矿浆溶液化学条件(pH和电位)、浮选药剂等)作用下，金属离子对矿物浮选行为的影响规律。据此，探究特定矿浆溶液化学条件对金属离子活化(抑制)矿物浮选的内在原因，提出金属离子影响矿物浮选行为的直接和间接作用机理，为理解金属离子对矿物浮选行为的影响提供参考。','public/images/lunbo/2.jpg','尚未译完，改天再译 原作者：JOHN O''NOLAN, HANNAH WOLFE 上周是 Ghost 从 Kickstarter 上推广算起的五周年纪念日。 利用这些里程碑来标记重要时刻并反思迄今为止的旅程总是显得很有趣。在上一个四周年纪念日里，我谈到了营收里程碑',1);
insert into academic(title,header,imgpath,content,type)
values
('美国工程院P. Somasundaran院士再次来课题组学术交流','综述金属离子对矿物浮选行为的影响及机理，总结和分析直接因素(金属离子种类、价态和浓度等)与间接因素(目的矿物类别、矿浆溶液化学条件(pH和电位)、浮选药剂等)作用下，金属离子对矿物浮选行为的影响规律。据此，探究特定矿浆溶液化学条件对金属离子活化(抑制)矿物浮选的内在原因，提出金属离子影响矿物浮选行为的直接和间接作用机理，为理解金属离子对矿物浮选行为的影响提供参考。','public/images/lunbo/2.jpg','尚未译完，改天再译 原作者：JOHN O''NOLAN, HANNAH WOLFE 上周是 Ghost 从 Kickstarter 上推广算起的五周年纪念日。 利用这些里程碑来标记重要时刻并反思迄今为止的旅程总是显得很有趣。在上一个四周年纪念日里，我谈到了营收里程碑',0);


-- 4.著作及人物表
create table peopleandbook(
    id  int unsigned key auto_increment,
    name varchar(30),
    imgpath varchar(100) not null,
    content text,
    type tinyint(1) not null,
    dateandtime timestamp default current_timestamp
);
insert into peopleandbook(name,imgpath,content,type)
values
('马同学','public/images/欧老师.jpg','综述金属离子对矿物浮选行为的影响及机理，总结和分析直接因素(金属离子种类、价态和浓度等)与间接因素(目的矿物类别、矿浆溶液化学条件(pH和电位)、浮选药剂等)作用下，金属离子对矿物浮选行为的影响规律。据此，探究特定矿浆溶液化学条件对金属离子活化(抑制)矿物浮选的内在原因，提出金属离子影响矿物浮选行为的直接和间接作用机理，为理解金属离子对矿物浮选行为的影响提供参考。',7);
insert into peopleandbook(name,imgpath,content,type)
values
('马同学','public/images/欧老师.jpg','综述金属离子对矿物浮选行为的影响及机理，总结和分析直接因素(金属离子种类、价态和浓度等)与间接因素(目的矿物类别、矿浆溶液化学条件(pH和电位)、浮选药剂等)作用下，金属离子对矿物浮选行为的影响规律。据此，探究特定矿浆溶液化学条件对金属离子活化(抑制)矿物浮选的内在原因，提出金属离子影响矿物浮选行为的直接和间接作用机理，为理解金属离子对矿物浮选行为的影响提供参考。',3);
insert into peopleandbook(name,imgpath,content,type)
values
('马同学','public/images/欧老师.jpg','综述金属离子对矿物浮选行为的影响及机理，总结和分析直接因素(金属离子种类、价态和浓度等)与间接因素(目的矿物类别、矿浆溶液化学条件(pH和电位)、浮选药剂等)作用下，金属离子对矿物浮选行为的影响规律。据此，探究特定矿浆溶液化学条件对金属离子活化(抑制)矿物浮选的内在原因，提出金属离子影响矿物浮选行为的直接和间接作用机理，为理解金属离子对矿物浮选行为的影响提供参考。',0);


-- 5.论文表
create table paper(
    id int unsigned key auto_increment,
    title varchar(50),
    writer varchar(50) default '未填写',
    content text,
    link varchar(100),
    loads varchar(50),
    type tinyint(1) not null,
    hints int default 0,
    dateandtime timestamp default current_timestamp
);
insert into paper(title,writer,content,type,link,loads)
values
('萤石表面性质各向异性研究及进展','马千里','摘 要: 综述金属离子对矿物浮选行为的影响及机理，总结和分析直接因素(金属离子种类、价态和浓度等)与间接因素(目的矿物类别、矿浆溶液化学条件(pH和电位)、浮选药剂等)作用下，金属离子对矿物浮选行为的影响规律。据此，探究特定矿浆溶液化学条件对金属离子活化(抑制)矿物浮选的内在原因，提出金属离子影响矿物浮选行为的直接和间接作用机理，为理解金属离子对矿物浮选行为的影响提供参考。',0,'http://www.ysxbcn.com/paper/paper_316120.html','public/files/309网站结构.docx');
insert into paper(title,writer,content,type,link,loads)
values
('english is so cool for me','马千里','摘 要: 综述金属离子对矿物浮选行为的影响及机理，总结和分析直接因素(金属离子种类、价态和浓度等)与间接因素(目的矿物类别、矿浆溶液化学条件(pH和电位)、浮选药剂等)作用下，金属离子对矿物浮选行为的影响规律。据此，探究特定矿浆溶液化学条件对金属离子活化(抑制)矿物浮选的内在原因，提出金属离子影响矿物浮选行为的直接和间接作用机理，为理解金属离子对矿物浮选行为的影响提供参考。',1,'http://www.ysxbcn.com/paper/paper_316120.html','public/files/309网站结构.docx');


-- 6.消息表
create table message(
    id int unsigned key auto_increment,
    contact varchar(30) not null,
    company varchar(50) not null,
    content text not null,
    type tinyint(1) not null default 0,
    dateandtime timestamp default current_timestamp
);
insert into message(contact,company,content)
values
('15580026494','湖南省长沙市中南大学','我想联系下欧乐明老师可以么');


-- 7.科研成果表
create table scifruits
(
   id int primary key auto_increment,
   name varchar(50),
   origin varchar(30),
   data varchar(10),
   duty varchar(10),
   dateandtime timestamp default current_timestamp
);
insert into scifruits(name,origin,data,duty)values('非传统难选钨矿浮选分离的晶体及界面物理化学基础研究','国家自然科学基金','2015-2017','马千里');

-- 8.科研奖励表
create table scirews
(
   id int primary key auto_increment,
   name varchar(50),
   level varchar(30),
   year varchar(10),
   endman varchar(10),
   dateandtime timestamp default current_timestamp
);
insert into scirews(name,level,year,endman)values('镍钼钨资源高效清洁利用','中国高校十大科技进展','2015','马千里');

-- 9.科研奖励表
create table contactus
(
   id int primary key auto_increment,
   address varchar(50),
   code varchar(10),
   phone varchar(20),
   fax varchar(20),
   email varchar(30)
);
insert into contactus(address,code,phone,fax,email)values('长沙市岳麓区麓山南路932号中南大学和平楼','410083','0731-88879299','0731-88879299','zhiyong.gao@csu.edu.cn');

-- 10.图片管理表
create table admimg
(
   id int primary key auto_increment,
   imgpath varchar(100) not null,
   type tinyint(1) not null
);
insert into admimg(imgpath,type)values('public/images/lunbo/2.jpg',10);
insert into admimg(imgpath,type)values('public/images/lunbo/3.jpg',0);
insert into admimg(imgpath,type)values('public/images/lunbo/4.jpg',0);
insert into admimg(imgpath,type)values('public/images/二维码.png',1);
insert into admimg(imgpath,type)values('public/images/adv/adv1.jpg',2);
insert into admimg(imgpath,type)values('public/images/adv/adv2.jpg',3);
insert into admimg(imgpath,type)values('public/images/温馨提示.jpg',4);

--专利表
create table patent
(
   id int primary key auto_increment,
   name varchar(70),
   origin varchar(20),
   data varchar(20),
   content text not null,
   dateandtime timestamp default current_timestamp
)character set utf8 ;
insert into patent(name,origin,data,content)values('一种氧化铅锌矿浮选抑制剂及其应用','发明专利','2015年7月2日','马千里');
