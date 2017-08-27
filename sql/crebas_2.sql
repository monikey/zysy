/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2017/8/26 16:02:19                           */
/*==============================================================*/


drop table if exists ClassDuty;

drop table if exists Classes;

drop table if exists ClassesOn;

drop table if exists Department;

drop table if exists DutyArea;

drop table if exists InspectItem;

drop table if exists InspectResult;

drop table if exists InspectTag;

drop table if exists InspectType;

drop table if exists Moral;

drop table if exists MoralItem;

drop table if exists MoralType;

drop table if exists Students;

drop table if exists Teachers;

/*==============================================================*/
/* Table: ClassDuty                                             */
/*==============================================================*/
create table ClassDuty
(
   id                   int not null auto_increment,
   schoolYear           varchar(20),
   classId              int,
   className            varchar(50),
   dutyId               int,
   primary key (id)
);

alter table ClassDuty comment '�༶��������Ӧ��';

/*==============================================================*/
/* Table: Classes                                               */
/*==============================================================*/
create table Classes
(
   classId              int not null auto_increment,
   grade                varchar(10),
   major                varchar(10),
   departmentId         int,
   status               int,
   primary key (classId)
);

alter table Classes comment '�༶��';

/*==============================================================*/
/* Table: ClassesOn                                             */
/*==============================================================*/
create table ClassesOn
(
   id                   int not null auto_increment,
   schoolYear           varchar(20),
   classId              int,
   teacherId            int,
   primary key (id)
);

alter table ClassesOn comment '�༶��ʦ��Ӧ��';

/*==============================================================*/
/* Table: Department                                            */
/*==============================================================*/
create table Department
(
   departmentId         int not null auto_increment comment '������id',
   dName                varbinary(50),
   dLeader              varchar(20),
   primary key (departmentId)
);

alter table Department comment '����Ϣ��';

/*==============================================================*/
/* Table: DutyArea                                              */
/*==============================================================*/
create table DutyArea
(
   dutyId               int not null auto_increment,
   dutyName             varchar(50),
   areaDescription      varchar(100),
   code                 varchar(10),
   primary key (dutyId)
);

alter table DutyArea comment '����������';

/*==============================================================*/
/* Table: InspectItem                                           */
/*==============================================================*/
create table InspectItem
(
   id                   integer not null,
   itemName             varchar(50),
   remarks              varchar(50),
   typeId               integer,
   createTime           timestamp,
   updateTime           timestamp,
   primary key (id)
);

alter table InspectItem comment 'Ѳ����';

/*==============================================================*/
/* Table: InspectResult                                         */
/*==============================================================*/
create table InspectResult
(
   resultId             integer not null auto_increment,
   inspectTime          timestamp,
   inspectUserId        integer,
   inspectUser          varchar(50),
   classId              integer,
   typeId               integer,
   id                   integer,
   typeName             varchar(0),
   itemId               integer,
   itemName             varchar(50),
   tagId                integer,
   tagName              varchar(50),
   tmpResult            double,
   finalResult          double,
   primary key (resultId)
);

alter table InspectResult comment 'Ѳ����';

/*==============================================================*/
/* Table: InspectTag                                            */
/*==============================================================*/
create table InspectTag
(
   createTime           timestamp,
   updateTime           timestamp,
   tagId                integer not null auto_increment,
   tagName              varchar(50),
   itemId               integer,
   primary key (tagId)
);

alter table InspectTag comment 'Ѳ���ǩ';

/*==============================================================*/
/* Table: InspectType                                           */
/*==============================================================*/
create table InspectType
(
   typeId               integer not null,
   typeName             varchar(50),
   remarks              varchar(50),
   createTime           timestamp,
   updateTime           timestamp,
   primary key (typeId)
);

alter table InspectType comment '�༶����Ѳ�����';

/*==============================================================*/
/* Table: Moral                                                 */
/*==============================================================*/
create table Moral
(
   moralId              int not null auto_increment,
   schoolYear           varchar(20),
   score                int,
   description          varchar(200),
   itemId               int,
   createTime           timestamp,
   studentId            integer,
   number               varchar(50),
   idNumber             varchar(50),
   typeId               int,
   itemName             varchar(50),
   typeName             varchar(50),
   teacherId            int,
   primary key (moralId)
);

alter table Moral comment '����ѧ�ֱ�';

/*==============================================================*/
/* Table: MoralItem                                             */
/*==============================================================*/
create table MoralItem
(
   itemId               int not null auto_increment,
   itemName             varchar(50),
   createTime           timestamp,
   typeId               int,
   primary key (itemId)
);

/*==============================================================*/
/* Table: MoralType                                             */
/*==============================================================*/
create table MoralType
(
   typeId               int not null auto_increment,
   typeName             varchar(20),
   remarks              varchar(100),
   createTime           timestamp,
   typeValue            int,
   primary key (typeId)
);

/*==============================================================*/
/* Table: Students                                              */
/*==============================================================*/
create table Students
(
   studentId            integer not null auto_increment,
   number               varchar(50) not null,
   sName                varchar(50),
   idNumber             varchar(50) not null,
   address              varchar(50),
   classId              int,
   status               int,
   birthday             varchar(20),
   sex                  boolean,
   isResident           boolean,
   primary key (studentId, number, idNumber)
);

alter table Students comment 'ѧ����Ϣ��';

/*==============================================================*/
/* Table: Teachers                                              */
/*==============================================================*/
create table Teachers
(
   teacherId            integer not null auto_increment,
   number               varchar(50),
   phone                varchar(20),
   shortPhone           varchar(20),
   idNumber             varchar(20),
   teacherName          varchar(20),
   status               int,
   primary key (teacherId)
);

alter table Teachers comment '��ʦ��Ϣ��';

alter table ClassDuty add constraint FK_Reference_7 foreign key (classId)
      references Classes (classId) on delete restrict on update restrict;

alter table ClassDuty add constraint FK_Reference_8 foreign key (dutyId)
      references DutyArea (dutyId) on delete restrict on update restrict;

alter table Classes add constraint FK_Reference_6 foreign key (departmentId)
      references Department (departmentId) on delete restrict on update restrict;

alter table ClassesOn add constraint FK_Reference_11 foreign key (teacherId)
      references Teachers (teacherId) on delete restrict on update restrict;

alter table ClassesOn add constraint FK_Reference_12 foreign key (classId)
      references Classes (classId) on delete restrict on update restrict;

alter table InspectItem add constraint FK_Reference_1 foreign key (typeId)
      references InspectType (typeId) on delete restrict on update restrict;

alter table InspectResult add constraint FK_Reference_3 foreign key (typeId)
      references InspectType (typeId) on delete restrict on update restrict;

alter table InspectResult add constraint FK_Reference_4 foreign key (id)
      references InspectItem (id) on delete restrict on update restrict;

alter table InspectResult add constraint FK_Reference_5 foreign key (tagId)
      references InspectTag (tagId) on delete restrict on update restrict;

alter table InspectTag add constraint FK_Reference_2 foreign key (itemId)
      references InspectItem (id) on delete restrict on update restrict;

alter table Moral add constraint FK_Reference_14 foreign key (itemId)
      references MoralItem (itemId) on delete restrict on update restrict;

alter table Moral add constraint FK_Reference_15 foreign key (typeId)
      references MoralType (typeId) on delete restrict on update restrict;

alter table Moral add constraint FK_Reference_16 foreign key (studentId, number, idNumber)
      references Students (studentId, number, idNumber) on delete restrict on update restrict;

alter table Moral add constraint FK_Reference_17 foreign key (teacherId)
      references Teachers (teacherId) on delete restrict on update restrict;

alter table MoralItem add constraint FK_Reference_13 foreign key (typeId)
      references MoralType (typeId) on delete restrict on update restrict;

alter table Students add constraint FK_Reference_10 foreign key (classId)
      references Classes (classId) on delete restrict on update restrict;

