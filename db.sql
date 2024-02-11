create database eventphpcrud;

CREATE TABLE users(
    id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(100),
    email varchar(100) UNIQUE,
    address varchar(100),
    phone varchar(20),
    gender ENUM("male","female","other"),
    langauge SET("nepali","english","hindi"),
    country varchar(100)
    )