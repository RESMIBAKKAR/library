<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الكتب</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        .header-bar {
            background-color: #3498db;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            color: white;
            margin-bottom: 30px;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions .btn {
            padding: 10px 20px;
            background-color: white;
            color: #3498db;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .actions .btn:hover {
            background-color: #2980b9;
            color: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .book-card {
            display: flex;
            flex-direction: column;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s;
        }

        .book-card:hover {
            transform: translateY(-5px);
        }

        .book-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .book-info {
            padding: 15px;
            flex-grow: 1;
        }

        .book-info h2 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #333;
        }

        .book-info p {
            margin: 5px 0;
            color: #666;
        }

        .book-info .author {
            font-weight: bold;
            color: #2c3e50;
        }

        .book-info .view-btn, .book-info .edit-btn, .book-info .delete-btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
        }

        .book-info .view-btn:hover, .book-info .edit-btn:hover, .book-info .delete-btn:hover {
            background-color: #2980b9;
        }

        .no-access {
            color: #e74c3c;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header-bar">
        <h1>عرض الكتب</h1>
        <div class="actions">
            <a href="{{ route('home') }}" class="btn">الرجوع للصفحة الرئيسية</a>
            @if(Auth::check() && (Auth::user()->role->role_name === 'admin' || Auth::user()->role->role_name === 'publisher'))
                <a href="{{ route('admin.dashboard') }}" class="btn">لوحة التحكم</a>
                <a href="{{ route('books.create') }}" class="btn">إضافة كتاب جديد</a>
            @endif
        </div>
    </div>

    <div class="container">
        @foreach ($books as $book)
            <div class="book-card">
                @if ($book->image)
                    <img src="{{ asset('images/books/' . $book->image) }}" alt="{{ $book->name }}">
                @else
                    <img src="https://via.placeholder.com/300x200" alt="No Image">
                @endif
                <div class="book-info">
                    <h2>{{ $book->name }}</h2>
                    <p>{{ $book->description }}</p>
                    <p class="author">مؤلف: {{ optional($book->writer)->name ?? 'غير متوفر' }}</p>
                    @if (Auth::check() && !Auth::user()->guest)
                        @if ($book->pdf)
                            <a href="{{ asset('pdf/books/' . $book->pdf) }}" class="view-btn" target="_blank">عرض الكتاب</a>
                        @else
                            <p class="no-access">لا يتوفر ملف PDF لهذا الكتاب</p>
                        @endif
                    @else
                        <p class="no-access">يجب تسجيل الدخول لعرض الكتاب</p>
                    @endif
                    @if(Auth::check() && (Auth::user()->role->role_name === 'admin' || (Auth::user()->role->role_name === 'publisher' && $book->users_id === Auth::user()->id)))
                        <a href="{{ route('books.edit', $book->id) }}" class="edit-btn">تعديل</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('هل أنت متأكد من حذف هذا الكتاب؟');">حذف</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
