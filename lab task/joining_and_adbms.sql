joining



Joining


1)	Display all the managers & clerks name, id along with their department details who work in Accounts and Marketing departments.
2)	Display all the salesmen’s name,job,dname and loc who are not located at DALLAS.
3)	Select department name & location of all the employees working for CLARK.
4)	Select all the departmental information for all the managers.(Manager is not a job)
5)	Select all the employees who work in DALLAS.
6)	Find the highest paid employee of sales department. (Show his empno,ename,dname,sal,loc).
7)	List the emps  with departmental information Whose Jobs are same as MILLER or Sal is more than ALLEN .
8)	Find out the employees who are working in CHICAGO and DALLAS.
9)	List all the Grade2 and Grade 3 emps.
10)	Display all Grade 4,5 Analyst and Manager.
11)	List all the Grade2 and Grade 3 emps who belong from the Chicago.
12)	Find the highest paid employee of sales department. (Show his empno,ename,dname,sal,loc).
13)	Find out the mgr who lives in DALLAS and belong from grade 3 and 4.
14)	Find out the grade of all mgrs.








1
select ename , empno , dept.deptno, dept.dname from emp, dept where dept.deptno=emp.deptno and job in ('SALESMAN' , 'CLERK')
2
SELECT ENAME, JOB, DEPT.DNAME, DEPT.LOC FROM EMP, DEPT WHERE JOB='SALESMAN' AND EMP.DEPTNO=DEPT.DEPTNO AND LOC NOT IN ('DALLAS')
3
select dept.deptno, loc from emp, dept where dept.deptno=emp.deptno and mgr=(select empno from emp where ename='CLARK')
4
select dept.deptno, dname, loc from emp,dept where dept.deptno=emp.deptno and empno in (select mgr from emp)
5
select * from dept, emp where dept.deptno=emp.deptno and loc='DALLAS'
6
select * from emp, dept where sal = ( select max(sal) from emp) and dept.dname = 'SALES'
7
select * from emp, dept where dept.deptno=emp.deptno and job=(
select job from emp where ename = 'MILLER') or
sal = (select sal from emp where ename = 'ALLEN' )
8
select * from emp, dept where dept.deptno=emp.deptno and loc in ('CHICAGO','DALLAS')

9
select emp.*, grade from emp, salgrade where emp.sal between salgrade.losal and salgrade.hisal and grade in (2,3)

10
select emp.*, grade from emp, salgrade where emp.sal between salgrade.losal and salgrade.hisal and grade in (4,5) and job in ('ANALYST', 'MANAGER')

11
select emp.*, grade, loc from emp, salgrade, dept where dept.deptno=emp.deptno and emp.sal between salgrade.losal and salgrade.hisal and grade in (2,3) and loc in ('CHICAGO')

12
SELECT * FROM EMP, DEPT WHERE EMP.DEPTNO=DEPT.DEPTNO AND SAL = ( SELECT MAX(SAL) FROM EMP WHERE DEPTNO = (SELECT DEPTNO FROM DEPT WHERE DNAME = 'SALES')) AND DEPT.DNAME='SALES'

13
SELECT * FROM EMP, DEPT, SALGRADE WHERE JOB='MANAGER' AND SAL BETWEEN LOSAL AND HISAL AND GRADE IN (3,4) AND LOC = 'DALLAS' AND EMPNO IN (SELECT MGR FROM EMP)

14
SELECT * FROM SALGRADE, EMP WHERE SAL BETWEEN LOSAL AND HISAL AND JOB='MANAGER'






Advanced Database Management System
1.	Find the highest paid employee of the sales department who belong from the grade 2 and 3.
2.	Find out the grade with the maximum No of employees.
3.	List out the Name, Job, Salary,grade of the emps in the department with the highest average salary
4.	Write a query to display the department name, location name and number of employees and their rounded average salary for all employees as department name wise and location wise.
5.	Find out the location with maximum no of average salary.
6.	List all the Grade2 and Grade 3 emps who belong from the Chicago.
7.	List THE Name,job,sal,dname and grade of the loc where highest no.of emps are working.
8.	List the employee Name, Job, Annual Salary, deptno, Dept name and grade who earn 36000 a year or who are not CLERKS.
9.	Find out the grade of all mgrs.
10.	Find out the mgr who lives in DALLAS and belong from grade 3 and 4.
11.	Find out the employee details of the grade which has the maximum number of the employees who belong from the sales department.
12.	List the highest paid emp of Chicago joined before the most recently hired emp of grade2
13.	Increment the salary of the emplyees to 7% who belong from grade 2.
14.	Update the loc of all emplyees to Washington from Chicago.
15.	Delete the most senior employee.
16.	Delete the maximum salary holders from the sales department.











ADBMS


1
SELECT * FROM EMP, DEPT WHERE DEPT.DNAME = 'SALES' AND SAL = ( SELECT  MAX(SAL) FROM EMP, DEPT, SALGRADE WHERE DEPT.DEPTNO = EMP.DEPTNO AND SAL BETWEEN LOSAL AND HISAL AND GRADE IN (2,3) AND DNAME='SALES' )
2
select grade from emp, salgrade where emp.sal between losal and hisal group by grade having count(*) = (select max(count(*)) from emp, salgrade where sal between losal and hisal group by grade)

3


4
select emp.deptno, dept.loc, round(avg(sal)), count(*) from emp, dept where dept.deptno=emp.deptno group by emp.deptno, dept.loc


5
select dept.loc, avg(sal) from dept, emp where dept.deptno = emp.deptno group by dept.loc having avg(sal)=(select max(avg(sal)) from emp group by deptno)

6
select * from emp, salgrade, dept where dept.deptno=emp.deptno and  sal between losal and hisal and grade in(2,3) and loc = 'CHICAGO'


7
select ename, job , sal, dname , grade , loc from dept, emp, salgrade where dept.deptno=emp.deptno and sal between losal and hisal and loc = (select loc from emp, dept where emp.deptno = dept.deptno group by loc having count(*) =  (select  max(count(*)) from emp , dept where dept.deptno = emp.deptno group by loc )  )


8
select ename, job , sal*12 , dept.deptno , dname, grade from emp, dept, salgrade where emp.deptno = dept.deptno and sal between losal and hisal and sal*12=36000 or job not in ('CLERKS')


9
select ename, job, grade from salgrade , emp where sal between losal and hisal and empno in (select mgr from emp)


10
select ename, job, grade , loc from dept, salgrade , emp where emp.deptno=dept.deptno and sal between losal and hisal and empno in (select mgr from emp) and loc in ('DALLAS') and grade in (3,4)


11
select * from emp,dept, salgrade where emp.deptno=dept.deptno and sal between losal and hisal and grade = ( select grade from emp, salgrade where sal between losal and hisal group by grade having count(*)  = ( select max(count(*)) from dept, emp, salgrade where dept.deptno = emp.deptno and  sal between losal and hisal and dname = 'SALES' group by grade  ))



12
select * from emp where sal in

(select  max(sal) from emp , dept where emp.deptno = dept.deptno and loc = 'CHICAGO' group by sal)

and hiredate <

(select max(hiredate) from emp, salgrade where sal between losal and hisal and grade in (2))


