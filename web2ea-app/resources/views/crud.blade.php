<x-mainpage>
    <x-slot:title>Árak kezelése - Édes Álom Cukrászda</x-slot:title>

    <article>
        <header>
            <h2>Sütemények árai</h2>
            <p><a href="{{ route('arak.create') }}" class="button primary">Új ár hozzáadása</a></p>
        </header>

        @if(session('siker'))
            <div>
                {{ session('siker') }}
            </div>
        @endif

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Sütemény neve</th>
                        <th>Érték (Ár)</th>
                        <th>Egység</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($arak as $ar)
                        <tr>
                            <td>{{ $ar->suti_nev }}</td>
                            <td>{{ $ar->ertek }} Ft</td>
                            <td>{{ $ar->egyseg }}</td>
                            <td>
                                <a href="{{ route('arak.edit', $ar->id) }}" class="button small">Módosítás</a>
                                <form action="{{ route('arak.destroy', $ar->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button small alt" onclick="return confirm('Biztosan törlöd?')">Törlés</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </article>
</x-mainpage>