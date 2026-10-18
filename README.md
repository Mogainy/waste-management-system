# ♻️ Waste Management System

A web-based Waste Management System developed using **PHP, MySQL, HTML, CSS, and JavaScript** to streamline waste collection requests, driver assignments, vehicle management, and collection tracking.

## Project Overview

The Waste Management System provides a centralized platform connecting customers, waste collection drivers, and administrators.

The application is designed to simplify waste collection operations through digital requests, job assignments, collection tracking, and administrative management.

## Key Features

### Administrator Module
- Manage customers and their information.
- Register and manage drivers.
- Add, update, and manage collection vehicles.
- View and manage waste collection requests.
- Assign drivers and vehicles to collection requests.
- Monitor collection operations.
- Access administrative reports.
- Manage system settings.

### Customer Module
- Register and log in.
- Access a personalized dashboard.
- Submit new waste collection requests.
- View collection request history.
- Track collection progress.
- Manage profile information.

### Driver Module
- Access a dedicated driver dashboard.
- View assigned collection jobs.
- Start assigned collection jobs.
- Mark completed collection jobs.
- Track job progress.
- Manage driver profile information.

## Technologies Used

| Technology | Purpose |
|---|---|
| PHP | Backend development |
| MySQL | Database management |
| HTML5 | Web page structure |
| CSS3 | User interface styling |
| JavaScript | Client-side functionality |
| XAMPP | Local development environment |
| Git & GitHub | Version control |

## Project Structure

```text
waste_management_system/
├── admin/
├── assets/
│   ├── css/
│   └── js/
├── authentication/
├── customer/
├── database/
│   └── waste_management.sql
├── driver/
├── includes/
│   └── config.php
├── index.php
├── login.php
├── logout.php
├── register.php
└── README.md
```

## Installation and Setup

1. Install XAMPP.
2. Clone this repository:

```bash
git clone https://github.com/Mogainy/waste-management-system.git
```

3. Move the project into the XAMPP `htdocs` directory.
4. Start Apache and MySQL.
5. Open `http://localhost/phpmyadmin`.
6. Create the database required by the application configuration.
7. Import `database/waste_management.sql`.
8. Configure your local database connection in `includes/config.php`.
9. Open the application at:

```text
http://localhost/waste_management_system/
```

## System Workflow

1. A customer registers and submits a waste collection request.
2. An administrator reviews the request and assigns a driver and vehicle.
3. The assigned driver starts the collection job.
4. The driver updates the job when collection is completed.
5. The administrator monitors operations and reviews reports.

## Future Enhancements

- GPS-based driver tracking.
- SMS and email notifications.
- Online collection payments.
- Automated collection scheduling.
- Advanced reporting and analytics.
- Mobile application integration.

## Developer

**Enock Mokaya**

Diploma in Information Technology  
Zetech University, Kenya

GitHub: https://github.com/Mogainy

Email: enockmokaya35@gmail.com

## Project Status

Portfolio project demonstrating full-stack web development, relational database management, role-based dashboards, and waste collection workflows.

---

Developed by Enock Mokaya.