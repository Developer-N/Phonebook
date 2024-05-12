# Phonebook
دفترچه تلفن

کد ساختن پایگاه داده

```mysql
CREATE DATABASE Phonebook;
USE Phonebook;
CREATE TABLE contacts(
    id int AUTO_INCREMENT PRIMARY KEY,
    firstName varchar(100) NOT NULL,
    lastName varchar(150) NOT NULL,
    mobile varchar(11) NOT NULL,
    phone varchar(11),
    address varchar(500),
    photo varchar(500)
);
```

