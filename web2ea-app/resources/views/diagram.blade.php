<x-mainpage>
    <x-slot:title>Sütemények megoszlása</x-slot:title>

    <article>
        <header>
            <h2>Sütemények típus szerinti megoszlása</h2>
            <p>Statisztika a cukrászda süteményeiről kategóriák szerint.</p>
        </header>

        <div style="width: 70%; margin: 2rem auto;">
            <canvas id="sutiChart"></canvas>
        </div>
    </article>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labels = @json($labels);
        const data = @json($data);

        const ctx = document.getElementById('sutiChart').getContext('2d');
        
        const sutiChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Sütemények száma darab szerint',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
</x-mainpage>