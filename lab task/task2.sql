ans



1.	Find the highest paid employee of the Finance department who belong from the grade 2 and 3.

 
select e.* from emp e , salgrade s , dept d  where e.deptno =d.deptno and  e.sal between s.losal and s.hisal  and  s.grade in (2,3)
 and d.dname = 'FINANCE' and e.sal = (
(select max(e.sal) from emp e , salgrade s , dept d  where e.deptno =d.deptno and  e.sal between s.losal and s.hisal  and  s.grade in (2,3)
 and d.dname = 'FINANCE'))

2.	Find out the manager names and the number of employees they manage

select distinct m.ename , COUNT (*) as "Manages" from emp e , emp m where m.empno = e.mgr group by m.ename ;

3.	Find out the location with the most senior employee.
select d.loc  from emp e , dept d  where e.deptno = d.deptno and  e.hiredate = ( select min(hiredate) from emp  )

4.	List out the Name, Job, Salary, grade of the emps in the department with the highest average salary
  
select  e.ename , e.job , e.sal , s.grade from emp e , dept d , salgrade s where e.deptno = d.deptno and e.sal between s.losal and s.hisal and d.deptno =
   ( select d.deptno  from emp e , dept d where e.deptno = d.deptno group by d.deptno having round(avg(e.sal))
= ( select max(round(avg(e.sal))) from emp e , dept d where e.deptno = d.deptno group by d.deptno  ))

5.	Find out the grade with maximum number of Analyst.
 select s.grade  from emp e , salgrade s where e.sal between s.losal and s.hisal and e.job ='ANALYST' group by s.grade having count(*) = (
select max(count(*)) from emp e , salgrade s where e.sal between s.losal and s.hisal and e.job ='ANALYST' group by s.grade )

6.	List all the Grade2 and Grade 3 emps who belong from the Chicago
select e.*  from emp e , salgrade s , dept d where e.sal between s.losal and s.hisal and e.deptno = d.deptno and d.loc='CHICAGO' and s.grade in (2,3) 

7.	List THE Name of dept where highest no. of emps are working.
select d.dname , count(*) as " Has "  from emp e , dept d where e.deptno = d.deptno group by d.dname having count(*) = (select  max(count(*)) as " Has "  from emp e , dept d where e.deptno = d.deptno group by d.dname )  

8.	Find out the grade of all mgrs.
select s.grade , count(*) as "has" from emp e , emp m , salgrade s where e.sal between s.losal and s.hisal and m.empno = e.mgr group by s.grade 

9.	Find out the name of the mgr who manage the maximum number of employees.
select m.ename from emp e , emp m where m.empno = e.mgr group by m.ename having count(*) = (select max(count(*)) from emp e , emp m where m.empno = e.mgr group by m.empno) 

10.	Find out the mgr who lives in DALLAS and belong from grade 3 and 4.
select m.ename from  emp m , salgrade s , dept d  where   m.deptno = d.deptno and m.sal between s.losal and s.hisal and d.loc ='DALLAS' and s.grade in (3,4)  and m.empno in (select distinct w.empno from emp e , emp w where w.empno = e.mgr )


12.	 Find out the details of the ANALYST whose salary is greater than Miller. (Without using subquery)

select a.* from emp a , emp b where  b.ename = 'MILLER' and a.job='ANALYST' and a.sal > b.sal and a.ename<>'MILLER'  