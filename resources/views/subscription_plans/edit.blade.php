<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل خطة اشتراك</title>
    <style>
        /* نفس تنسيق صفحة الإنشاء */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .form-group input[type="number"] {
            -moz-appearance: textfield;
        }

        .form-group button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #2980b9;
        }

        .back-button {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        .back-button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>تعديل خطة اشتراك</h1>
        <form action="{{ route('subscription_plans.update', $subscriptionPlan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">اسم الخطة</label>
                <input type="text" id="name" name="name" value="{{ $subscriptionPlan->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">الوصف</label>
                <textarea id="description" name="description" rows="4" required>{{ $subscriptionPlan->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">السعر</label>
                <input type="number" id="price" name="price" step="0.01" value="{{ $subscriptionPlan->price }}" required>
            </div>
            <div class="form-group">
                <label for="duration">المدة (باليوم)</label>
                <input type="number" id="duration" name="duration" value="{{ $subscriptionPlan->duration }}" required>
            </div>
            <div class="form-group">
                <button type="submit">تحديث</button>
            </div>
            <a href="{{ route('subscription_plans.index') }}" class="back-button">رجوع إلى قائمة الخطط</a>
        </form>
    </div>
</body>
</html>
