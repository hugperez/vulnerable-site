CREATE TABLE auth1(username VARCHAR(255) NOT NULL,password VARCHAR(255) NOT NULL);
CREATE TABLE auth2(username VARCHAR(255) NOT NULL,password VARCHAR(255) NOT NULL);
CREATE TABLE auth3(username VARCHAR(255) NOT NULL,password VARCHAR(255) NOT NULL);
CREATE TABLE xss2(username VARCHAR(255) NOT NULL,comment VARCHAR(255) NOT NULL);
CREATE TABLE xss3(username VARCHAR(255) NOT NULL,comment VARCHAR(255) NOT NULL);
CREATE TABLE xss4(username VARCHAR(255) NOT NULL,comment VARCHAR(255) NOT NULL);
CREATE TABLE sql1(username VARCHAR(255) NOT NULL,password VARCHAR(255) NOT NULL);
CREATE TABLE sqli3 ( id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, year VARCHAR(255)
NOT NULL, description VARCHAR(255) NOT NULL);

insert into auth1 values ('admin', 'password');
insert into auth2 values ('alice', '123456789');
insert into auth3 values ('admin', '49a8d6398bc509eb098ae5f0bb590b7ed7ee8ed7ee2b9ee4f46c61b904811505');
insert into sql1 values ('admin', '690a83792cd7e70bff705f77632fd4bb');
insert into sql1 values ('user1', '5f4dcc3b5aa765d61d8327deb882cf99');
INSERT INTO sqli3 values ('1', 'Orange', '2013', 'Une orange'),('2', 'Banane', '2014', 'Une banane'),('3', 'Pomme', '2015', 'Une pomme'),('4', 'Poire', '2016', 'Une poire'),('5', 'Fraise', '2017', 'Une fraise'),('6', 'Citron', '2018', 'Un citron'),('7', 'Mangue', '2019', 'Une mangue'),('8', 'Ananas', '2020', 'Un ananas'),('9', 'Raisin', '2021', 'Un raisin'),('10', 'Kiwi', '2022', 'Un kiwi'),('11', 'Melon', '2023', 'Un melon');