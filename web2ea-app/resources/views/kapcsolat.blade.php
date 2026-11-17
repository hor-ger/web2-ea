<x-mainpage>
    <x-slot:title>Üzenet küldése</x-slot:title>

    <article>
        <header>
            <h2>Lépj velünk kapcsolatba</h2>
            <p>Küldj nekünk üzenetet az alábbi űrlap kitöltésével.</p>
        </header>

        @if(session('siker'))
            <div>
                {{ session('siker') }}
            </div>
        @endif

        <form method="POST" action="{{ route('uzenet.tarolas') }}">
            @csrf

            <div class="row gtr-50">
                <div class="col-12">
                    <label for="nev">Név</label>
                    <input type="text" name="nev" id="nev" value="{{ old('nev') }}" required />
                    @error('nev')
                        <p">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="targy">Tárgy</label>
                    <input type="text" name="targy" id="targy" value="{{ old('targy') }}" required />
                    @error('targy')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="uzenet">Üzenet</label>
                    <textarea name="uzenet" id="uzenet" rows="5" required>{{ old('uzenet') }}</textarea>
                    @error('uzenet')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" class="button" value="Üzenet elküldése" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </article>
</x-mainpage>