<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'MyStudent')</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f4f6f9; margin:20px; }
        h1 { margin-bottom:15px; }
        .btn { background:#3498db; color:#fff; padding:6px 12px; border-radius:5px; text-decoration:none; margin:2px; display:inline-block; }
        .btn:hover { background:#2980b9; }
        .btn.secondary { background:#6c757d; }
        .btn.danger { background:#e74c3c; }
        .btn.small { padding:4px 8px; font-size:0.9em; }
        table { width:100%; border-collapse:collapse; margin-top:15px; background:#fff; }
        th, td { border:1px solid #ddd; padding:10px; text-align:left; }
        th { background:#2c3e50; color:#fff; }
        tr:nth-child(even) { background:#f9f9f9; }
        .actions { margin-bottom:10px; }
        .flash { padding:10px; background:#e6fffa; border:1px solid #bfe9db; margin-bottom:10px; border-radius:6px;}
    </style>
</head>
<body>
  <div class="card">
    @if(session('success'))
      <div class="flash">{{ session('success') }}</div>
    @endif

    @yield('content')
  </div>
</body>
</html>
