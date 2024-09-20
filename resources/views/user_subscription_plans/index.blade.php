<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الاشتراكات</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: right; /* محاذاة النص إلى اليمين */
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .status-active {
            color: #27ae60; /* اللون الأخضر */
        }

        .status-inactive {
            color: #e67e22; /* اللون البرتقالي */
        }

        .status-cancelled {
            color: #e74c3c; /* اللون الأحمر */
        }

        .back-button {
            display: block;
            margin: 20px 0;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('admin.dashboard') }}" class="back-button">الرجوع إلى لوحة التحكم</a>
    <h1>عرض الاشتراكات</h1>
    <table>
        <thead>
            <tr>
                <th>الحالة</th>
                <th>تاريخ الانتهاء</th>
                <th>تاريخ البدء</th>
                <th>خطة الاشتراك</th>
                <th>البريد الإلكتروني</th>
                <th>اسم المستخدم</th>
                <th>رقم الاشتراك</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plans as $subscription)
            <tr>
                <td class="{{ 'status-' . $subscription->status }}">
                    {{ ucfirst($subscription->status) }}
                </td>
                <td>{{ $subscription->end_date }}</td>
                <td>{{ $subscription->start_date }}</td>
                <td>{{ $subscription->subscriptionPlan->name }}</td>
                <td>{{ $subscription->user->email }}</td>
                <td>{{ $subscription->user->name }}</td>
                <td>{{ $subscription->id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

