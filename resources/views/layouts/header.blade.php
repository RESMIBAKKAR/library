<header>
    <div class="top-bar">
        <!-- عرض الروابط بناءً على حالة تسجيل الدخول -->
        @guest
            <a href="{{ route('login') }}" class="btn login-register">تسجيل الدخول</a>
            <a href="{{ route('subscription_plans.index') }}" class="btn login-register">تسجيل</a>
        @else
            <a href="{{ route('profile') }}" class="btn">الملف الشخصي</a>

            @php
                $userRole = Auth::user()->role->role_name ?? null;
            @endphp

            <!-- عرض الروابط بناءً على دور المستخدم -->
            @if (Auth::check() && (Auth::user()->role->role_name === 'admin' || (Auth::user()->role->role_name === 'publisher')))

                <div class="nav-items">
                    <a href="{{ route('admin.dashboard') }}" class="btn">لوحة التحكم</a>
                </div>
            @endif

            <a href="{{ route('logout') }}" class="btn logout-btn"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            تسجيل الخروج
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        @endguest
    </div>

    <nav class="main-nav">
        @if (!Request::is('/'))
            <a href="{{ route('home') }}" class="btn">الصفحة الرئيسية</a>
        @endif
    </nav>

    <style>
        /* تنسيق الهيدر */
        header {
            background-color: #2c3e50;
            padding: 10px 15px;
            color: white;
            text-align: right;
        }

        .top-bar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .main-nav {
            display: flex;
            justify-content: center; /* وسط الهيدر */
            gap: 10px;
        }

        .nav-items {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .login-register {
            background-color: #3498db;
            color: white;
        }

        .login-register:hover {
            background-color: #2980b9;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: white;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .btn:not(.login-register):not(.logout-btn) {
            background-color: transparent;
            color: white;
            border: 1px solid #ffffff;
        }

        .btn:not(.login-register):not(.logout-btn):hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* استجابة للهواتف */
        @media (max-width: 768px) {
            .top-bar, .main-nav {
                flex-direction: column;
                align-items: flex-end;
            }
        }
    </style>
</header>
