
lab exam on package


#############################################################




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

#########################################################################

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


###########################################################################



create or replace trigger salary_change_monitoring
before update on emp
for each row
begin        
if :new.sal > (:old.sal + (:old.sal * 20 / 100)) then
raise_application_error(-20000,'Exceeding Salary Limit');
end if;

end; 


update emp set sal = 1000 where empno = 7369;


##############################################################################





