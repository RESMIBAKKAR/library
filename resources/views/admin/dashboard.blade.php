<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            direction: rtl;
        }

        .dashboard-container {
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
            position: fixed;
            top: 0;
            right: 0;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            padding: 10px 20px;
            margin-bottom: 10px;
            color: white;
            text-decoration: none;
            background-color: #34495e;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }

        .sidebar a:hover {
            background-color: #2980b9;
        }

        .content {
            margin-right: 250px;
            padding: 20px;
            box-sizing: border-box;
            width: 100%;
        }

        .content h1 {
            color: #2c3e50;
        }

        /* استجابة للهواتف */
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content {
                margin-right: 0;
            }
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <!-- الشريط الجانبي -->
    <div class="sidebar">
        <h2>لوحة التحكم</h2>
        @if(Auth::check() && (Auth::user()->role->role_name === 'admin' || Auth::user()->role->role_name === 'publisher'))
            <a href="{{ route('books.index') }}">عرض الكتب</a>
            <a href="{{ route('writers.index') }}">عرض الكاتبين</a>
            <a href="{{ route('categories.index') }}">عرض الانواع</a>
        @endif
        @if(Auth::check() && (Auth::user()->role->role_name === 'admin'))
            <a href="{{ route('users.index') }}">عرض المستخدمين</a>
            <a href="{{ route('roles.index') }}">عرض الصلاحيات</a>
            <a href="{{ route('subscription_plans.index') }}">عرض خطط الاشتراك</a>
            <a href="{{ route('user_subscription_plans.index') }}">عرض الاشتراكات</a>

        @endif
        <a href="{{ route('home')  }}" class="back-button">الرجوع للصفحة الرئيسية</a>
    </div>

    <!-- محتوى الصفحة -->
    <div class="content">
        <h1>مرحبًا بك في لوحة التحكم</h1>
        <p>اختر عنصرًا من القائمة الجانبية لعرض محتوى مختلف.</p>
    </div>
</div>

</body>
</html>
