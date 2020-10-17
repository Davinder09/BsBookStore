--
-- Database: 'bookstoredb'
--

DROP DATABASE IF EXISTS BookStoreDb;

CREATE DATABASE BookStoreDb;

--
-- Table structure for table 'bookInventory'
--

CREATE TABLE BookInventory (
	Id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	BookName varchar (75) NOT NULL,
    BookPrice decimal (5) NOT NULL,
    Quantity smallint (3) NOT NULL
);

--
-- Table structure for table 'bookInventoryOrder'
--

CREATE TABLE BookInventoryOrder (
	Id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	FirstName varchar (75) NOT NULL,
    LastName varchar (75) NOT NULL,
    PaymentMethod varchar (75) NOT NULL,
    BookId int NOT NULL,
    FOREIGN KEY (BookId) REFERENCES BookInventory(Id)
);

--
-- Database created successfully
--