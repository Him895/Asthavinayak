 Asthavinayak Property – Real Estate Management System
Asthavinayak Property is a web-based real estate management system where users can explore available properties and send inquiries, while the admin can manage property listings and view user inquiries in one place.

 Features
👤 User Features
Browse all available properties with images, prices, and details.
Submit an inquiry form to request more details about a property.

🛠️ Admin Features
Property Management: Add, edit, and delete property listings.

Inquiry Management: View, reply to, and delete inquiries submitted by users.

Dashboard to view total properties and total inquiries.

📂 Modules
User Module

Home Page – Display all properties

Property Details Page

Inquiry Form Submission

Admin Module

Admin Login & Logout

Dashboard Overview

Add New Property

Edit / Delete Property

View & Manage User Inquiries

 Technologies Used
Frontend: HTML, CSS, JavaScript, Bootstrap

Backend: Core PHP

Database: MySQL

Server: Apache (XAMPP)

 Installation Guide
Download or Clone the Project

bash
Copy
Edit
git clone https://github.com/your-username/asthavinayak-property.git
Move the Project to XAMPP htdocs Folder
Example:

vbnet
Copy
Edit
C:/xampp/htdocs/asthavinayak-property
Create a Database in phpMyAdmin

Go to: http://localhost/phpmyadmin

Create a database, e.g., asthavinayak_db

Import the Database File

Find database.sql in the project folder

Import it into your new database

Update Database Credentials

Open connection.php (or config file)

Change database name, username, and password if needed:

php
Copy
Edit
$conn = mysqli_connect("localhost", "root", "", "asthavinayak_db");
Run the Project

User side: http://localhost/asthavinayak-property

Admin side: http://localhost/asthavinayak-property/admin

Default Admin Login
Username: admin

Password: admin123

📌 Future Enhancements
Add property booking system

Implement Google Maps integration

Add user registration and profile management

