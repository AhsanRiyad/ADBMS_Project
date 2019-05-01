drop SEQUENCE id;
/
create SEQUENCE id
INCREMENT by 1
start with 1
maxvalue 1000
NOCACHE
NOCYCLE ;
/

drop table customer;
/
CREATE TABLE customer (
  id number(32) ,
  name varchar(100) ,
  email varchar(100) ,
  uName varchar(100) ,
  pswrd varchar(100) ,
  gender varchar(100) ,
  dob varchar(100) ,
  blood_group varchar(100) ,
  buy_count number(11) 
) ;
/
INSERT INTO customer (id, name, email, uName, pswrd, gender, dob, blood_group, buy_count) VALUES
(2, 'Anika Khaled', 'anikakhaled@yahoo.com', 'ani', '123', 'female', '1995-10-09', 'A+', 5);

/
drop table donate_blood;
/

CREATE TABLE donate_blood (
  donor_id number(30) ,
  donar_name varchar(100),
  donar_BG varchar(100),
  donar_contact varchar(100),
  donar_area varchar(100)
) ;
/
drop table login;

/
CREATE TABLE login (
  id number(32) ,
  uName varchar(72) ,
  pswrd varchar(72) ,
  role varchar(72) 
) ;
/


INSERT INTO login (id, uName, pswrd, role) VALUES
(1, 'ani', '123', 'customer');

INSERT INTO login (id, uName, pswrd, role) VALUES
(2, 'admin', '1', 'admin');

/

drop table medicine;
/
CREATE TABLE medicine (
  id number(30) ,
  med_name varchar(50) ,
  indication varchar(100) ,
  generic varchar(200) ,
  price number(30) ,
  quantity number(30) ,
  sell_count number(30) 
);
/
drop table order_report;

/

CREATE TABLE order_report (
  orderId number(30)  ,
  orderName varchar(100) ,
  orderQuantity number(30) ,
  orderCost number(30) 
);
/

drop table product;

CREATE TABLE product (
  pro_id number(30) ,
  pro_name varchar(50) ,
  pro_quan number(30) ,
  pro_price number(30) 
) ;


/
