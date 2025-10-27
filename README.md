<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Students Management System 
## Description / Overview

The Students Management System is a web-based application designed to help educational institutions efficiently manage student records. Built with Laravel and featuring a clean, professional interface, this system provides a comprehensive solution for storing, viewing, editing, and managing student information. The application offers an intuitive user experience with responsive design that works seamlessly across desktop and mobile devices.

## Objectives
- **CRUD Operations Mastery** — Implement complete Create, Read, Update, and Delete functionality for student records
- **Database Management** — Design and manage a relational database structure for storing student information
- **User Interface Design** — Create a professional, user-friendly interface following modern web design principles
- **Responsive Web Development** — Build a mobile-first responsive application that adapts to different screen sizes
- **Form Validation** — Implement client-side and server-side validation for data integrity
- **Routing and Controllers** — Utilize Laravel's MVC architecture for organized code structure
- **Professional UI/UX** — Design clean, business-appropriate interfaces without AI-generated styling patterns

## Features / Functionality
### Core  Features
- #### **Student Registration**
    - **Student Number**
    - **Full Name (First Name, Middle Initial, Last Name)**
    - **Email Address**
    - **Contact Number**
- #### **Student Records Management**
    - **View complete list of all registered students**
    - **Display student ID and student number for easy identification**
    - **Show both "Last, First" and "First Last" name formats**
- #### **Student Profile View**
    - **Detailed view of individual student information**
    - **Clean profile layout with organized sections**
    - **Visual representation with initials avatar**
- #### **Edit Student Information**
    - **Update existing student records**
    - **Form validation to ensure data accuracy**
    - **Pre-filled forms for easy editing**
- #### **Delete Student Record**
    - **Remove students from the system**
    - **Confirmation dialog to prevent accidental deletion**

## User Interface Features
- **Professional Designy** — Clean, business-like interface with modern aesthetics
- **Responsive Layout** — Fully responsive design that works on all devices
- **Floating Action Button** — Quick access to add new students from any page
- **Interactive Tables** — Sortable and filterable student lists
- **Empty States** — Helpful messages when no students are registered
- **Visual Feedback** — Hover effects and transitions for better user experience
    
## Installation Instructions
### Prerequisites
- **PHP >= 8.1** 
- **Composer** 
- **MySQL or PostgreSQL**
- **Node.js and npm (for asset compilation)** 
- **Laravel >= 10.x**
### Setup Steps
1. **Clone the repository**
   - **git clone https://github.com/yourusername/students-management-system.git
   cd students-management-system**
2. **Install PHP dependencies**
   - **composer install**
3. **Install Node dependencies**
   - **npm install**
4. **Create environment file**
   - **cp .env.example .env**
5. **Generate application key**
   - **php artisan key:generate**
6. **Configure database**
**Edit the .env file and set your database credentials:**

     **DB_CONNECTION=mysql**<br>
     **DB_HOST=127.0.0.1**<br>
     **DB_PORT=3306**<br>
     **DB_DATABASE=students_db**<br>
     **DB_USERNAME=your_username**<br>
     **DB_PASSWORD=your_password**<br>
7. **Run migrations**
    - **php artisan migrate**
8. **Seed the database (optional)**
    - **php artisan db:seed**
9. **Compile assets**
    - **npm run dev**
10. **Start the development server**
    - **php artisan serve**
11. **Access the application**
Open your browser and navigate to<br>
**Run your server at `http://localhost:8000`**



   


We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
