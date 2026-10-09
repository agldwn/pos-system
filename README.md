# POS System

A CodeIgniter 4 Point-of-Sale system with customer and user account management.

## Features

- Customer account listing
- Add and edit customer records
- Customer form validation
- User account listing
- Add and edit user records
- JPG and PNG avatar upload
- Avatar validation with a 2MB size limit
- Login and logout
- Password hashing and verification
- Session-based authentication
- Protected customer and user pages

## Requirements

- XAMPP
- PHP 8.2 or higher
- MySQL or MariaDB
- Composer
- CodeIgniter 4

## Local Setup

1. Copy the project into:

   `C:\xampp\htdocs\pos-system`

2. Start MySQL in XAMPP.

3. Create a database named:

   `pos_system_db`

4. Import:

   `database/pos_system_db.sql`

5. Configure the local `.env` file:

   ```ini
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = localhost
   database.default.database = pos_system_db
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.DBPrefix =
   database.default.port = 3306