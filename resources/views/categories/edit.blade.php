<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($category) ? 'تعديل نوع' : 'إنشاء نوع' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>{{ isset($category) ? 'تعديل نوع' : 'إنشاء نوع' }}</h1>
    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
        @csrf
        @if (isset($category))
            @method('PUT') <!-- استخدم PUT عند التعديل -->
        @endif
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" id="name" name="name" value="{{ old('name', isset($category) ? $category->name : '') }}" required>
        </div>
        <div class="form-group">
            <label for="description">الوصف</label>
            <textarea id="description" name="description" rows="4" required>{{ old('description', isset($category) ? $category->description : '') }}</textarea>
        </div>
        <button type="submit" class="btn">{{ isset($category) ? 'تحديث' : 'إنشاء' }}</button>
    </form>
</div>

</body>
</html>
