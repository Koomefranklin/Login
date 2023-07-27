# PHP Secure Login
A Secure login system in PHP making use of hashing and salting of passwords
The password has to pass a complexity check to be accepted:
```bash
It should contain:
Atleast one uppercase letter
Atleast one lowercase letter
Atleast one numeric digit (0 thru 9)
Atleast one special character (punctuation mark)
A length of atleast 8 characters
```
### Requirements
```bash
PHP version >= 7.x.x
MySQL / MariaDB
Apache Server
```
### Getting Started
### MySQL Terminal
Create a database select it and Import the login.sql file
This creates the required tables 
```bash
CREATE DATABASE Login;
USE Login;
SOURCE login.php;
```
Verify the import
```bash
SHOW TABLES;
SELECT * FROM users;
```
### phpMyAdmin:
In phpMyAdmin, navigate to the database where you want to import the SQL file.
Then, look for an option like "Import" or "Browse," which allows you to upload the SQL file from your local system

After the import there is data added in the table for testing
start the Apache and mysql/mariadb servers and open localhost on the browser
```bash
USERNAME: user
PASSWORD: Qwerty12#
```
