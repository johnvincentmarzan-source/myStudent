<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - Student Management System</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f8fafc;
            min-height: 100vh;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 2rem 1rem;
        }
        header {
            background: white;
            color: #1f2937;
            padding: 1.5rem 2rem;
            text-align: center;
            margin-bottom: 2rem;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 600px;
        }
        header h2 { font-size: 1.875rem; font-weight: 700; }
        .container {
            width: 100%;
            max-width: 600px;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }
        .form-header h2 {
            text-align: center;
            color: #111827;
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .form-header p {
            text-align: center;
            color: #6b7280;
            font-size: 0.875rem;
            margin-bottom: 2rem;
        }
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem;
            margin-bottom: 2rem;
        }
        .form-group { display: flex; flex-direction: column; }
        .form-label { font-weight: 500; font-size: 14px; color: #374151; margin-bottom: 0.5rem; }
        .form-input, .form-select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background: white;
            font-family: inherit;
            transition: all 0.15s ease;
        }
        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        .form-input:hover, .form-select:hover { border-color: #9ca3af; }
        .form-select {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 40px;
            appearance: none;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .btn, .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-family: inherit;
            transition: all 0.15s ease;
            border: none;
            justify-content: center;
            min-width: 140px;
        }
        .btn-primary {
            background: #2563eb;
            color: white;
            border: 1px solid #2563eb;
        }
        .btn-primary:hover { background: #1d4ed8; }
        .back-btn {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
        }
        .back-btn:hover { background: #e5e7eb; border-color: #9ca3af; }
        @media (max-width: 768px) {
            .form-grid { grid-template-columns: 1fr; gap: 1rem; }
            .btn, .back-btn { min-width: 100%; flex: 1; }
            .button-group { flex-direction: column; }
        }
    </style>
</head>
<body>
    <header>
        <h2>🎓 Student Management System</h2>
    </header>

    <div class="container">
        <div class="form-header">
            <h2>Edit Student Information</h2>
            <p>Update the fields below to modify student details</p>
        </div>

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label for="studentNumber" class="form-label">Student Number</label>
                    <input type="text" name="studentNumber" id="studentNumber" class="form-input"
                        value="{{ old('studentNumber', $student->studentNumber) }}" required>
                </div>

                <div class="form-group">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" name="lname" id="lname" class="form-input"
                        value="{{ old('lname', $student->lname) }}" required>
                </div>

                <div class="form-group">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" name="fname" id="fname" class="form-input"
                        value="{{ old('fname', $student->fname) }}" required>
                </div>

                <div class="form-group">
                    <label for="mi" class="form-label">Middle Initial</label>
                    <input type="text" name="mi" id="mi" class="form-input"
                        value="{{ old('mi', $student->mi) }}">
                </div>

                <div class="form-group">
                    <label for="course" class="form-label">Course</label>
                    <select name="course" id="course" class="form-select" required>
                        <option value="">Select Course</option>
                        <option value="CIT" {{ old('course', $student->course) == 'CIT' ? 'selected' : '' }}>CIT</option>
                        <option value="BSCS" {{ old('course', $student->course) == 'BSCS' ? 'selected' : '' }}>BSCS</option>
                        <option value="BSIT" {{ old('course', $student->course) == 'BSIT' ? 'selected' : '' }}>BSIT</option>
                        <option value="BSECE" {{ old('course', $student->course) == 'BSECE' ? 'selected' : '' }}>BSECE</option>
                        <option value="BSA" {{ old('course', $student->course) == 'BSA' ? 'selected' : '' }}>BSA</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="year_level" class="form-label">Year Level</label>
                    <select name="year_level" id="year_level" class="form-select" required>
                        <option value="">Select Year</option>
                        <option value="1" {{ old('year_level', $student->year_level) == 1 ? 'selected' : '' }}>1st Year</option>
                        <option value="2" {{ old('year_level', $student->year_level) == 2 ? 'selected' : '' }}>2nd Year</option>
                        <option value="3" {{ old('year_level', $student->year_level) == 3 ? 'selected' : '' }}>3rd Year</option>
                        <option value="4" {{ old('year_level', $student->year_level) == 4 ? 'selected' : '' }}>4th Year</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="section_id" class="form-label">Section</label>
                    <select name="section_id" id="section_id" class="form-select">
                        <option value="">No Section</option>
                        @foreach($sections as $sec)
                            <option value="{{ $sec->id }}" 
                                {{ old('section_id', $student->section_id) == $sec->id ? 'selected' : '' }}>
                                {{ $sec->section_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-input"
                        value="{{ old('email', $student->email) }}">
                </div>

                <div class="form-group">
                    <label for="contactNumber" class="form-label">Contact Number</label>
                    <input type="text" name="contactNumber" id="contactNumber" class="form-input"
                        value="{{ old('contactNumber', $student->contactNumber) }}">
                </div>
            </div>

            <div class="button-group">
                <a href="{{ route('students.index') }}" class="back-btn">← Back to List</a>
                <button type="submit" class="btn btn-primary"> Update Student</button>
            </div>
        </form>
    </div>
</body>
</html>
