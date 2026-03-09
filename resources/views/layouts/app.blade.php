<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Troca de Habilidades</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Reset simples */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f2f2f2;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        header {
            background-color: #007BFF;
            padding: 15px 20px;
            color: white;
        }

        header nav a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
            font-weight: bold;
            transition: color 0.3s;
        }

        header nav a:hover {
            color: #d0e7ff;
        }

        /* Main content centralizado */
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 30px 20px;
        }

        /* Footer */
        footer {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        /* Container padrão para páginas internas */
        .container {
            width: 100%;
            max-width: 1200px;
        }

        /* Responsividade simples */
        @media (max-width: 600px) {
            header nav a {
                display: block;
                margin: 8px 0;
            }
            main {
                padding: 20px 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="{{ route('login') }}">Login</a>
                @auth
                    <a href="{{ route('dashboard') }}">Menu</a>
                    <form style="display:inline;" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" style="background:none; border:none; color:white; cursor:pointer; font-weight:bold;">Logout</button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        &copy; {{ date('Y') }} Troca de Habilidades
    </footer>
</body>
</html>