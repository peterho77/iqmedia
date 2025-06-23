<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang quản trị Admin</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        ul { list-style: none; padding: 0; }
        li { margin-bottom: 10px; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Trang quản trị Admin</h1>
    <ul>
        <li><a href="{{ route('posts.index') }}">Quản lý bài viết</a></li>
        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Đăng xuất
            </a>
        </li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>