<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل مستخدم جديد</title>
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
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            color: #34495e;
        }

        input, select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
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

        .back-btn {
            margin-top: 20px;
            text-align: center;
        }

        .back-btn a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>تسجيل مستخدم جديد</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="name">اسم المستخدم:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">البريد الإلكتروني:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">كلمة المرور:</label>
            <input type="password" name="password" id="password" required>

            <label for="password_confirmation">تأكيد كلمة المرور:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
            <label for="subscription_plan_id">اختر خطة الاشتراك:</label>
            <select name="subscription_plan_id" id="subscription_plan_id" required>
                <!-- الخيار الافتراضي الفارغ -->
                <option value="" disabled selected>اختر خطة...</option>

                <!-- عرض خطط الاشتراك المتاحة -->
                @foreach ($subscriptionPlans as $plan)
                    <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                @endforeach
            </select>




            <button type="submit">تسجيل</button>
        </form>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="back-btn">
            <a href="{{ route('home') }}">رجوع إلى الصفحة الرئيسية</a>
        </div>
    </div>

</body>
</html>
