<x-mainpage>
    <x-slot:title>Új ár felvétele - Édes Álom Cukrászda</x-slot:title>

    <article>
        <header>
            <h2>Új ár hozzáadása</h2>
            <p>Válassz ki egy süteményt, majd add meg az árat és egységet.</p>
        </header>

        <form method="POST" action="{{ route('arak.store') }}">
            @csrf
            <div class="row gtr-50">
                <div class="col-12">
                    <label for="sutiid">Sütemény kiválasztása</label>
                    <select name="sutiid" id="sutiid" required>
                        <option value="">-- Válassz süteményt --</option>
                        @foreach($sutik as $suti)
                            <option value="{{ $suti->id }}" {{ old('sutiid') == $suti->id ? 'selected' : '' }}>
                                {{ $suti->nev }} ({{ $suti->tipus }})
                            </option>
                        @endforeach
                    </select>
                    @error('sutiid')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="ertek">Érték (Ft)</label>
                    <input type="number" name="ertek" id="ertek" value="{{ old('ertek') }}" required />
                    @error('ertek')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="egyseg">Egység (pl. szelet, kg, db)</label>
                    <input type="text" name="egyseg" id="egyseg" value="{{ old('egyseg') }}" required />
                    @error('egyseg')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" class="button primary" value="Mentés" /></li>
                        <li><a href="{{ route('crud') }}" class="button">Mégse</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </article>
</x-mainpage>