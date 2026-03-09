<header>
    <nav class="navbar">
        <div class="navbar-brand">
            <a href="{{ route('login') }}">Troca de Habilidades</a>
        </div>
        <ul class="navbar-links">
            @auth
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('users.index') }}">Usuários</a></li>
                <li><a href="{{ route('skills.index') }}">Habilidades</a></li>
                <li><a href="{{ route('users.profile') }}">Meu Perfil</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-logout">Sair</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('cadastro') }}">Cadastro</a></li>
            @endauth
        </ul>
    </nav>

    <style>
        header {
            background-color: #2d89ef;
            padding: 10px 20px;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-brand a {
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
        }
        .navbar-links {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 15px;
        }
        .navbar-links li {
            display: flex;
            align-items: center;
        }
        .navbar-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            padding: 5px 10px;
            transition: background 0.3s, border-radius 0.3s;
        }
        .navbar-links a:hover {
            background-color: rgba(255,255,255,0.2);
            border-radius: 5px;
        }
        .btn-logout {
            background: none;
            border: none;
            color: #fff;
            font-weight: 500;
            cursor: pointer;
            padding: 5px 10px;
        }
        .btn-logout:hover {
            background-color: rgba(255,255,255,0.2);
            border-radius: 5px;
        }
    </style>
</header>