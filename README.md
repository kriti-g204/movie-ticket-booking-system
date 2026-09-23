LUMIÈRE - Movie Ticket Booking System

LUMIÈRE is a web-based Movie Ticket Booking System developed as a DBMS mini-project. The system allows users to browse available movies, view theatre details and show timings, book movie tickets, view their booking history, and manage their accounts.

Features
• User login and authentication
• Browse available movies
• Filter movies by genre
• View theatre details and show timings
• View available seats and ticket prices
• Book movie tickets
• Automatic reduction of available seats after booking
• View booking history through the My Bookings page
• Logout functionality
• Account deletion with restrictions when existing bookings are associated with the account

Technologies Used
• HTML - Frontend webpage structure
• CSS - Webpage styling and layout
• PHP - Backend processing and database connectivity
• MariaDB - Database management
• phpMyAdmin - Database creation and management
• XAMPP - Local server environment
• Apache NetBeans - Development environment

Database
The project uses a MariaDB database named movie_booking.
The database consists of five main tables:
• Users
• Movies
• Theatres
• Shows
• Bookings
The tables are connected using primary keys and foreign keys to maintain relationships and data integrity.
A database trigger named reduce_seats is implemented to automatically reduce the available seat count in the Shows table whenever a new booking is inserted into the Bookings table.

Database Structure
Users
Stores registered user information used for authentication.
Movies
Stores movie names and genres.
Theatres
Stores theatre names and locations.
Shows
Stores movie shows, including show timings, available seats, and ticket prices. It connects movies and theatres using foreign keys.
Bookings
Stores ticket booking information, including the user, show, number of seats booked, and total booking amount.

Project Structure
movie_booking/
│
├── nbproject/
├── book.php
├── db.php
├── delete_account.php
├── index.php
├── login.php
├── logout.php
├── my_bookings.php
├── style.css
└── movie_booking.sql

How to Run

1. Install XAMPP with Apache and MySQL/MariaDB support.

2. Start Apache and MySQL from the XAMPP Control Panel.

3. Copy the movie_booking project folder into the XAMPP htdocs directory.

4. Open phpMyAdmin and create a database named movie_booking.

5. Import the movie_booking.sql file into the movie_booking database. This will create the required tables and database objects.

6. Open the project in a web browser using: http://localhost/movie_booking/

Database Functionality
The system uses relational database concepts to manage users, movies, theatres, shows, and bookings.
Primary keys and foreign keys are used to establish relationships between the tables and maintain referential integrity.
The reduce_seats trigger automatically updates seat availability when a ticket booking is made.

Project Objective
The objective of this project is to demonstrate the practical implementation of Database Management System concepts through a web-based application. The project demonstrates relational database design, normalization, primary and foreign key relationships, database triggers, referential integrity, SQL operations, and frontend-backend connectivity.

Project Type
DBMS Mini-Project - Movie Ticket Booking System
