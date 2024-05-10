-- Ethyn Nguyen - Student ID: 1001930354
-- Jorge Catano - Student ID: 1002149092

-- Create SCHEMA
CREATE SCHEMA IF NOT EXISTS `database`;
USE `database`;

-- Create SHOP table
CREATE TABLE IF NOT EXISTS SHOP (
    sId INT PRIMARY KEY,
    Sname VARCHAR(255) NOT NULL,
    Street VARCHAR(255),
    City VARCHAR(255),
    StateAb CHAR(2),
    ZipCode VARCHAR(10),
    Sdate DATE,
    Telno VARCHAR(15),
    URL VARCHAR(255)
);

-- Create DEALER table
CREATE TABLE IF NOT EXISTS DEALER (
    dId INT PRIMARY KEY,
    Dname VARCHAR(255) NOT NULL,
    Street VARCHAR(255),
    City VARCHAR(255),
    StateAb CHAR(2),
    Zipcode VARCHAR(10)
);

-- Create CUSTOMER table
CREATE TABLE IF NOT EXISTS CUSTOMER (
    cId INT PRIMARY KEY,
    Cname VARCHAR(255) NOT NULL,
    Street VARCHAR(255),
    City VARCHAR(255),
    StateAb CHAR(2),
    Zipcode VARCHAR(10)
);

-- Create ITEM table
CREATE TABLE IF NOT EXISTS ITEM (
    iId INT PRIMARY KEY AUTO_INCREMENT,
    Iname VARCHAR(255) NOT NULL,
    Sprice DECIMAL(10, 2) NOT NULL
);

-- Create EMPLOYEE table
CREATE TABLE IF NOT EXISTS EMPLOYEE (
    sId INT,
    SSN VARCHAR(11),
    Ename VARCHAR(255) NOT NULL,
    Street VARCHAR(255),
    City VARCHAR(255),
    StateAb CHAR(2),
    Zipcode VARCHAR(10),
    Etype VARCHAR(255),
    Bdate DATE,
    Sdate DATE,
    Edate DATE,
    Level VARCHAR(255),
    Asalary DECIMAL(20, 2),
    Agency VARCHAR(255),
    Hsalary DECIMAL(20, 2),
    Institute VARCHAR(255),
    Itype VARCHAR(255),
    PRIMARY KEY (SSN, sId),
    FOREIGN KEY (sId) REFERENCES SHOP(sId)
);

-- Create DEALER_SHOP table
CREATE TABLE IF NOT EXISTS DEALER_SHOP (
    dId INT,
    sId INT,
    PRIMARY KEY (dId, sId),
    FOREIGN KEY (dId) REFERENCES DEALER(dId),
    FOREIGN KEY (sId) REFERENCES SHOP(sId)
);

-- Create CONTRACT table
CREATE TABLE IF NOT EXISTS CONTRACT (
    ctId INT,
    dId INT,
    Sdate DATE,
    Ctime TIME,
    Cname VARCHAR(255),
    PRIMARY KEY (ctId, dId),
    FOREIGN KEY (dId) REFERENCES DEALER(dId)
);

-- Create DEALER_ITEM table
CREATE TABLE IF NOT EXISTS DEALER_ITEM (
    dId INT,
    iId INT,
    dprice DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (dId, iId),
    FOREIGN KEY (dId) REFERENCES DEALER(dId),
    FOREIGN KEY (iId) REFERENCES ITEM(iId)
);

-- Create OLDPRICE table
CREATE TABLE IF NOT EXISTS OLDPRICE (
    iId INT,
    Sprice DECIMAL(10, 2) NOT NULL,
    Sdate DATE,
    Edate DATE,
    PRIMARY KEY (iId, Sdate),
    FOREIGN KEY (iId) REFERENCES ITEM(iId)
);

-- Create ORDER table
CREATE TABLE IF NOT EXISTS `ORDER` (
    oId INT PRIMARY KEY AUTO_INCREMENT,
    sId INT,
    cId INT NOT NULL,
    Odate DATE,
    Ddate DATE,
    Amount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (sId) REFERENCES SHOP(sId),
    FOREIGN KEY (cId) REFERENCES CUSTOMER(cId)
);

-- Create ORDER_ITEM table
CREATE TABLE IF NOT EXISTS ORDER_ITEM (
    oId INT,
    sId INT,
    iId INT,
    Icount INT NOT NULL,
    PRIMARY KEY (oId, sId, iId),
    FOREIGN KEY (oId) REFERENCES `ORDER`(oId),
    FOREIGN KEY (sId) REFERENCES SHOP(sId),
    FOREIGN KEY (iId) REFERENCES ITEM(iId)
);

-- Create SHOP_ITEM table
CREATE TABLE IF NOT EXISTS SHOP_ITEM (
    sId INT,
    iId INT,
    Scount INT NOT NULL,
    PRIMARY KEY (sId, iId),
    FOREIGN KEY (sId) REFERENCES SHOP(sId),
    FOREIGN KEY (iId) REFERENCES ITEM(iId)
);

-- Create SHOP_CUSTOMER table
CREATE TABLE IF NOT EXISTS SHOP_CUSTOMER (
    sId INT,
    cId INT,
    PRIMARY KEY (sId, cId),
    FOREIGN KEY (sId) REFERENCES SHOP(sId),
    FOREIGN KEY (cId) REFERENCES CUSTOMER(cId)
);