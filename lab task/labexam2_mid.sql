a)	Write a PLSQL program to take the  customer_ID as an input. Display the list of unique product_IDs that customer purchased from the sales table.

Ans:

declare 
c_id sales.customer_id%type:=:enter_value;
c_i number(5);

cursor c1
is
select distinct product_id from sales where customer_id = c_id;

begin
dbms_output.put_line('Customer id:' || c_id || ' has brought following unique products');

for i in C1 loop
dbms_output.put_line('P_ID:' || i.product_id);
end loop;
end;

b)	Write a PLSQL program to take the customer_ID as an input. Display the total amount of that customer  purchases.

Ans:

declare 
c_id sales.customer_id%type:=:enter_value;
c_i number(5);
total_taka number(7);

begin

select sum(price*s.quantity) into total_taka from sales s, products p where p.product_id = s.product_id and s.customer_id = c_id;

dbms_output.put_line('Customer id:' || c_id || ' has brought total tk: ' || total_taka);

end;
	
	
	


c)	Using cursors write a PLSQL program to print out on screen the product_ID and price for each product within the products table (ascending by product_ID).

Ans:

declare 
cursor c1
is
select product_id, price from products order by product_id;

begin
for i in c1 loop
dbms_output.put_line('Product  id:' || i.product_id || ' price: ' || i.price);
end loop;

end;
	
	


d)	Write a PLSQL program to display the total list of customer_IDs and the total order value for each customer (descending by customer_ID).

Ans:

declare 
c_id sales.customer_id%type;

cursor c1
is
select  s.customer_id , sum(price*quantity) as Total_TK from sales s, products p where p.product_id = s.product_id group by customer_id order by customer_id DESC;

begin
for i in c1 loop
dbms_output.put_line('Customer id:' || i.customer_id || ' total: ' || i.Total_Tk);
end loop;

end;