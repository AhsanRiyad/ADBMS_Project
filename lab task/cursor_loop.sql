

cursor loop

#############################################################################






CREATE TABLE sales (
    customer_ID int NOT NULL,
    product_ID int NOT NULL,
    quantity int,
    PRIMARY KEY (customer_ID),
    FOREIGN KEY (product_ID) REFERENCES products(product_ID)
);

CREATE TABLE products(
    product_ID int NOT NULL,
    price int,
    PRIMARY KEY (product_ID)
);


///////////////////////////////////////adms/////////////
declare
cursor cur is select unique sales.quantity,products.price,sales.customer_ID
from sales,products
where sales.product_id=products.product_id
order by customer_ID desc;
prod number;
quan number(10);
pri number(10);
c_id number(10);
begin
open cur;
loop
fetch cur into quan,pri,c_id;
exit when cur%notfound;
prod:=pri*quan;
DBMS_OUTPUT.PUT_LINE('customer_id =' || c_id);
DBMS_OUTPUT.PUT_LINE('quantity value =' || quan);
DBMS_OUTPUT.PUT_LINE('price =' || pri);
DBMS_OUTPUT.PUT_LINE('The total value of customer purchases is = ' || prod);
end loop;
close cur;
END






///////////////
declare
cursor cur is select unique sales.quantity,products.price,sales.customer_ID
from sales,products
where sales.product_id=products.product_id
order by customer_ID desc;
prod number;
quan number(10);
pri number(10);
c_id number(10);
begin
open cur;
loop
fetch cur into quan,pri,c_id;
exit when cur%notfound;
prod:=pri*quan;
DBMS_OUTPUT.PUT_LINE('customer_id =' || c_id);
DBMS_OUTPUT.PUT_LINE('quantity value =' || quan);
DBMS_OUTPUT.PUT_LINE('price =' || pri);
DBMS_OUTPUT.PUT_LINE('The total value of customer purchases is = ' || prod);
end loop;
close cur;
END;



DECLARE
CURSOR cur
IS
SELECT SUM(sales.quantity),
SUM(products.price),
sales.customer_ID
FROM sales,
products
WHERE sales.product_id=products.product_id
GROUP BY customer_ID
ORDER BY customer_ID DESC;
prod NUMBER;
quan NUMBER(10);
pri  NUMBER(10);
c_id NUMBER(10);
BEGIN
OPEN cur;
LOOP
FETCH cur INTO quan,pri,c_id;
EXIT
WHEN cur%notfound;
prod:=pri*quan;
DBMS_OUTPUT.PUT_LINE('customer_id =' || c_id);
DBMS_OUTPUT.PUT_LINE('quantity value =' || quan);
DBMS_OUTPUT.PUT_LINE('price =' || pri);
DBMS_OUTPUT.PUT_LINE('The total value of customer purchases is = ' || prod);
END LOOP;
CLOSE cur;
END;





1.declare
cursor cur is select unique sales.customer_ID,products.id
from sales,products
where sales.id=products.id
order by customer_ID desc;
c_id number(10);
p_id number(10);
begin
open cur;
loop
fetch cur into c_id,p_id;
exit when cur%notfound;
DBMS_OUTPUT.PUT_LINE('customer_id =' || c_id);
DBMS_OUTPUT.PUT_LINE('Product ID' || p_id);
end loop;
close cur;
END


(*************************************************************


1
-------------------

declare 

c_ID sales.customer_ID%type:=:CustomerID;
cursor c1
is
select distinct product_ID from sales where customer_ID = c_ID;
i number(5);
begin
for i in c1 loop
dbms_output.put_line('Product ID ' || i.product_ID);
end loop;
end;

2
---

declare 

c_ID sales.customer_ID%type:=:CustomerID;
cursor c2
is
select quantity,product_ID from sales where  customer_ID = c_ID;
i number(5);
s products.price%type:=0;
p number(10);
begin

for i in c2 loop
p:=0;
select price into p from products where product_ID = i.product_ID;
s := s + (p * i.quantity);
end loop;
dbms_output.put_line('Total purchase: ' || s);
end;
3
--------------

declare 

cursor c1
is 
select *  from products order by product_ID;

i number(10);

begin 

for i in c1 loop
dbms_output.put_line('Product ID ' || i.product_ID || ' price ' || i.price);
end loop;
end;

4
--------------------

declare
cursor cur is select unique sales.quantity,product.price,sales.customer_ID
from sales,product
where sales.product_id=product.product_id
order by customer_ID desc;
prod number;
quan number(10);
pri number(10);
c_id number(10);
begin
open cur;
loop
fetch cur into quan,pri,c_id;
exit when cur%notfound;
prod:=pri*quan;
dbms_output.put_line('customer_id =' || c_id);
dbms_output.put_line('quantity value =' || quan);
dbms_output.put_line('price =' || pri);
dbms_output.put_line('The total value of customer purchases is = ' || prod);
end loop;
close cur;
end;
