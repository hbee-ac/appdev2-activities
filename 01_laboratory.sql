-- Creating a Database
#CREATE DATABASE Company;

-- Selecting a Database
#USE Company;

-- Creating a Table and Inserting Data into Table
#CREATE TABLE Employees (
  -> EmployeeID INT PRIMARY KEY,
  -> FirstName VARCHAR(20),
  -> LastName VARCHAR(20),
  -> Age INT,
  -> Department VARCHAR(255)
  -> );

-- Viewing Data
#SELECT * FROM Employees;

-- Updating Data
#UPDATE Employees
  -> SET Department = "Marketing"
  -> WHERE EmployeeID = 2;

-- Deleting Data
#DELETE FROM Employees
  -> WHERE EmployeeID = 3;

--Dropping the Table
#DROP TABLE Employees;