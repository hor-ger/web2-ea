<x-mainpage>
    <x-slot:title>Belépés - Édes Álom Cukrászda</x-slot:title>

    <article>
        <header>
            <h2>Bejelentkezés</h2>
            <p>Lépj be a fiókodba.</p>
        </header>

        <form method="POST" action="/login">
            @csrf
            <div class="row gtr-50">
                <div class="col-6 col-12-mobilep">
                    <label for="email">E-mail cím</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus />
                    @error('email')
                        <p style="color: #c0392b; margin-top: 0.5em;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-6 col-12-mobilep">
                    <label for="password">Jelszó</label>
                    <input type="password" name="password" id="password" required />
                    @error('password')
                        <p style="color: #c0392b; margin-top: 0.5em;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" class="button" value="Belépés" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </article>
</x-mainpage>