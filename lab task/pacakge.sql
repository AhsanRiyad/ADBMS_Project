create or replace procedure p1(dno IN emp.empno%type)
is
dn dept.dname%type;
dl dept.loc%type;
dno1  emp.deptno%type;
dc NUMBER(10);
begin


select  dept.dname , dept.loc , count(*) into dn , dl  , dc  from emp ,  dept where dept.deptno = emp.deptno and emp.deptno = dno group by emp.deptno, dept.dname, dept.loc;

dbms_output.put_line('dept name: '||dn||' '||'loc: '||dl||'no of employee: '||dc);

end;

begin
p1(30);
end


==================================================================================



create or replace procedure p2(en IN emp.ename%type , ej OUT emp.job%type)
is
begin
select job into ej  from emp where ename=en;

end;

declare
ej emp.job%type;
cursor c1
is
select ename from emp;

begin

for i in c1 loop

p2(i.ename , ej);
dbms_output.put_line('ename: '||i.ename||' ,job: '||ej);
end loop;
end;



==========================================================================================


create or replace procedure p2(dn IN dept.deptno%type , sl OUT emp.sal%type)
is
begin
select sum(sal) into sl from emp , dept where dept.deptno= emp.deptno and dept.deptno = dn group by dept.deptno ;
end;


declare
sl emp.sal%type;
cursor c1
is
select deptno from dept;

begin

for i in c1 loop

dbms_output.put_line(i.deptno);
p2(i.deptno , sl);
end loop;
end;
















...............................................................................
create or replace trigger emp_log
after insert or delete or update on emp
declare
op emp_mod_log.operation%type;
begin 
if inserting then
op:='insert operation';
elsif deleting then
op:='delete operation';
elsif updating then
op:='update operation';

end if;

insert into emp_mod_log values(user,sysdate,op);

end;

create table emp_mod_log(
username varchar(255),
time date,
operation varchar(255)
);

-=-------------------

create table emp_sal_log(
empno varchar2(255),
prsal varchar2(255),
newsal varchar2(255),
time date
);

create or replace trigger emp_sal_up
after update of sal on emp
for each row
begin
insert into emp_sal_log values(:new.empno,:old.sal,:new.sal,sysdate);
end;

update emp set sal = 2200 where empno = 7369;

select * from emp_sal_log;

-----------------------------------
create or replace trigger emp_sal_up
after update of sal on emp
for each row
begin
if :new.sal > :old.sal + ((:old.sal * 75)/100) then
raise_application_error(-20342,'New salary is high');
else
insert into emp_sal_log values(:new.empno,:old.sal,:new.sal,sysdate);
end if;
end;







create or replace procedure new_emp(dno IN dept.deptno%type)
is
begin
if  VALID_DEPTNO(dno) then
insert into emp(ename,sal,deptno) values ('p',200,30);
else
  dbms_output.put_line('hgty5');
end if;
end;




create table emp_modify_log
(
user_name varchar2(30),
mdate date,
opt_name varchar2(23)
)

create or replace trigger g_user
after insert or update or delete on emp

begin
if inserting then
insert into emp_modify_log(user_name,mdate,opt_name) values (user,sysdate,'insert');
elsif deleting then
insert into emp_modify_log(user_name,mdate,opt_name) values (user,sysdate,'delete');
elsif updating then
insert into emp_modify_log(user_name,mdate,opt_name) values (user,sysdate,'update');
end if;
end;
insert into emp(empno,ename,job,mgr,hiredate,sal,comm,DEPTNO) values(1000,'Kaium','kaium',1000,'17-DEC-80',1078,456,30);
alter trigger RESTRIC_USER disable



............................09-04019..................................................
1
--------------------
create or replace trigger salary_change_monitoring
before update on emp
for each row

begin

if to_char(sysdate,'yy') - to_char(:old.hiredate,'yy') < 5 then
if :new.sal > :old.sal + ((:old.sal * 20) / 100) then
raise_application_error(-2345,'New Salary is higher than the limit');
end if;
end if;
end;

2
----------------------

create or replace trigger qty_on_hnd
before update or insert on product_master
for each row
begin
if :new.qoh < 0 then
raise_application_error(-2345,'Quantity on hand can not be negative');
end if;
end;

3
--------------------

create or replace trigger bookself_mod_log
after update or insert on bookself
for each row
begin
insert into bookself_audit values(:old.title,:old.publisher,:old.rating,:new.rating,sysdate);
end;



*********************************************************8
Package :
1
----------------

create package pkg_emp_info as
procedure emp_retrieve(e_no in emp.empno%type);
procedure dept_total_sal(d_no in dept.deptno%type);
end pkg_emp_info;

create or replace package body pkg_emp_info as
procedure emp_retrieve(e_no in emp.empno%type)
is
e_name emp.ename%type;
e_join emp.hiredate%type;
e_job emp.job%type;
begin
select ename,hiredate,job into e_name,e_join,e_job from emp where empno = e_no;
dbms_output.put_line('Name: ' || e_name);
dbms_output.put_line('Join Date: ' || e_join);
dbms_output.put_line('Designation: ' || e_job);
end  emp_retrieve;

function get_total_sal(d_no in dept.deptno%type) 
return number
is
tsal emp.sal%type;
begin
select sum(sal) into tsal from emp where deptno = d_no group by deptno;
return tsal;
end get_total_sal;

procedure dept_total_sal(d_no in dept.deptno%type)
is
tsal emp.sal%type;
begin
tsal := get_total_sal(d_no);
dbms_output.put_line('total sal of dept no ' || d_no || ' is ' || tsal);
end dept_total_sal;

end pkg_emp_info;

declare 
begin
pkg_emp_info.emp_retrieve(7369);
end;

declare 
begin
pkg_emp_info.dept_total_sal(10);
end;

2
--------------------------
create or replace procedure get_five_highest_sal
is
cursor c
is
select empno,ename,sal from emp where rownum <6 order by sal desc;
i number(5);
begin

for i in c loop 
dbms_output.put_line('Empno: ' || i.empno);
dbms_output.put_line('Name: ' || i.ename);
dbms_output.put_line('Sal: ' || i.sal);
dbms_output.put_line('');
end loop;
end;

declare

begin

get_five_highest_sal();
end;

3
------------------------

create or replace trigger salary_change_monitoring
before update on emp
for each row
begin        
if :new.sal > (:old.sal + (:old.sal * 20 / 100)) then
raise_application_error(-20000,'Exceeding Salary Limit');
end if;

end; 

update emp set sal = 1000 where empno = 7369;