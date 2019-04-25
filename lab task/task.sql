
task



1.	Write a PL/SQL code to retrieve the employee name, join_date, and designation from employee database of an employee whose number is input by the user.

declare
d_empno emp.empno%type:=:value_of_empno;
d_ename emp.ename%type;
d_hiredate emp.hiredate%type;
d_job emp.job%type;
begin
select ename, hiredate, job into d_ename, d_hiredate, d_job from emp where empno = d_empno;

dbms_output.put_line('job: ' || d_job || ' hire date: ' || d_hiredate || ' emp name: ' || d_ename);

end


2.	Write the Code to input the dept’s no and print the total emp’s and sum of salary with in that dept.

declare
d_deptno emp.deptno%type:=:value_of_deptno;
d_temp number(5);
d_sal number(5);

begin
select sum(sal), count(empno) into d_sal , d_temp from emp where deptno = d_deptno ; 


dbms_output.put_line('total sal: ' || d_sal || ' total emp: ' || d_temp);

end


3.	Write a PL/SQL code block to calculate the area of the circle for a value of radius of 8.

declare

d_radias number(5):=8;
d_area number(5);

begin

d_area := 3.1416*d_radias *d_radias ;
dbms_output.put_line('area: ' || d_area );

end



4.	Update the commission’s to 1200 for the manager who get the minimum salary using PLSQL program.(Manager is a job)


declare

d_radias number(5):=8;
d_area number(5);

begin

update  emp set comm=1400 where  EMPNO = ( select empno from emp where job='MANAGER'  and sal = (select min(sal) from emp where job='MANAGER')  );

dbms_output.put_line('commission updated '  );

end



5.	Insert a new department HR in the location of Texas where the department no will be the current maximum department no+10.

declare

d_deptno dept.deptno%type;

begin

select max(deptno) into d_deptno from dept;

INSERT INTO dept (deptno, dname, loc)
VALUES (d_deptno+10, 'HR_riyad', 'Texas_Riyad');

dbms_output.put_line('new dept added ');

end



6.	Create a program which will take the empno of an employee and will return the updated salay after increament. The increament will take place based on the experience.  

Experience	Increament
>7 years	5%
5 to 7 years	7%
3 to 5 years 	10%
<3 years	12%

Finally, we have to update the salary in the emp table.


declare
d_empno emp.empno%type:=:value_of_empno;
d_updated emp.sal%type;
d_sal emp.sal%type;
d_exp number(5);

begin

select round(round(sysdate-hiredate)/365) into d_exp from emp where empno = d_empno;

dbms_output.put_line(d_exp);

if(d_exp >7) then

update emp set sal = sal+(sal*5)/100 where empno = d_empno;

dbms_output.put_line('5 percent');
elsif (d_exp > 5 and d_exp < 7 ) then
update emp set sal = sal+(sal*7)/100 where empno = d_empno;
dbms_output.put_line('7 percent');
elsif (d_exp > 5 and d_exp < 5  ) then
update emp set sal = sal+(sal*10)/100 where empno = d_empno;
dbms_output.put_line('10 percent');
elsif (d_exp > 5 and d_exp < 5  ) then
update emp set sal = sal+(sal*10)/100 where empno = d_empno;
dbms_output.put_line('10 percent');
end if;

end
