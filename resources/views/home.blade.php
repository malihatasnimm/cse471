<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar a, .navbar form {
            text-decoration: none;
            color: #636b6f;
        }
        .navbar form {
            display: inline;
        }
        .container {
            margin: 50px auto;
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .card {
            padding: 20px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }
        .card h1 {
            margin: 0 0 10px 0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <a href="/">Laravel</a>
        </div>
        <div>
            <span>Test User</span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="border: none; background: none; color: #636b6f; cursor: pointer;">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <h1>Dashboard</h1>
            <p>You are logged in!</p>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

