trigger code

################################################



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



