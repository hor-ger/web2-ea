<x-mainpage>
    <x-slot:title>Főoldal - Édes Álom Cukrászda</x-slot:title>
    <article>
        <header>
            <h2 style="text-align: center;">Üdvözlünk az Édes Álom Cukrászdában!</h2>
            <h1 style="text-align: center;">A hét ajánlatai</h1>
        </header>

        <div class="row gtr-50">
            <!-- 1. kép -->
            <div class="col-4 col-6-narrower col-12-mobilep">
                <a href="/kinalat" class="image fit">
                    <img src="{{ asset('images/gesztenyescucc.jpeg') }}" alt="Gesztenyealagút" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover; border-radius: 6px;" />
                </a>
                <h3 style="text-align: center; margin-top: 0.75em;">Gesztenyealagút</h3>
            </div>

            <!-- 2. kép -->
            <div class="col-4 col-6-narrower col-12-mobilep">
                <a href="/kinalat" class="image fit">
                    <img src="{{ asset('images/eszterhazy.jpg') }}" alt="Eszterházy torta" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover; border-radius: 6px;" />
                </a>
                <h3 style="text-align: center; margin-top: 0.75em;">Eszterházy torta</h3>
            </div>

            <!-- 3. kép -->
            <div class="col-4 col-6-narrower col-12-mobilep">
                <a href="/kinalat" class="image fit">
                    <img src="{{ asset('images/sajttorta.webp') }}" alt="Sajttorta" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover; border-radius: 6px;" />
                </a>
                <h3 style="text-align: center; margin-top: 0.75em;">Sajttorták</h3>
            </div>

            <!-- 4. kép -->
            <div class="col-4 col-6-narrower col-12-mobilep">
                <a href="/kinalat" class="image fit">
                    <img src="{{ asset('images/bejglik.jpg') }}" alt="Diós-Mákos bejgli" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover; border-radius: 6px;" />
                </a>
                <h3 style="text-align: center; margin-top: 0.75em;">Diós-Mákos bejgli</h3>
            </div>

            <!-- 5. kép -->
            <div class="col-4 col-6-narrower col-12-mobilep">
                <a href="/kinalat" class="image fit">
                    <img src="{{ asset('images/pite.jpg') }}" alt="Habos-Mákos pite" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover; border-radius: 6px;" />
                </a>
                <h3 style="text-align: center; margin-top: 0.75em;">Habos-Mákos pite</h3>
            </div>

            <!-- 6. kép -->
            <div class="col-4 col-6-narrower col-12-mobilep">
                <a href="/kinalat" class="image fit">
                    <img src="{{ asset('images/mignon.jpg') }}" alt="Mignon" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover; border-radius: 6px;" />
                </a>
                <h3 style="text-align: center; margin-top: 0.75em;">Mignon</h3>
            </div>
        </div>
    </article>
</x-mainpage>