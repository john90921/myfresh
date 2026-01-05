
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Fruit Supplier') }}</title>

    <!-- Bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .navbar-default {
            margin-bottom: 0;
            border-radius: 0;
        }

        .carousel-inner>.item>img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        /* About Section */
        .about-section {
            background-color: #f9f9f9;
            padding: 60px 20px;
        }

        .about-title {
            font-size: 34px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .about-divider {
            width: 70px;
            border-top: 4px solid #5cb85c;
            margin: 0 auto 30px;
        }

        .about-text {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
        }

        .about-highlight {
            color: #5cb85c;
            font-weight: 600;
        }

        /* Footer */
        .footer {
            background-color: #222;
            color: #ccc;
            padding: 30px 0;
        }

        .footer h4 {
            color: #fff;
        }

        .footer p {
            margin: 0;
        }

        /* Alert Messages */
        .alert-container {
            position: fixed;
            top: 70px;
            right: 20px;
            z-index: 9999;
            min-width: 320px;
            max-width: 500px;
        }

        .alert-message {
            padding: 16px 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: space-between;
            animation: slideInRight 0.4s ease-out;
            position: relative;
            overflow: hidden;
        }

        .alert-message::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .alert-success::before {
            background-color: #28a745;
        }

        .alert-error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .alert-error::before {
            background-color: #dc3545;
        }

        .alert-content {
            display: flex;
            align-items: center;
            flex: 1;
            gap: 12px;
        }

        .alert-icon {
            font-size: 24px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .alert-text {
            flex: 1;
            font-size: 14px;
            line-height: 1.5;
            font-weight: 500;
        }

        .alert-close {
            background: none;
            border: none;
            font-size: 20px;
            line-height: 1;
            color: inherit;
            opacity: 0.6;
            cursor: pointer;
            padding: 0;
            margin-left: 12px;
            transition: opacity 0.2s;
            flex-shrink: 0;
        }

        .alert-close:hover {
            opacity: 1;
        }

        .alert-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background-color: rgba(0, 0, 0, 0.2);
            animation: progressBar 5s linear forwards;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }

        @keyframes progressBar {
            from {
                width: 100%;
            }
            to {
                width: 0%;
            }
        }

        .alert-fade-out {
            animation: slideOutRight 0.4s ease-out forwards;
        }

        @media (max-width: 768px) {
            .alert-container {
                right: 10px;
                left: 10px;
                min-width: auto;
            }
        }
    </style>
</head>

<body>
    @include('layouts.navigation')



    <!-- Alert Messages Container -->
    <div class="alert-container">
         @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
        @if (session('success'))
            <div class="alert-message alert-success" role="alert" data-auto-dismiss="true">
                <div class="alert-content">
                    <span class="alert-icon">✓</span>
                    <span class="alert-text">{{ session('success') }}</span>
                </div>
                <button type="button" class="alert-close" onclick="dismissAlert(this)">×</button>
                <div class="alert-progress"></div>
            </div>
        @endif

        @if (session('error'))
            <div class="alert-message alert-error" role="alert" data-auto-dismiss="true">
                <div class="alert-content">
                    <span class="alert-icon">⚠</span>
                    <span class="alert-text">{{ session('error') }}</span>
                </div>
                <button type="button" class="alert-close" onclick="dismissAlert(this)">×</button>
                <div class="alert-progress"></div>
            </div>
        @endif
    </div>

    <main>
        {{ $slot }}
    </main>



    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <h4>Fruit Kluang</h4>
            <p>Fresh Fruits • Fair Prices • Trusted Quality</p>
            <p>© {{ date('Y') }} Fruit Kluang. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // Auto-dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('[data-auto-dismiss="true"]');

            alerts.forEach(alert => {
                setTimeout(() => {
                    dismissAlert(alert.querySelector('.alert-close'));
                }, 5000);
            });
        });

        function dismissAlert(button) {
            const alert = button.closest('.alert-message');
            alert.classList.add('alert-fade-out');

            setTimeout(() => {
                alert.remove();
            }, 400);
        }
    </script>

</body>

</html>
