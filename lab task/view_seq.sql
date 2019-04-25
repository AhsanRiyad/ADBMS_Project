1.

a)
create view Dept_10
as
select * from emp where deptno = 10;

b)
create view Emp_V
as
select empno,ename,sal,dname,grade from dept,emp,salgrade where dept.deptno = emp.deptno and sal between losal and hisal;

c)
create view Emp_of_Dhaka
as
select emp.* from dept,emp where dept.deptno = emp.deptno and loc = 'DHAKA';

d) update dept_10 set comm = 500 where comm is null;

2.

a)
create sequence DEPT_ID_SEQ
increment by 10
start with 60
maxvalue 200
nocache
nocycle;

b)

select sequence_name,max_value,increment_by,last_number from user_sequences;

c)

declare
 
d_name dept.dname%type:=:Dept_Name;
d_loc dept.loc%type:=:Dept_Loc;

begin

insert into dept(deptno,dname,loc)
values (DEPT_ID_SEQ.nextval,d_name, d_loc);

end;