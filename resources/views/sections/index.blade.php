<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sections List</title>

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

        header h2 { 
            font-size: 1.875rem; 
            font-weight: 700; 
            color: #1f2937;
            text-align: center;
        }

        .container {
            width: 95%;
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        }

        h1 { margin-bottom: 1.5rem; color: #111827; font-size: 1.5rem; font-weight: 600; }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.15s ease;
            border: none;
            cursor: pointer;
        }
        .btn-primary { background: #2563eb; color: white; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-edit { background: #f3f4f6; color: #374151; }
        .btn-edit:hover { background: #e5e7eb; }
        .btn-delete { background: #fee2e2; color: #dc2626; }
        .btn-delete:hover { background: #fecaca; }

        .table-container { overflow-x: auto; border-radius: 8px; border: 1px solid #e5e7eb; }

        table { width: 100%; border-collapse: collapse; background: white; font-size: 14px; }
        th {
            background: #f9fafb;
            color: #374151;
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            border-bottom: 2px solid #e5e7eb;
        }
        td { padding: 16px; border-bottom: 1px solid #f3f4f6; }

        tr:hover { background: #f9fafb; }

        .actions { display: flex; gap: 6px; align-items: center; }
    </style>
</head>
<body>
    <header>
        <h2>📚 Section Management</h2>
    </header>

    <div class="container">
        <h1>Sections List</h1>
        <div style="margin-bottom: 1rem;">
            <a href="{{ route('sections.create') }}" class="btn btn-primary"> + Add New Section</a>
            <a href="{{ route('students.index') }}" class="btn btn-primary"> ← Back to Students</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Section Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sections as $section)
                    <tr>
                        <td>{{ $section->id }}</td>
                        <td>{{ $section->section_name }}</td>

                        <td>
                            <div class="actions">
                                <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-edit">✏️ Edit</a>
                                <form action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')"> Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align:center; color:#6b7280; padding: 2rem;">No sections found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>