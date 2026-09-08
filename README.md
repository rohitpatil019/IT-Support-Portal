# 🛠️ IT Support Portal

A web-based **IT Support Ticket Management System** developed using **PHP, MySQL/MariaDB, Apache httpd, and AWS EC2**.

The system allows users to register, log in, create IT support tickets, track ticket status, and automatically assign tickets to available support engineers.

---

## 📌 Project Overview

The **IT Support Portal** provides a centralized platform for managing common IT support issues such as:

- Network problems
- Hardware issues
- Software installation problems
- Internet connectivity
- Printer issues
- Email problems
- Account/Login problems
- Operating System issues

The application is deployed on an **AWS EC2 Linux server** using:

- Apache httpd
- PHP
- PHP-FPM
- MySQL/MariaDB

---

## 🚀 Features

### 👤 User Management
- User registration
- User login
- Secure password storage
- Session-based authentication
- Logout functionality

### 🎫 Ticket Management
- Create support tickets
- Select ticket category
- Set ticket priority
- View submitted tickets
- View ticket details
- Track ticket status

### 👨‍💻 Support Engineer
- Engineer login
- View assigned tickets
- Update ticket status
- Manage support requests

### 🔄 Ticket Assignment

New tickets can be automatically assigned to an available support engineer.

### 📊 Ticket Status

Tickets can have the following statuses:

```text
Open
In Progress
Resolved
Closed
🏗️ System Architecture
                👤 User
                  |
                  v
          🌐 Web Browser
                  |
                  v
        ☁️ AWS EC2 Linux Server
                  |
                  v
          🔵 Apache httpd
                  |
                  v
              🐘 PHP
                  |
                  v
             PHP-FPM
                  |
                  v
          🗄️ MySQL / MariaDB
                  |
                  v
          📊 techsupport Database
☁️ AWS Deployment Architecture
              AWS Cloud
                  |
                  v
            EC2 Instance
             Linux OS
                  |
                  v
           Apache httpd
                  |
                  v
        IT Support Portal
                  |
          +-------+-------+
          |               |
          v               v
       PHP-FPM       MySQL/MariaDB
          |               |
          +-------+-------+
                  |
                  v
          techsupport DB
🛠️ Technologies Used
Technology
Purpose
Linux
Server Operating System
AWS EC2
Cloud Server
Apache httpd
Web Server
PHP
Backend Development
PHP-FPM
PHP Processing
MySQL/MariaDB
Database
HTML
Web Page Structure
CSS
User Interface
SQL
Database Management
Git
Version Control
GitHub
Source Code Hosting
📂 Project Structure
techsupport/
│
├── db.php
├── register.php
├── login.php
├── dashboard.php
├── create_ticket.php
├── tickets.php
├── view_ticket.php
├── admin.php
├── update_ticket.php
├── logout.php
├── README.md
│
└── screenshots/
    ├── 01-registration.png
    ├── 02-login.png
    ├── 03-dashboard.png
    ├── 04-create-ticket.png
    ├── 05-my-tickets.png
    ├── 06-ticket-details.png
    ├── 07-engineer-dashboard.png
    └── 08-status-update.png
📸 Screenshots
1. Registration Page
�
2. Login Page
�
3. User Dashboard
�
4. Create Support Ticket
�
5. My Tickets
�
6. Ticket Details
�
7. Support Engineer Dashboard
�
8. Ticket Status Update
�
🗄️ Database
Database name:
techsupport
Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'user'
);
Tickets Table
CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(100) NOT NULL,
    priority VARCHAR(20) NOT NULL,
    status VARCHAR(30) DEFAULT 'Open',
    assigned_to INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
⚙️ Installation
1. Update the Linux Server
sudo dnf update -y
2. Install Apache httpd
sudo dnf install httpd -y
Start Apache:
sudo systemctl start httpd
Enable Apache at boot:
sudo systemctl enable httpd
Check Apache status:
sudo systemctl status httpd
3. Install PHP
sudo dnf install php php-fpm php-mysqli -y
Start PHP-FPM:
sudo systemctl start php-fpm
Enable PHP-FPM:
sudo systemctl enable php-fpm
Check PHP-FPM:
sudo systemctl status php-fpm
4. Install MariaDB
sudo dnf install mariadb105-server -y
Start MariaDB:
sudo systemctl start mariadb
Enable MariaDB:
sudo systemctl enable mariadb
Check MariaDB:
sudo systemctl status mariadb
📁 Deploy Project
Copy the project into:
/var/www/html/techsupport
Example:
sudo mkdir -p /var/www/html/techsupport
Set permissions:
sudo chown -R apache:apache /var/www/html/techsupport
sudo chmod -R 755 /var/www/html/techsupport
🗄️ Database Configuration
Login to MariaDB:
sudo mysql
Create database:
CREATE DATABASE techsupport;
Select database:
USE techsupport;
Create the required tables using the SQL provided above.
🔐 Database Connection
Configure db.php with your database credentials.
Example:
<?php

$host = "localhost";
$username = "root";
$password = "YOUR_MYSQL_PASSWORD";
$database = "techsupport";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
⚠️ Security: Never upload your real database password to a public GitHub repository.
🌐 Access the Website
After starting Apache and PHP-FPM, open:
http://YOUR-EC2-PUBLIC-IP/techsupport/
Registration:
http://YOUR-EC2-PUBLIC-IP/techsupport/register.php
Login:
http://YOUR-EC2-PUBLIC-IP/techsupport/login.php
🔥 AWS Security Group
Allow HTTP traffic in the EC2 Security Group.
Type: HTTP
Protocol: TCP
Port: 80
Source: 0.0.0.0/0
Then access the application using the EC2 public IP.
🔑 User Flow
User
 |
 v
Register
 |
 v
Login
 |
 v
Dashboard
 |
 v
Create Ticket
 |
 v
Ticket Automatically Assigned
 |
 v
Track Ticket
 |
 v
Resolved / Closed
👨‍💻 Support Engineer Flow
Engineer Login
      |
      v
Engineer Dashboard
      |
      v
View Assigned Tickets
      |
      v
Update Ticket Status
      |
      v
In Progress
      |
      v
Resolved
      |
      v
Closed
🧪 Testing Checklist
[x] User Registration
[x] User Login
[x] User Dashboard
[x] Ticket Creation
[x] Ticket Listing
[x] Ticket Details
[x] Automatic Ticket Assignment
[x] Engineer Login
[x] Engineer Dashboard
[x] Ticket Status Update
[x] Logout
[x] MySQL/MariaDB Database Connection
[x] Apache httpd Deployment
[x] PHP-FPM Configuration
[x] AWS EC2 Deployment
🔍 Service Verification
Check Apache:
sudo systemctl status httpd
Check PHP-FPM:
sudo systemctl status php-fpm
Check MariaDB:
sudo systemctl status mariadb
Check Apache listening on port 80:
sudo ss -tlnp | grep :80
┌──────────────┐
│     User     │
└──────┬───────┘
       ↓
┌──────────────┐
│ Create Ticket│
└──────┬───────┘
       ↓
┌──────────────┐
│ Auto Assign  │
│   Engineer   │
└──────┬───────┘
       ↓
┌──────────────┐
│    Open      │
└──────┬───────┘
       ↓
┌──────────────┐
│ In Progress  │
└──────┬───────┘
       ↓
┌──────────────┐
│   Resolved   │
└──────┬───────┘
       ↓
┌──────────────┐
│    Closed    │
└──────────────┘
🎯 Project Objectives
Build a practical IT Support Ticket Management System.
Implement user authentication.
Manage IT support incidents through tickets.
Implement automatic ticket assignment.
Provide engineer-based ticket management.
Deploy a PHP application on AWS EC2.
Configure Apache httpd as the web server.
Use MySQL/MariaDB for data storage.
Gain practical Linux server administration experience.
Practice Git and GitHub version control.
🔮 Future Enhancements
Email notifications
Ticket search and filtering
Dashboard statistics
Multiple support engineers
Workload-based ticket assignment
Ticket comments
File attachments
Knowledge base
IT troubleshooting guides
HTTPS/SSL
GitHub Actions CI/CD
Responsive mobile interface
Admin user management
Ticket reports
Notification system
💡 Skills Demonstrated
Linux Server Administration
AWS EC2
Apache httpd Configuration
PHP Development
PHP-FPM
MySQL/MariaDB
HTML/CSS
SQL
Git & GitHub
User Authentication
IT Support
Ticket Management
Network Troubleshooting
System Troubleshooting
Cloud Deployment
👨‍💻 Author
Rohit Pradip Patil
IT Support | Linux | AWS | Networking | Cloud Computing
⭐ Project
If you find this project useful, consider giving the repository a ⭐ on GitHub. :::
