1.	Find the highest paid employee of the Finance department who belong from the grade 2 and 3.

Ans:
select emp.* from emp  , salgrade , dept   where emp.deptno =dept.deptno and  emp.sal between salgrade.losal and salgrade.hisal  and  salgrade.grade in (2,3)
 and dept.dname = 'FINANCE' and emp.sal = (
(select max(emp.sal) from emp  , salgrade  , dept   where emp.deptno =dept.deptno and  emp.sal between salgrade.losal and salgrade.hisal  and  salgrade.grade in (2,3)
 and dept.dname = 'FINANCE'))


2.	Find out the manager names and the number of employees they manage

Ans:
select  m.ename , COUNT (*) as "TheyManage" from emp e , emp m where m.empno = e.mgr group by m.ename


3.	Find out the location with the most senior employee.

Ans:
select loc  from emp  , dept   where emp.deptno = dept.deptno and  emp.hiredate = ( select min(hiredate) from emp  )

4.	List out the Name, Job, Salary, grade of the emps in the department with the highest average salary.

Ans:

select  emp.ename , emp.job , emp.sal , salgrade.grade from emp , dept , salgrade  where emp.deptno = dept.deptno and emp.sal between salgrade.losal and salgrade.hisal and dept.deptno =
   ( select dept.deptno  from emp , dept where emp.deptno = dept.deptno group by dept.deptno having round(avg(emp.sal))
= ( select max(round(avg(emp.sal))) from emp , dept where emp.deptno = dept.deptno group by dept.deptno  ))

5.	Find out the grade with maximum number of Analyst.

Ans:
select salgrade.grade  from emp  , salgrade  where emp.sal between salgrade.losal and salgrade.hisal and emp.job ='ANALYST' group by salgrade.grade having count(*) = (
select max(count(*)) from emp  , salgrade  where emp.sal between salgrade.losal and salgrade.hisal and emp.job ='ANALYST' group by salgrade.grade )


6.	List all the Grade2 and Grade 3 emps who belong from the Chicago.

Ans:
select emp.*  from emp  , salgrade  , dept  where emp.sal between salgrade.losal and salgrade.hisal and emp.deptno = dept.deptno and dept.loc='CHICAGO' and grade in (2,3)

7.	List THE Name of dept where highest no. of emps are working.

Ans:
select dname , count(*)  from emp  , dept  where emp.deptno = dept.deptno group by dept.dname having count(*) = (select  max(count(*))   from emp  , dept  where dept.deptno = emp.deptno group by dname )

8.	Find out the grade of all mgrs.

Ans:
select grade , count(*)  from emp m1, emp m2, salgrade where m1.sal between losal and hisal and m2.empno = m1.mgr group by grade

9.	Find out the name of the mgr who manage the maximum number of employees.

Ans:
select m1.ename from emp e1 , emp m1 where m1.empno = e1.mgr group by m1.ename having count(*) = (select max(count(*)) from emp e1 , emp m1 where m1.empno = e1.mgr group by m1.empno)

10.	Find out the mgr who lives in DALLAS and belong from grade 3 and 4.

Ans:
select * from emp, dept, salgrade where dept.deptno = emp.deptno and sal between losal and hisal and grade in (3,4) and loc = 'DALLAS' and job = 'MANAGER'



11.	Find out the details of the grade 2 mgrs Who manage the maximum no of employee.

Ans:
select * from emp where ename = (
select m1.ename from emp e1 , emp m1 , salgrade where m1.empno = e1.mgr and m1.sal between losal and hisal and grade =2  group by m1.ename having count(*) = (select max(count(*)) from emp e1 , emp m1 where m1.empno = e1.mgr group by m1.empno))




12.	 Find out the details of the ANALYST whose salary is greater than Miller. (Without using subquery)

select a.* from emp a , emp b where  b.ename = 'MILLER' and a.job='ANALYST' and a.sal > b.sal and a.ename<>'MILLER'  

