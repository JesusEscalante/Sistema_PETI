@extends('layouts.default')
@section('content')

<!-- content -->
<div class="container-fluid">

    <div class="row">

        <div class="col-lg-6 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">MATRIZ PARTICIPACION</h5></div>
                    </div>
                </div>

                <div class="card-body">

                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">MATRIZ PEST</h5></div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="teble-responsive">
                        <canvas id="globalPestChart"></canvas>

                        <script>
                            // 5. Gráfico de barras VERTICAL comparativo (promedio por cada dimensión PEST)
                            const ctxGlobal = document.getElementById('globalPestChart').getContext('2d');
                            new Chart(ctxGlobal, {
                                type: 'bar',
                                data: {
                                labels: ['SOCIALES Y DEMOGRÁFICOS', 'POLÍTICOS', 'ECONÓMICOS', 'TECNOLÓGICOS', 'MEDIO AMBIENTAL'],
                                datasets: [{
                                    label: 'Tipología de factores generales externos',
                                    data: [<?= $Impacto1 ?>, <?= $Impacto2 ?>, <?= $Impacto3 ?>, <?= $Impacto4 ?>, <?= $Impacto5 ?>],
                                    backgroundColor: ['#3d6cb0', '#2d8f6e', '#c06d2e', '#3c7a8c', '#d0dc1e'],
                                    borderRadius: 10,
                                    barPercentage: 0.65,
                                    categoryPercentage: 0.8
                                }]
                                },
                                options: {
                                responsive: true,
                                maintainAspectRatio: true,
                                plugins: {
                                    legend: { position: 'top', labels: { font: { size: 10 } } },
                                    tooltip: { callbacks: { label: (ctx) => `Impacto: ${ctx.raw} pts` } }
                                },
                                scales: {
                                    y: { 
                                    beginAtZero: true, 
                                    max: 100,
                                    title: { display: true, text: 'Nivel de impacto de factores generales externos', font: { size: 10 } },
                                    grid: { color: '#cfdfe5' }
                                    },
                                    x: { ticks: { font: { weight: 'bold', size: 11 } } }
                                }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

@stop