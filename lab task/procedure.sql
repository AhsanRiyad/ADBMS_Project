
procedure


##########################################################







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