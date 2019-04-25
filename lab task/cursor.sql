cursor 

#########################################################

1
..................
declare 
n number(5):=:input;
i number(5);
count number(5);

begin
n:=n*2;
for i in reverse 1..n loop
if mod(i,2) != 0 then
dbms_output.put_line(i);
end if;
end loop;
end;

2
--------------------------
declare
   i number(5);
   j number(5);
   factorial number(5):=1;
   n number(5):=:Enter_a_number;

begin
   for i in 1..n loop
      for j in 1..i loop
         factorial:=factorial*j;
      end loop;
      dbms_output.put_line(factorial);
      factorial:=1;
   end loop;
end;



3
---------------------------
begin
   for i in 2..(n-1) loop
      if mod(n,i)=0 then
         t:=1;
      end if;
   end loop;

   if t=0 then
      dbms_output.put_line('Prime');
   else
      dbms_output.put_line('Not Prime');
   end if;
end;


4
------------------------------
declare
cursor c1
is
select empno,sal from emp;
i number(5);
begin
for i in c1 loop
if (i.sal>5000) then
update emp set sal=i.sal + (i.sal*5)/100
where empno=i.empno;

elsif(i.sal>4000 and i.sal<5000) then
update emp set sal=sal + (sal*7)/100
where empno=i.empno;

elsif(i.sal>3001 and i.sal<4000) then
update emp set sal=sal + (sal*20)/100
where empno=i.empno;

elsif(i.sal<3000 or i.sal=3000) then
update emp set sal=sal + (sal*12)/100
where empno=i.empno;

dbms_output.put_line('chjbfuyg');
end if;
end loop;
end;


5
-----------------------
declare 
n number(5):=:input;
n1 number(5);
n2 number(5);
n3 number(5);

begin
n1:= 0;
n2:= 1;

dbms_output.put_line('0');
dbms_output.put_line('1');
while (n1 + n2) <= n
loop 
n3:= n1 + n2;
dbms_output.put_line(n3);
n1:=n2;
n2:=n3;
end loop;
end;

