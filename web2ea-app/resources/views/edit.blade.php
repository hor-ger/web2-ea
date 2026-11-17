<x-mainpage>
    <x-slot:title>Ár módosítása - Édes Álom Cukrászda</x-slot:title>

    <article>
        <header>
            <h2>Ár szerkesztése</h2>
            <p>Módosítsd a kiválasztott sütemény árát vagy egységét.</p>
        </header>

        <form method="POST" action="{{ route('arak.update', $ar->id) }}">
            @csrf
            @method('PUT')

            <div class="row gtr-50">
                <div class="col-12">
                    <label for="sutiid">Sütemény</label>
                    <select name="sutiid" id="sutiid" required>
                        @foreach($sutik as $suti)
                            <option value="{{ $suti->id }}" {{ $ar->sutiid == $suti->id ? 'selected' : '' }}>
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
                    <input type="number" name="ertek" id="ertek" value="{{ old('ertek', $ar->ertek) }}" required />
                    @error('ertek')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="egyseg">Egység</label>
                    <input type="text" name="egyseg" id="egyseg" value="{{ old('egyseg', $ar->egyseg) }}" required />
                    @error('egyseg')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" class="button primary" value="Módosítás mentése" /></li>
                        <li><a href="{{ route('crud') }}" class="button">Mégse</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </article>
</x-mainpage>