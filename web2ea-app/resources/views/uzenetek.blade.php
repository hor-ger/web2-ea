<x-mainpage>
    <x-slot:title>Beérkezett üzenetek - Édes Álom Cukrászda</x-slot:title>

    <article>
        <header>
            <h2>Beérkezett üzenetek</h2>
            <p>Itt láthatóak az elküldött üzenetek</p>
        </header>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Név</th>
                        <th>Tárgy</th>
                        <th>Üzenet</th>
                        <th>Küldés ideje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($uzenetek as $uzenet)
                        <tr>
                            <td>{{ $uzenet->id }}</td>
                            <td>{{ $uzenet->nev }}</td>
                            <td>{{ $uzenet->targy }}</td>
                            <td>{{ $uzenet->uzenet }}</td>
                            <td>{{ $uzenet->ido }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center;">Még nincsenek üzenetek.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </article>
</x-mainpage>