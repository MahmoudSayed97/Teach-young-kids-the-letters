create database webdb;
use webdb;
create table tbdata(
_type varchar(100),
_content varchar(100),
_target varchar(100),
_time varchar(500)
);
select* from tbdata order by _time;
truncate tbdata;