


function and procedure

##############################################################




create or replace function VALID_DEPTNO(dno IN dept.deptno%type)
return boolean
is

cursor c1
is
select deptno from dept;
Begin
for i in c1 loop
if i.deptno in( dno) then
return true;
end if;
end loop;
return false;


END;

///////////////////////////////////////////////




select * from emp


create or replace procedure NEW_EMP(dno IN dept.deptno%type)
IS
begin
if VALID_DEPTNO(dno) then
insert into emp(empno,ename,job,mgr,hiredate,sal,comm,DEPTNO) values(1000,'Kaium','kaium',1000,'17-DEC-80',1078,456,dno);
dbms_output.put_line('hellow');
else
dbms_output.put_line('hi');
end if;
end;


declare
dno dept.deptno%type:=:value_of;
begin
NEW_EMP(dno);
end;














//////////////////////////////////////////


create or replace trigger EMP_SECURE
before insert or update or delete on emp

begin
if to_char(sysdate , 'day') not in ('friday' , 'saturday') then
if to_char(sysdate, 'hh24') not between 8 and 13 then
RAISE_APPLICATION_ERROR('-20201' , 'restricted' );
end if;
end if;
end;




/////////////////////////////////////////////////////


CREATE TABLE emp_modify_log
(
user_name varchar2(20),
date1 date,
opt_name varchar(20)
);


begin
dbms_output.put_line(user);
end;


insert into  emp_modify_log values(user , sysdate , 'insert' );

create or replace trigger emp_log_trigger
after insert or update or delete on emp

begin
if inserting then
insert into  emp_modify_log values(user , sysdate , 'insert' );

elsif deleting then
insert into  emp_modify_log values(user , sysdate , 'deleting' );

elsif updating then
insert into  emp_modify_log values(user , sysdate , 'updating' );

end if;
end;

alter trigger EMP_SECURE disable


insert into emp(empno,ename,job,mgr,hiredate,sal,comm,DEPTNO) values(1000,'Kaium','kaium',1000,'17-DEC-80',1078,456,30);


select * from  emp_modify_log ;











