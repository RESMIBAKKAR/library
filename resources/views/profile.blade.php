<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الملف الشخصي</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
            direction: rtl; /* تعيين اتجاه النص من اليمين لليسار */
        }
        .profile-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        p {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }
        .back-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="profile-container">
        <h1>الملف الشخصي</h1>
        <p><strong>الاسم:</strong> {{ $user->name }}</p>
        <p><strong>البريد الإلكتروني:</strong> {{ $user->email }}</p>
        <p><strong>نوع الصلاحية:</strong> {{ $user->role->role_name }}</p>

        @if ($user->subscription)
            <p><strong>اسم خطة الاشتراك:</strong> {{ $user->subscription()->subscriptionPlan()->name }}</p>
            <p><strong>تاريخ البدء:</strong> {{ $user->subscription->start_date->format('Y-m-d') }}</p>
            <p><strong>تاريخ الانتهاء:</strong> {{ $user->subscription->end_date->format('Y-m-d') }}</p>
        @else
            <p>لا يوجد اشتراك مفعل حالياً.</p>
        @endif

        <a href="{{ route('home') }}" class="back-button">العودة للصفحة الرئيسية</a>
    </div>

</body>
</html>
