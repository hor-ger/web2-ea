<x-mainpage>
    <x-slot:title>Regisztráció - Édes Álom Cukrászda</x-slot:title>

    <article>
        <header>
            <h2>Regisztráció</h2>
            <p>Hozz létre új felhasználói fiókot.</p>
        </header>

        <form method="POST" action="/register">
            @csrf
            <div class="row gtr-50">
                <div class="col-12">
                    <label for="name">Név</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus />
                    @error('name')
                        <p style="color: #c0392b; margin-top: 0.5em;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="email">E-mail cím</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required />
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

                <div class="col-6 col-12-mobilep">
                    <label for="password_confirmation">Jelszó megerősítése</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required />
                </div>

                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" class="button" value="Regisztráció" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </article>
</x-mainpage>