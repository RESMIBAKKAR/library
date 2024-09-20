<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض خطط الاشتراكات</title>
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
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .actions .btn {
            margin-left: 10px;
        }

        .plans {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .plan-card {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 300px;
            transition: transform 0.2s;
        }

        .plan-card:hover {
            transform: scale(1.05);
        }

        .plan-card h3 {
            color: #3498db;
            margin: 10px 0;
        }

        .btn {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .plan-details {
            margin: 10px 0;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .footer-button {
            text-align: center;
            margin-top: 20px;
        }

        .registration-btn {
            display: block;
            padding: 10px 20px;
            background-color: #e67e22;
            color: white;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            margin: 20px auto;
            width: fit-content;
            transition: background-color 0.3s;
        }

        .registration-btn:hover {
            background-color: #d35400;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="actions">
            @if(auth()->check() && auth()->user()->role && auth()->user()->role->role_name === 'admin')
                <a href="{{ route('subscription_plans.create') }}" class="btn">إضافة خطة اشتراك جديدة</a>
                <a href="{{ route('admin.dashboard') }}" class="btn">الرجوع إلى لوحة التحكم</a>
            @endif
        </div>

        <h1>عرض خطط الاشتراكات</h1>
        <div class="plans">
            @foreach ($plans as $plan)
                <div class="plan-card">
                    <h3>{{ $plan->name }}</h3>
                    <div class="plan-details">
                        <p><strong>الوصف:</strong> {{ $plan->description }}</p>
                        <p><strong>المدة (باليوم):</strong> {{ $plan->duration }}</p>
                        <p><strong>السعر:</strong> {{ $plan->price }} درهم</p>
                    </div>
                    <div class="button-group">
                        @if(auth()->check() && auth()->user()->role && auth()->user()->role->role_name === 'admin')
                            <a href="{{ route('subscription_plans.edit', $plan->id) }}" class="btn">تعديل</a>
                            <form action="{{ route('subscription_plans.destroy', $plan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">حذف</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="footer-button">
            @if(!auth()->check()) <!-- شرط لعرض الزر فقط عند عدم تسجيل الدخول -->
                <a href="{{ route('register') }}" class="registration-btn">سجل الآن للحصول على مميزات إضافية!</a>
                <a href="{{ route('home') }}" class="btn">العودة إلى الصفحة الرئيسية</a>
            @endif
        </div>
    </div>
</body>
</html>

