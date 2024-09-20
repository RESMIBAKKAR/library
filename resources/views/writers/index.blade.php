<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الكاتبين</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
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
        .actions {
            display: flex;
            justify-content: flex-end; /* زر إضافة كاتب جديد على اليمين */
            margin-bottom: 20px;
        }
        .actions .btn {
            margin-left: 10px; /* مسافة بين الأزرار */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        .btn {
            padding: 5px 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* للتأكد من عدم وجود خطوط تحت الأزرار */
        }
        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="actions">
        <a href="{{ route('writers.create') }}" class="btn">إضافة كاتب جديد</a>
        <a href="{{ route('admin.dashboard') }}" class="btn">الرجوع إلى لوحة التحكم</a>
    </div>

    <h1>عرض الكاتبين</h1>
    <table>
        <thead>
            <tr>
                <th>الإجراءات</th>
                <th>تاريخ الميلاد</th>
                <th>الجنسية</th>
                <th>الاسم</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($writers as $writer)
                <tr>
                    <td>
                        <a href="{{ route('writers.edit', $writer->id) }}" class="btn">تعديل</a>
                        <form action="{{ route('writers.destroy', $writer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn">حذف</button>
                        </form>
                    </td>
                    <td>{{ $writer->date_of_birth }}</td>
                    <td>{{ $writer->nationality }}</td>
                    <td>{{ $writer->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
