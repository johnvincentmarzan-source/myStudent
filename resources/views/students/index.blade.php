<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <meta http-equiv="refresh" content="5">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f8fafc;
            min-height: 100vh;
            line-height: 1.6;
        }
        header {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 1.5rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }
        header .header-content {
            width: 95%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        header h2 { font-size: 1.875rem; font-weight: 700; color: #1f2937; text-align: center; }
        .btn { display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 500; border: none; cursor: pointer; transition: all 0.15s ease; font-family: inherit; }
        .btn-primary { background: #2563eb; color: white; border: 1px solid #2563eb; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-edit { background: #f3f4f6; color: #374151; border: 1px solid #d1d5db; padding: 6px 12px; font-size: 13px; }
        .btn-edit:hover { background: #e5e7eb; border-color: #9ca3af; }
        .btn-delete { background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; padding: 6px 12px; font-size: 13px; }
        .btn-delete:hover { background: #fecaca; border-color: #f87171; }
        .container { width: 95%; max-width: 1400px; margin: 0 auto; background: white; padding: 2rem; border-radius: 12px; border: 1px solid #e5e7eb; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05); }
        h1 { margin-bottom: 1.5rem; color: #111827; font-size: 1.5rem; font-weight: 600; }
        .button-group { display: flex; gap: 12px; margin-bottom: 2rem; flex-wrap: wrap; }
        .table-container { overflow-x: auto; border-radius: 8px; border: 1px solid #e5e7eb; }
        table { width: 100%; border-collapse: collapse; background: white; font-size: 14px; position: relative; }
        th { background: #f9fafb; color: #374151; padding: 12px 16px; text-align: left; font-weight: 600; font-size: 13px; border-bottom: 2px solid #e5e7eb; text-transform: uppercase; letter-spacing: 0.05em; }
        td { padding: 16px; border-bottom: 1px solid #f3f4f6; vertical-align: middle; }
        tr { transition: background-color 0.15s ease; }
        tr:hover { background: #f9fafb; }
        .student-name { font-weight: 500; color: #111827; }
        .student-number { background: #f3f4f6; padding: 4px 8px; border-radius: 4px; font-family: 'SF Mono', Monaco, Inconsolata, 'Roboto Mono', Consolas, 'Courier New', monospace; font-size: 13px; color: #6b7280; font-weight: 500; }
        .section-badge, .course-badge, .year-badge { display: inline-block; padding: 4px 10px; border-radius: 16px; font-size: 12px; font-weight: 500; color: white; text-transform: uppercase; letter-spacing: 0.025em; }
        .section-badge { background: #3b82f6; }
        .course-badge { background: #059669; }
        .year-badge { background: #d97706; }
        .actions { display: flex; gap: 6px; align-items: center; }
        .empty-state { text-align: center; padding: 3rem 1rem; color: #6b7280; }
        .empty-state-icon { font-size: 3rem; margin-bottom: 1rem; opacity: 0.6; }
        .empty-state div { font-size: 16px; font-weight: 500; }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <h2>🎓 Student Management System</h2>
        </div>
    </header>

    <div class="container">
        <h1>Students List</h1>
        <div class="button-group">
            <a href="{{ route('students.create') }}" class="btn btn-primary"> Add New Student</a>
            <a href="{{ route('sections.create') }}" class="btn btn-primary"> Add Section</a>
            <a href="{{ route('sections.index') }}" class="btn btn-primary"> View Sections</a>
            <a href="{{ route('dashboard') }}" class="btn btn-primary"> Go to Dashboard</a>
        </div>

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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
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
                                    {{ $student->year_level }}
                                    {{ $student->year_level == 1 ? 'st' : ($student->year_level == 2 ? 'nd' : ($student->year_level == 3 ? 'rd' : 'th')) }} Year
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
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->contactNumber }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-edit">✏️ Edit</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')"> Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="empty-state">
                            <div class="empty-state-icon">📚</div>
                            <div>No students found.</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>