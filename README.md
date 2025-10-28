<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Student Management System
## Description / Overview

The Student Management System is a web-based application built with Laravel that provides a comprehensive solution for managing student records in an educational institution. The system allows administrators to efficiently manage student information, track enrollments, and organize students by courses, year levels, and sections. With an intuitive user interface and robust backend functionality, this system streamlines the process of student data management.

## Objectives

- Develop a fully functional CRUD (Create, Read, Update, Delete) system for student records
- Implement a clean and professional user interface that enhances user experience
- Create a centralized dashboard for viewing enrollment statistics and student data
- Practice Laravel framework fundamentals including routing, models, controllers, and Blade templating
- Apply modern web design principles for responsive and accessible interfaces
- Demonstrate proficiency in database relationships and data management
- Build a scalable system that can be extended with additional features

## Features / Functionality

### Core Features

- **Student Management**
  - Add new students with complete information
  - Edit existing student records
  - Delete student records with confirmation
  - View all students in a comprehensive list

- **Dashboard Analytics**
  - Display total number of students
  - Show enrolled students count
  - Track inactive students
  - View detailed list of enrolled students

- **Data Organization**
  - Organize students by course (CIT, BSCS, BSIT, BSECE, BSA)
  - Classify students by year level (1st to 4th year)
  - Assign students to specific sections
  - Track student contact information

- **User Interface**
  - Responsive design that works on desktop, tablet, and mobile devices
  - Clean and modern interface with professional aesthetics
  - Intuitive navigation between different sections
  - Visual indicators using badges for courses, years, and sections

### Technical Features

- **Database Integration**: MySQL database with proper relationships
- **Form Validation**: Server-side and client-side validation for data integrity
- **Search Functionality**: Easy data retrieval and filtering
- **Auto-refresh**: Student list automatically refreshes every 5 seconds
- **Responsive Tables**: Horizontal scrolling for mobile devices

## Installation Instructions

### Prerequisites

- PHP >= 8.0
- Composer
- MySQL or MariaDB
- Laravel 10.x
- Node.js and NPM (optional, for asset compilation)

### Setup Steps

1. **Clone the repository**
```bash
   git clone https://github.com/yourusername/student-management-system.git
   cd student-management-system
```

2. **Install dependencies**
```bash
   composer install
```

3. **Configure environment**
```bash
   cp .env.example .env
```

4. **Edit the `.env` file with your database credentials**
```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=student_management
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
```

5. **Generate application key**
```bash
   php artisan key:generate
```

6. **Run database migrations**
```bash
   php artisan migrate
```

7. **Seed the database (optional)**
```bash
   php artisan db:seed
```

8. **Start the development server**
```bash
   php artisan serve
```

9. **Access the application**
   - Open your browser and navigate to `http://localhost:8000`

## Usage

### Managing Students

#### Adding a New Student

1. Click on **"Add New Student"** button from the students list page
2. Fill in the required information:
   - Student Number (required)
   - First Name (required)
   - Last Name (required)
   - Middle Initial (optional)
   - Course (required)
   - Year Level (required)
   - Section (optional)
   - Email (optional)
   - Contact Number (optional)
3. Click **"Add Student"** to save the record
4. Click **"Back to List"** to return without saving

#### Editing a Student

1. From the students list, click the **"Edit"** button next to the student record
2. Modify the necessary fields
3. Click **"Update Student"** to save changes
4. Click **"Back to List"** to cancel

#### Deleting a Student

1. From the students list, click the **"Delete"** button next to the student record
2. Confirm the deletion in the popup dialog
3. The student record will be permanently removed

#### Viewing Dashboard

1. Click **"Go to Dashboard"** from the students list
2. View enrollment statistics in the stats cards
3. Browse the list of enrolled students
4. Click **"Go to Students List"** to return to the main list

## Screenshots or Code Snippets

### Routes Configuration
```php
// routes/web.php
Route::resource('students', StudentController::class);
Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
```

### Student Model with Relationship
```php
// app/Models/Student.php
class Student extends Model
{
    protected $fillable = [
        'studentNumber', 'fname', 'lname', 'mi', 'course', 
        'year_level', 'section_id', 'email', 'contactNumber'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
```

### Controller - Store Method with Validation
```php
// app/Http/Controllers/StudentController.php
public function store(Request $request)
{
    $validated = $request->validate([
        'studentNumber' => 'required|unique:students|max:255',
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'course' => 'required|string',
        'year_level' => 'required|integer|between:1,4',
    ]);

    Student::create($validated);
    return redirect()->route('students.index');
}
```

### Dashboard Method
```php
public function dashboard()
{
    $total = Student::count();
    $enrolled = Student::whereNotNull('section_id')->count();
    $inactive = Student::whereNull('section_id')->count();
    $enrolledStudents = Student::with('section')->whereNotNull('section_id')->get();
    
    return view('dashboard', compact('total', 'enrolled', 'inactive', 'enrolledStudents'));
}
```

### Database Migration
```php
// database/migrations/create_students_table.php
Schema::create('students', function (Blueprint $table) {
    $table->id();
    $table->string('studentNumber')->unique();
    $table->string('fname');
    $table->string('lname');
    $table->string('mi')->nullable();
    $table->string('course');
    $table->integer('year_level');
    $table->foreignId('section_id')->nullable()->constrained();
    $table->string('email')->nullable();
    $table->string('contactNumber')->nullable();
    $table->timestamps();
});
```

### Blade Template - Displaying Students
```blade
@forelse($students as $student)
<tr>
    <td>{{ $student->id }}</td>
    <td>{{ $student->studentNumber }}</td>
    <td>{{ $student->lname }}, {{ $student->fname }}</td>
    <td>{{ $student->course }}</td>
    <td>
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-edit">Edit</a>
    </td>
</tr>
@empty
<tr>
    <td colspan="5">No students found.</td>
</tr>
@endforelse
```

## Project Structure
```
student-management-system/
├── app/
│   ├── Http/Controllers/
│   │   └── StudentController.php
│   └── Models/
│       ├── Student.php
│       └── Section.php
├── database/
│   └── migrations/
├── resources/
│   └── views/
│       ├── students/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   └── edit.blade.php
│       └── dashboard.blade.php
└── routes/
    └── web.php
```

## Technologies Used

- **Backend Framework**: Laravel 10.x
- **Frontend**: HTML5, CSS3, Blade Templating
- **Database**: MySQL
- **PHP Version**: 8.0+
- **Design Pattern**: MVC (Model-View-Controller)

## Key Learning Outcomes

- Laravel routing and resource controllers
- Eloquent ORM and database relationships
- Blade templating engine
- Form handling and validation
- CRUD operations implementation
- Responsive web design
- MVC architecture pattern

## Future Enhancements

- User authentication and authorization
- Advanced search and filtering options
- Export data to CSV/Excel
- Grade management system
- Print-friendly reports

## Contributors

- **[John Vincent Marzan]** - Full Stack Developer
- **[Hardly Rianne Laranang]** 

*Developed as part of the Midterm Examination for [Bachelor of Science in Information in technology]*

## License

This project is licensed under the MIT License.
```
MIT License

Copyright (c) 2025 [John Vincent Marzan]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so.
```

## Acknowledgments

- Laravel documentation and community
- Course instructors and classmates

## Contact

For questions or feedback, please contact:
- Email: johnvincentmarzan47@gmail.com
- GitHub: [@yourusername](https://github.com/yourusername)

---

**Note**: This project was created as part of academic requirements and demonstrates the application of web development concepts learned during the course.
