<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول</title>
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

        input {
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
        <h1>تسجيل دخول</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">البريد الإلكتروني:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">كلمة المرور:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">تسجيل دخول</button>
        </form>

        <div class="back-btn">
            <a href="{{ route('home') }}">رجوع إلى الصفحة الرئيسية</a>
        </div>
    </div>

</body>
</html>
