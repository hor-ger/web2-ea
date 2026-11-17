<div id="header">
    <h1><a href="/" id="logo">Édes Álom <em>Cukrászda</em></a></h1>

    <nav id="nav">
        <ul>
            <li class="{{ Request::is('/') ? 'current' : '' }}"><a href="/">Főoldal</a></li>
            <li class="{{ Request::is('introduction') ? 'current' : '' }}"><a href="/introduction">Bemutatkozás</a></li>
            <li class="{{ Request::is('kinalat') ? 'current' : '' }}"><a href="/kinalat">Kínálatunk</a></li>
            <li class="{{ Request::is('kapcsolat') ? 'current' : '' }}"><a href="/kapcsolat">Kapcsolat</a></li>
            <li class="{{ Request::is('diagram') ? 'current' : '' }}"><a href="/diagram">Diagram</a></li>

            @if (Auth::check())
                <li class="{{ Request::is('uzenetek') ? 'current' : '' }}"><a href="/uzenetek">Üzenetek</a></li>
                <li class="{{ Request::is('crud*') ? 'current' : '' }}"><a href="/crud">CRUD</a></li>
                <li class="{{ Request::is('user') ? 'current' : '' }}"><a href="/user">Profil</a></li>
                @if (Auth::user()->role === 'ROLE_ADMIN')
                    <li class="{{ Request::is('admin') ? 'current' : '' }}"><a href="/admin">Admin</a></li>
                @endif
                <li>
                    <form method="POST" action="/logout" style="display:inline;">
                        @csrf
                        <button type="submit" style="background:none; border:none; color:inherit; cursor:pointer; font:inherit; padding: 0 1em;">
                            Kilépés
                        </button>
                    </form>
                </li>
            @else
                <li><a href="/login">Belépés</a></li>
                <li><a href="/register">Regisztráció</a></li>
            @endif
        </ul>
    </nav>
</div>