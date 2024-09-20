<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المستخدمين</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            direction: rtl;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .subscriptions {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .subscriptions li {
            margin-bottom: 5px;
        }

        .role {
            font-weight: bold;
            color: #2c3e50;
        }

        .no-subscription {
            color: #e74c3c;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .edit-btn {
            background-color: #f39c12;
        }

        .edit-btn:hover {
            background-color: #e67e22;
        }

        .delete-btn {
            background-color: #e74c3c;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }

        .actions {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="actions">
        <a href="{{ route('admin.dashboard') }}" class="btn">الرجوع إلى لوحة التحكم</a>
    </div>

    <h1>قائمة المشتركين</h1>
    <table>
        <thead>
            <tr>
                <th>معرف المستخدم</th>
                <th>اسم المستخدم</th>
                <th>البريد الإلكتروني</th>
                <th>الدور</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="role">{{ $user->role->role_name }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn edit-btn">تعديل</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn delete-btn">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>

            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
