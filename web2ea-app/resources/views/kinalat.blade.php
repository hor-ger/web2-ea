<x-mainpage>
    <x-slot:title>Kínálat - Édes Álom Cukrászda</x-slot:title>

    <h2>Kínálatunk</h2>

    <form method="GET" action="{{ route('kinalat') }}" style="margin-bottom: 1.5em;">
        <div class="row gtr-25">
            <div class="col-3 col-6-mobilep">
                <input type="text" name="kereses" value="{{ $kereses ?? '' }}" placeholder="Sütemény nevének keresése..." />
            </div>
            <div class="col-3 col-6-mobilep">
                <ul class="actions">
                    <li><input type="submit" class="button" value="Keresés" /></li>
                    @if(!empty($kereses))
                        <li><a href="{{ route('kinalat') }}" class="button alt">Visszaállítás</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </form>

    @if($kinalat->isNotEmpty())
        <table border="1">
            <thead>
                <tr>
                    <th style="text-align: left;"><h1>Név</h1></th>
                    <th style="text-align: left;"><h1>Típus</h1></th>
                    <th style="text-align: left;"><h1>Mentes</h1></th>
                    <th style="text-align: left;"><h1>Érték</h1></th>
                </tr>
            </thead>
            <tbody>
                @foreach($kinalat as $elem)
                    <tr>
                        <td>{{ $elem->nev }}</td>
                        <td>{{ $elem->tipus }}</td>
                        <td>{{ $elem->mentes ?? '-' }}</td>
                        <td>{{ $elem->ertek ?? '-' }} ft</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nincs a keresésnek megfelelő sütemény.</p>
    @endif
</x-mainpage>