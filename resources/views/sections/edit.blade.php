<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Section - Student Management System</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 2rem 1rem;
        }

        /* Header */
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

        header h2 {
            font-size: 1.875rem;
            font-weight: 700;
        }

        /* Form container */
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

        /* Grid layout for compact form */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem;
            margin-bottom: 2rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            font-weight: 500;
            font-size: 14px;
            color: #374151;
            margin-bottom: 0.5rem;
        }

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

        .form-input:hover, .form-select:hover {
            border-color: #9ca3af;
        }

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

        /* Primary button */
        .btn-primary {
            background: #2563eb;
            color: white;
            border: 1px solid #2563eb;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        /* Back button */
        .back-btn {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .back-btn:hover {
            background: #e5e7eb;
            border-color: #9ca3af;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            header, .container {
                padding: 1.5rem;
            }
            
            .form-header h2 {
                font-size: 1.25rem;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .form-input, .form-select {
                padding: 10px 14px;
                font-size: 16px; /* Prevent zoom on iOS */
            }
            
            .btn, .back-btn {
                padding: 12px 20px;
                font-size: 14px;
                min-width: 100%;
                flex: 1;
            }
            
            .button-group {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            header h2 {
                font-size: 1.5rem;
            }
            
            .container {
                padding: 1rem;
            }
        }

        /* Focus states for accessibility */
        .form-input:focus,
        .form-select:focus,
        .btn:focus,
        .back-btn:focus {
            outline: 2px solid #2563eb;
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <header>
        <h2>🎓 Student Management System</h2>
    </header>

    <div class="container">
        <div class="form-header">
            <h2>Edit Section</h2>
            <p>Update section information</p>
        </div>

        <form action="{{ route('sections.update', $section->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label for="year_level" class="form-label">Year Level</label>
                    <select name="year_level" id="year_level" class="form-select" required>
                        <option value="1" {{ $section->year_level == 1 ? 'selected' : '' }}>1st Year</option>
                        <option value="2" {{ $section->year_level == 2 ? 'selected' : '' }}>2nd Year</option>
                        <option value="3" {{ $section->year_level == 3 ? 'selected' : '' }}>3rd Year</option>
                        <option value="4" {{ $section->year_level == 4 ? 'selected' : '' }}>4th Year</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="section_name" class="form-label">Section Name</label>
                    <input type="text" name="section_name" id="section_name" class="form-input" 
                           value="{{ $section->section_name }}" maxlength="50" required>
                </div>
            </div>

            <div class="button-group">
                <a href="{{ route('sections.index') }}" class="back-btn">← Back to Sections</a>
                <button type="submit" class="btn btn-primary">💾 Update Section</button>
            </div>
        </form>
    </div>
</body>
</html>