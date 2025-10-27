<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - Student Management System</title>
<style>
    * { 
        margin: 0; 
        padding: 0; 
        box-sizing: border-box; 
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        background: #f8fafc;
        min-height: 100vh;
        line-height: 1.6;
        padding: 2rem 1rem;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        background: white;
        padding: 2rem;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
    }

    .header { 
        text-align: center; 
        margin-bottom: 2rem; 
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #f3f4f6;
    }
    
    .header h1 { 
        color: #111827; 
        font-size: 2rem; 
        font-weight: 700; 
        margin-bottom: 0.5rem;
    }
    
    .header p { 
        color: #6b7280; 
        font-size: 1rem;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 2rem;
        padding: 12px 24px;
        border-radius: 8px;
        background: #f3f4f6;
        color: #374151;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        border: 1px solid #d1d5db;
        transition: all 0.15s ease;
    }
    
    .back-btn:hover { 
        background: #e5e7eb;
        border-color: #9ca3af;
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2.5rem;
    }
    
    .stat-box {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        border: 1px solid #e5e7eb;
        transition: all 0.15s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-box:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .stat-box h3 { 
        color: #6b7280; 
        font-size: 0.875rem; 
        font-weight: 500;
        margin-bottom: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    .stat-box p { 
        font-size: 2rem; 
        font-weight: 700; 
        color: #2563eb;
        margin-bottom: 0.5rem;
    }

    .stat-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #2563eb, #3b82f6);
        border-radius: 12px 12px 0 0;
    }

    .stat-box:nth-child(2)::before {
        background: linear-gradient(90deg, #059669, #10b981);
    }

    .stat-box:nth-child(3)::before {
        background: linear-gradient(90deg, #d97706, #f59e0b);
    }

    .stat-box:nth-child(2) p {
        color: #059669;
    }

    .stat-box:nth-child(3) p {
        color: #d97706;
    }

    h2 { 
        margin: 2rem 0 1.5rem 0; 
        color: #111827; 
        font-size: 1.25rem;
        font-weight: 600;
    }

    .table-container { 
        overflow-x: auto; 
        border-radius: 8px; 
        border: 1px solid #e5e7eb;
        margin-bottom: 2rem;
    }
    
    table { 
        width: 100%; 
        border-collapse: collapse; 
        background: white; 
        font-size: 14px;
    }
    
    th { 
        background: #f9fafb; 
        color: #374151;
        padding: 12px 16px; 
        text-align: left; 
        font-weight: 600;
        font-size: 13px;
        border-bottom: 2px solid #e5e7eb;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    
    td { 
        padding: 16px; 
        border-bottom: 1px solid #f3f4f6;
        vertical-align: middle;
    }
    
    tr:hover { 
        background: #f9fafb; 
    }

    .empty { 
        text-align: center; 
        color: #6b7280; 
        padding: 3rem 1rem;
        font-weight: 500;
    }

    .year-badge, .section-badge, .course-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 16px;
        font-size: 12px;
        font-weight: 500;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    .year-badge { background: #d97706; }   
    .section-badge { background: #3b82f6; }
    .course-badge { background: #059669; }

    .student-name { 
        font-weight: 500; 
        color: #111827; 
    }
    
    .student-number { 
        background: #f3f4f6; 
        padding: 4px 8px; 
        border-radius: 4px; 
        font-family: 'SF Mono', Monaco, Inconsolata, 'Roboto Mono', Consolas, 'Courier New', monospace; 
        font-size: 13px; 
        color: #6b7280; 
        font-weight: 500;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        body {
            padding: 1rem;
        }
        
        .container {
            padding: 1.5rem;
        }
        
        .header h1 {
            font-size: 1.75rem;
        }
        
        .stats {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .stat-box {
            padding: 1.25rem;
        }
        
        .stat-box p {
            font-size: 1.75rem;
        }
        
        th, td {
            padding: 8px 12px;
            font-size: 13px;
        }
        
        h2 {
            font-size: 1.125rem;
        }
    }

    @media (max-width: 480px) {
        .header h1 {
            font-size: 1.5rem;
        }
        
        .container {
            padding: 1rem;
        }
        
        .back-btn {
            padding: 10px 16px;
            font-size: 13px;
        }
    }

    /* Custom scrollbar */
    .table-container::-webkit-scrollbar {
        height: 8px;
    }

    .table-container::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 4px;
    }

    .table-container::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }

    .table-container::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

    /* Focus states for accessibility */
    .back-btn:focus {
        outline: 2px solid #2563eb;
        outline-offset: 2px;
    }

    /* Loading animation for stat boxes */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-box {
        animation: fadeInUp 0.6s ease forwards;
    }

    .stat-box:nth-child(2) {
        animation-delay: 0.1s;
    }

    .stat-box:nth-child(3) {
        animation-delay: 0.2s;
    }
</style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>🎓 Dashboard</h1>
        <p>Overview of students and enrollment statistics</p>
    </div>

    <a href="{{ route('students.index') }}" class="back-btn">← Go to Students List</a>

    <!-- Stats -->
    <div class="stats">
        <div class="stat-box">
            <h3>Total Students</h3>
            <p>{{ $total }}</p>
        </div>
        <div class="stat-box">
            <h3>Enrolled</h3>
            <p>{{ $enrolled }}</p>
        </div>
        <div class="stat-box">
            <h3>Inactive</h3>
            <p>{{ $inactive }}</p>
        </div>
    </div>

    <!-- Enrolled Table -->
    <h2>Enrolled Students</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Number</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Section</th>
                    <th>Email</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                @forelse($enrolledStudents as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td><span class="student-number">{{ $student->studentNumber }}</span></td>
                        <td><span class="student-name">{{ $student->lname }}, {{ $student->fname }} {{ $student->mi }}</span></td>
                        <td>
                            @if($student->course)
                                <span class="course-badge">{{ $student->course }}</span>
                            @else
                                <span style="color:#a0aec0;">—</span>
                            @endif
                        </td>
                        <td>
                            @if($student->year_level)
                                <span class="year-badge">
                                    {{ $student->year_level }}{{ $student->year_level == 1 ? 'st' : ($student->year_level == 2 ? 'nd' : ($student->year_level == 3 ? 'rd' : 'th')) }} Year
                                </span>
                            @else
                                <span style="color:#a0aec0;">—</span>
                            @endif
                        </td>
                        <td>
                            @if($student->section && $student->section->section_name)
                                <span class="section-badge">{{ $student->section->section_name }}</span>
                            @else
                                <span style="color:#a0aec0;">—</span>
                            @endif
                        </td>
                        <td>{{ $student->email ?? '—' }}</td>
                        <td>{{ $student->contactNumber ?? '—' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="empty">No enrolled students found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
