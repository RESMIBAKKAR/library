<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مكتبة الكتب</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            background-image: url('https://www.example.com/background-image.jpg'); /* يمكنك إضافة رابط صورة للخلفية */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            position: relative;
            padding-bottom: 60px; /* لتجنب تغطية الفوتر */
        }

        header {
            background-color: #2c3e50;
            padding: 15px;
            color: white;
            text-align: center;
            position: relative;
        }

        .container {
            margin-top: 80px;
            text-align: center;
        }

        .info-box {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .info-box h1 {
            margin-top: 0;
            color: #2c3e50;
        }

        .info-box p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }

        .info-box .btn {
            display: inline-block;
            background-color: #f1c40f !important; /* لون الزر الأصفر مع التأكيد */
            color: white !important; /* لون النص الأبيض مع التأكيد */
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 50px;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }

        .info-box .btn:hover {
            background-color: #f39c12 !important; /* لون أغمق قليلاً عند التمرير */
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <!-- تضمين الهيدر -->
    @include('layouts.header')

    <div class="container">
        <!-- مربع الشرح -->
        <div class="info-box">
            <h1>مرحبا بك في مكتبة الكتب</h1>
            <p>تقدم مكتبتنا مجموعة متنوعة من الكتب في شتى المجالات. استمتع بتصفح مكتبتنا واكتشاف كتب جديدة.</p>
            <a href="{{ route('books.index') }}" class="btn">ألقِ نظرة</a> <!-- الزر الأصفر المعدل -->
        </div>
    </div>

    <!-- تضمين الفوتر -->
    @include('layouts.footer')
</body>
</html>
