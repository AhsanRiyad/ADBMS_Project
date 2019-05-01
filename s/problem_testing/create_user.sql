alter session set "_ORACLE_SCRIPT"=true; 


create user sheba identified by 1234;
grant connect, resource, unlimited tablespace to sheba;
ALTER USER sheba DEFAULT TABLESPACE USERS;
ALTER USER sheba TEMPORARY TABLESPACE TEMP;

alter session set "_ORACLE_SCRIPT"=true; 


grant create session to sheba;


GRANT CONNECT, RESOURCE, DBA TO sheba;

GRANT UNLIMITED TABLESPACE TO sheba;

SET SERVEROUTPUT ON

grant all privileges to sheba;
