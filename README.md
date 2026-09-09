🛠️ IT Support Portal

A web-based IT Support Ticket Management System developed to help users report technical issues and allow support engineers to manage, assign, and resolve tickets efficiently.

The application provides a complete support workflow from user registration and login to ticket creation, automatic engineer assignment, and ticket status management.

---

📌 Project Overview

The IT Support Portal is a dynamic web application designed for managing IT support requests in an organization.

Users can:

- Register an account
- Log in securely
- Create support tickets
- Select issue category
- Set ticket priority
- View submitted tickets
- View ticket details
- Track ticket status

Support engineers can:

- Log in using engineer credentials
- View support tickets
- View assigned tickets
- Manage ticket status
- Update tickets from Open → In Progress → Resolved → Closed

The application is deployed on an AWS EC2 Linux server using Nginx, PHP-FPM, and MySQL/MariaDB.

---

✨ Features

👤 User Management

- User Registration
- Secure Login
- Password Hashing
- Session-based Authentication
- Logout
- Role-based access

🎫 Ticket Management

- Create Support Ticket
- Problem Title
- Detailed Description
- Issue Category
- Priority Selection
- Ticket ID Generation
- Ticket Creation Date
- Ticket Status Tracking

👨‍💻 Support Engineer

- Engineer Login
- Engineer Dashboard
- View Support Tickets
- Automatic Ticket Assignment
- Assigned Engineer Display
- Update Ticket Status

📊 Ticket Status

Open
  ↓
In Progress
  ↓
Resolved
  ↓
Closed

---

🏗️ System Architecture

                   ┌─────────────────────┐
                   │       User          │
                   │   Web Browser       │
                   └──────────┬──────────┘
                              │
                              ▼
                   ┌─────────────────────┐
                   │       httpd         │
                   │    Web Server       │
                   └──────────┬──────────┘
                              │
                              ▼
                   ┌─────────────────────┐
                   │      PHP-FPM        │
                   │ Application Logic   │
                   └──────────┬──────────┘
                              │
                              ▼
                   ┌─────────────────────┐
                   │    MySQL/MariaDB    │
                   │      Database       │
                   └─────────────────────┘

Deployment Architecture

                AWS Cloud
                    │
                    ▼
              ┌───────────┐
              │ EC2 Linux │
              └─────┬─────┘
                    │
          ┌─────────┼─────────┐
          ▼         ▼         ▼
       httpd     PHP-FPM   MySQL
          │
          ▼
   IT Support Portal

---

📸 Screenshots

1. User Registration

The registration page allows new users to create an account.

---

2. Login

Users can log in using their registered email and password.

---

3. User Dashboard

After successful login, users can access the support dashboard.

---

4. Create Support Ticket

Users can submit technical problems by selecting a category and priority.

---

5. My Tickets

Users can view all tickets submitted from their account.

---

6. Ticket Details

Users can view detailed information about an individual ticket.

---

7. Support Engineer Dashboard

Engineers can view and manage support requests.

---

8. Automatic Ticket Assignment

New tickets are automatically assigned to an available support engineer.

---

9. Ticket Status Update

Engineers can update ticket status.

Example workflow:

Open
 ↓
In Progress
 ↓
Resolved
 ↓
Closed

---

💻 Technologies Used

Technology| Purpose
Linux| Server Operating System
AWS EC2| Cloud Server
httpd| Web Server
PHP| Backend Development
PHP-FPM| PHP Processing
MySQL/MariaDB| Database
HTML| Webpage Structure
CSS| User Interface
SQL| Database Management
Git| Version Control
GitHub| Source Code Repository

---

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
│
├── screenshots/
│   ├── 01-registration.png
│   ├── 02-login.png
│   ├── 03-dashboard.png
│   ├── 04-create-ticket.png
│   ├── 05-my-tickets.png
│   ├── 06-ticket-details.png
│   ├── 07-engineer-dashboard.png
│   ├── 08-ticket-assignment.png
│   └── 09-status-update.png
│
└── README.md

## 📸 Screenshots

### 1. Registration Page
The Registration Page allows new users to create an account by entering their name, email, password, and other required details.

![Registration Page](screenshots/01-registration.png)

---

### 2. Login Page
The Login Page allows registered users to securely log in to the IT Support Portal using their email and password.

![Login Page](screenshots/02-login.png)

---

### 3. User Dashboard
The User Dashboard provides users with an overview of their support activities and available ticket management options.

![User Dashboard](screenshots/03-dashboard.png)

---

### 4. Create Support Ticket
Users can create a new IT support ticket by entering the issue title, description, category, and priority.

![Create Ticket](screenshots/04-create-ticket.png)

---

### 5. My Tickets
The My Tickets page displays tickets created by the logged-in user along with their status, priority, and ticket information.

![My Tickets](screenshots/05-my-tickets.png)

---

### 6. Ticket Details
The Ticket Details page provides complete information about a selected support ticket, including the issue description, category, priority, status, and assigned engineer.

![Ticket Details](screenshots/06-ticket-details.png)

---

### 7. Engineer Dashboard
The Engineer Dashboard allows support engineers to view assigned tickets and manage user-reported IT issues.

![Engineer Dashboard](screenshots/07-engineer-dashboard.png)

---

### 8. Ticket Status Update
Support engineers can update the status of assigned tickets, such as Open, In Progress, Resolved, or Closed.

![Status Update](screenshots/08-status-update.png)

---

🗄️ Database

The application uses a MySQL/MariaDB database named:

techsupport

Users Table

The "users" table stores user authentication and role information.

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'user'
);

Roles:

user
engineer

---

Tickets Table

The "tickets" table stores support requests.

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

Ticket Fields

Field| Description
"id"| Unique ticket number
"user_id"| User who created ticket
"title"| Problem title
"description"| Problem details
"category"| Type of technical issue
"priority"| Low, Medium, or High
"status"| Current ticket status
"assigned_to"| Assigned support engineer
"created_at"| Ticket creation time

---

🔐 Authentication & Authorization

The application uses session-based authentication.

Users are assigned roles:

User
Engineer

User Flow

Register
   ↓
Login
   ↓
User Dashboard
   ↓
Create Ticket
   ↓
View My Tickets

Engineer Flow

Engineer Login
      ↓
Engineer Dashboard
      ↓
View Assigned Tickets
      ↓
Update Ticket
      ↓
Resolved / Closed

---

⚙️ Installation

1. Update Linux Server

sudo dnf update -y

---

2. Install httpd

sudo dnf install httpd -y

Start httpd:

sudo systemctl start httpd

Enable at boot:

sudo systemctl enable httpd

---

3. Install PHP

Install PHP and PHP-FPM:

sudo dnf install php php-fpm php-mysqli -y

Start PHP-FPM:

sudo systemctl start php-fpm

Enable PHP-FPM:

sudo systemctl enable php-fpm

---

4. Install MySQL/MariaDB

Install MariaDB:

sudo dnf install mariadb105-server -y

Start the database:

sudo systemctl start mariadb

Enable it:

sudo systemctl enable mariadb

---

🗃️ Database Setup

Log in to MariaDB:

sudo mysql -u root -p

Create the database:

CREATE DATABASE techsupport;

Select the database:

USE techsupport;

Create the required tables using the SQL definitions provided above.

Verify:

SHOW TABLES;

Expected:

users
tickets

---

🚀 AWS Deployment

The application was deployed on an AWS EC2 Linux instance.

Deployment Steps

AWS EC2 Instance
       ↓
Install httpd
       ↓
Install PHP + PHP-FPM
       ↓
Install MySQL/MariaDB
       ↓
Create Database
       ↓
Upload Application
       ↓
Configure Web Server
       ↓
Start Services
       ↓
Access Website

Application directory:

/var/www/html/techsupport

Website:

http://YOUR-EC2-PUBLIC-IP/techsupport/

---

🔍 Service Verification

Check httpd:

sudo systemctl status httpd

Check PHP-FPM:

sudo systemctl status php-fpm

Check MariaDB:

sudo systemctl status mariadb

All required services should be running

---

🛠️ Example Support Tickets

Network Issue

Problem: Wi-Fi not working
Category: Network
Priority: High
Status: Open

Printer Issue

Problem: Printer not responding
Category: Printer
Priority: Medium
Status: Open

Account Issue

Problem: Password reset required
Category: Account/Login
Priority: High
Status: Open

---

🔮 Future Enhancements

The following features can be added in future versions:

- 📧 Email notifications
- 🔎 Ticket search and filtering
- 📊 Dashboard statistics
- 👨‍💻 Multiple support engineers
- 🎯 Engineer workload-based assignment
- 📚 IT troubleshooting knowledge base
- 🐧 Linux troubleshooting guide
- 🌐 Network troubleshooting tools
- 🔒 HTTPS using SSL/TLS
- 🐙 GitHub Actions CI/CD
- 📱 Responsive mobile interface
- 📝 Ticket comments
- 📎 File/attachment upload
- 📈 Support performance reports
- 🔔 Real-time notifications

---

🎯 Project Objectives

The main objectives of this project are:

1. Develop a practical IT support ticket management system.
2. Implement user authentication and role-based access.
3. Store support requests in a relational database.
4. Automate ticket assignment to support engineers.
5. Provide ticket status tracking.
6. Deploy a dynamic PHP application on AWS EC2.
7. Gain practical experience with Linux, Nginx, PHP, MySQL and AWS.

---

📚 Skills Demonstrated

Through this project, the following technical skills were demonstrated:

- Linux Server Administration
- AWS EC2
- Httpd configuration 
- PHP & PHP-FPM
- MySQL/MariaDB
- SQL
- HTML & CSS
- Web Application Deployment
- User Authentication
- Role-Based Access Control
- Database Management
- Troubleshooting
- Networking Fundamentals
- Git & GitHub

---

👨‍💻 Author

Rohit Pradip Patil

IT Support | Linux | AWS | Networking | Cloud Computing

---

⭐ Project

If you find this project useful, consider giving the repository a ⭐ on GitHub.
