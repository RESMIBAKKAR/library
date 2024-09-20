<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل كتاب</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            position: relative;
            padding-bottom: 60px;
        }

        .container {
            margin: 20px auto;
            max-width: 800px;
            padding: 0 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-weight: bold;
            color: #34495e;
        }

        input, textarea, select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        button {
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        button:hover {
            background-color: #2980b9;
        }

        .current-image, .current-pdf {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>تعديل كتاب</h1>
    <form action="{{ route('books.update', $books->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">اسم الكتاب:</label>
        <input type="text" name="name" id="name" value="{{ $books->name }}" required>

        <label for="description">وصف الكتاب:</label>
        <textarea name="description" id="description" required>{{ $books->description }}</textarea>

        <label for="writer">المؤلف:</label>
        <select name="writers_id" id="writer" required>
            @foreach($writers as $writer)
                <option value="{{ $writer->id }}" {{ $writer->id == $books->writers_id ? 'selected' : '' }}>
                    {{ $writer->name }}
                </option>
            @endforeach
        </select>

        <label for="categories">اختيار النوع:</label>
        <select name="categories[]" id="categories" multiple required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ in_array($category->id, $books->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <label for="image">صورة الكتاب (اختياري):</label>
        <input type="file" name="image" id="image" accept="image/*">
        @if($books->image)
            <p class="current-image">الصورة الحالية: <img src="{{ asset('images/books/' . $books->image) }}" alt="{{ $books->name }}" width="100"></p>
        @endif

        <label for="pdf">ملف الكتاب PDF (اختياري):</label>
        <input type="file" name="pdf" id="pdf" accept="application/pdf">
        @if($books->pdf)
            <p class="current-pdf">ملف PDF الحالي: <a href="{{ asset('pdf/books/' . $books->pdf) }}" target="_blank">عرض الملف</a></p>
        @endif

        <button type="submit">حفظ التعديلات</button>
    </form>
</div>

</body>
</html>
