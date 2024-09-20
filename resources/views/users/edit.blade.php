<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل معلومات المستخدم</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            direction: rtl;
        }

        .container {
            max-width: 600px;
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

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        input[type="text"], input[type="email"], select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        button {
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .cancel-btn {
            background-color: #e74c3c;
        }

        .cancel-btn:hover {
            background-color: #c0392b;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>تعديل معلومات المستخدم</h1>
    <form action="{{ route('users.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">اسم المستخدم</label>
            <input type="text" id="name" name="name" value="{{ $users->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" id="email" name="email" value="{{ $users->email }}" required>
        </div>

        <div class="form-group">
            <label for="role">الدور</label>
            <select id="role" name="role_id" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $role->id == $users->role_id ? 'selected' : '' }}>
                        {{ $role->role_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-actions">
            <button type="submit">تحديث</button>
            <a href="{{ route('users.index') }}" class="cancel-btn">إلغاء</a>
        </div>
    </form>
</div>

</body>
</html>
