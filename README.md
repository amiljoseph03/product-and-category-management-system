Product & Category Management System
-------------------------------------

This is a web-based Product & Category Management System developed using Core PHP and MySQL.
The system allows an admin to manage product categories, products, and monitor overall statistics through a dashboard.

Objectives
...........

To implement secure session-based authentication.
To manage categories and products using CRUD operations.
To restrict inactive categories from being used in products.
To display system statistics in a dashboard.

Technologies Used
.................

Core PHP (No Framework)
MySQL Database
PDO (Prepared Statements)
Bootstrap 5 (UI Design)
HTML5, CSS3, JavaScript
XAMPP Server

Database Structure
-------------------

Table Name              Description
..........          	.............
users	                Stores admin login details
categories             	Stores product categories
products	            Stores product information


MODULES
---------
1. -- Authentication Module --

Admin login with username and password
Session-based authentication
Logout functionality

2.-- Category Module --

Add new categories
Edit categories
Delete categories
Activate/Deactivate categories
Inactive categories are not selectable while adding/editing products

3.-- Product Module --

Add products
Edit products
Delete products
Product listing displays category name
Product creation blocked if selected category is inactive

----- Dashboard-----

Displays total number of categories
Displays total number of products
Shows active vs inactive product counts

----- Security Features ----

Password encryption using MD5
PDO prepared statements to prevent SQL Injection
Session protection for all admin pages


------------ Setup instructions -------------------------

Install XAMPP
Import database in phpMyAdmin
Configure config/db.php
Insert admin user
Run project via http://localhost/product-and-category-system

------------Assumptions Made-------------------------------

- The system is designed to be used by a single administrator.
- Admin login credentials are pre-configured and stored in the database.

Default admin login credentials are:
Username	: admin@gmail.com
Password	: admin123

- The password is stored in encrypted format (MD5) in the database.
- Only authenticated admins are allowed to access the dashboard and management modules.
- Categories marked as Inactive cannot be used while creating or editing products