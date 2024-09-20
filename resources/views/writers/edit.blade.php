<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل كاتب</title>
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
        .form-group input {
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
    <h1>تعديل كاتب</h1>
    <form action="{{ route('writers.update', $writer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" id="name" name="name" value="{{ $writer->name }}" required>
        </div>
        <div class="form-group">
            <label for="nationality">الجنسية</label>
            <input type="text" id="nationality" name="nationality" value="{{ $writer->nationality }}" required>
        </div>
        <div class="form-group">
            <label for="date_of_birth">تاريخ الميلاد</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $writer->date_of_birth }}" required>
        </div>
        <button type="submit" class="btn">تحديث</button>
    </form>
</div>

</body>
</html>
