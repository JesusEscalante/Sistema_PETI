@extends('layouts.default')
@section('content')

<!-- content -->
<div class="container-fluid">

    <div class="row">

        <div class="col-lg-8 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="align-items-center">
                        <h5 class="font-weight-bold text-primary m-0">
                            <i class="fa fa-chalkboard-teacher mr-2"></i>MATRIZ BCG - PARTICIPACIÓN Y CRECIMIENTO
                        </h5>
                    </div>
                </div>

                <div class="card-body">
                    @php
                        // Determinar si todos los PRM son menores a 1
                        $todosPRMMenores1 = true;
                        foreach($Productos as $Item) {
                            if($Item->PRM >= 1) {
                                $todosPRMMenores1 = false;
                                break;
                            }
                        }
                        
                        // Definir qué métrica usar para participación
                        $metricaParticipacion = $todosPRMMenores1 ? 'Porcentaje' : 'PRM';
                        $umbralParticipacion = $todosPRMMenores1 ? $PromPorcentaje : $PromPRM;
                        $nombreMetrica = $todosPRMMenores1 ? 'Cuota de Mercado (%)' : 'Participación Relativa de Mercado (PRM)';
                    @endphp

                     <div class="alert alert-info mb-3">
                        <i class="fa fa-info-circle"></i> 
                        <strong>Métrica utilizada:</strong> {{ $nombreMetrica }} | 
                        <strong>Umbral:</strong> {{ number_format($umbralParticipacion, 2) }}
                        @if($todosPRMMenores1)
                            <br><small class="text-muted">* Se utiliza Cuota de Mercado porque todos los valores PRM son menores a 1</small>
                        @endif
                    </div>
                    
                    <div class="matrix-grid">
                        
                        <!-- CUADRANTE INTERROGANTE (Alto crecimiento, baja participación) -->
                        <div class="quadrant border-bottom">
                            <h4 class="text-primary">
                                <i class="fa fa-question-circle mr-1"></i> INTERROGANTE 
                                <small class="text-muted">(Alto Crecimiento / Baja Participación)</small>
                            </h4>
                            <div class="mt-3">
                                @php $interrogantes = 0; @endphp
                                @foreach($Productos as $Item)
                                    @php
                                        $participacion = $todosPRMMenores1 ? $Item->Porcentaje : $Item->PRM;
                                        $cumpleCondicion = ($participacion < $umbralParticipacion && $Item->TCM >= $PromTCM);
                                    @endphp
                                    @if($cumpleCondicion)
                                        @php $interrogantes++; @endphp
                                        <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded mb-2">
                                            <div><strong>{{ $Item->Nombre }}</strong></div>
                                            <div class="d-flex flex-wrap">
                                                <span class="badge badge-info mr-1">TCM: {{ number_format($Item->TCM, 2) }}%</span>
                                                <span class="badge badge-success mr-1">
                                                    {{ $todosPRMMenores1 ? 'Cuota:' : 'PRM:' }} 
                                                    {{ number_format($participacion, 2) }}
                                                    @if($todosPRMMenores1)%@endif
                                                </span>
                                                @if(!$todosPRMMenores1)
                                                    <span class="badge badge-secondary">Cuota: {{ number_format($Item->Porcentaje, 2) }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                
                                @if($interrogantes == 0)
                                    <div class="alert alert-info text-center py-3">
                                        <i class="fa fa-info-circle"></i> No hay productos en este cuadrante
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- CUADRANTE ESTRELLAS (Alto crecimiento, alta participación) -->
                        <div class="quadrant border-right border-bottom">
                            <h4 class="text-warning">
                                <i class="fa fa-star mr-1"></i> ESTRELLAS 
                                <small class="text-muted">(Alto Crecimiento / Alta Participación)</small>
                            </h4>
                            <div class="mt-3">
                                @php $estrellas = 0; @endphp
                                @foreach($Productos as $Item)
                                    @php
                                        $participacion = $todosPRMMenores1 ? $Item->Porcentaje : $Item->PRM;
                                        $cumpleCondicion = ($participacion >= $umbralParticipacion && $Item->TCM >= $PromTCM);
                                    @endphp
                                    @if($cumpleCondicion)
                                        @php $estrellas++; @endphp
                                        <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded mb-2">
                                            <div><strong>{{ $Item->Nombre }}</strong></div>
                                            <div class="d-flex flex-wrap">
                                                <span class="badge badge-info mr-1">TCM: {{ number_format($Item->TCM, 2) }}%</span>
                                                <span class="badge badge-success mr-1">
                                                    {{ $todosPRMMenores1 ? 'Cuota:' : 'PRM:' }} 
                                                    {{ number_format($participacion, 2) }}
                                                    @if($todosPRMMenores1)%@endif
                                                </span>
                                                @if(!$todosPRMMenores1)
                                                    <span class="badge badge-secondary">Cuota: {{ number_format($Item->Porcentaje, 2) }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                
                                @if($estrellas == 0)
                                    <div class="alert alert-warning text-center py-3">
                                        <i class="fa fa-info-circle"></i> No hay productos en este cuadrante
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- CUADRANTE PERROS (Bajo crecimiento, baja participación) -->
                        <div class="quadrant">
                            <h4 class="text-secondary">
                                <i class="fas fa-dog mr-1"></i> PERROS 
                                <small class="text-muted">(Bajo Crecimiento / Baja Participación)</small>
                            </h4>
                            <div class="mt-3">
                                @php $perros = 0; @endphp
                                @foreach($Productos as $Item)
                                    @php
                                        $participacion = $todosPRMMenores1 ? $Item->Porcentaje : $Item->PRM;
                                        $cumpleCondicion = ($participacion < $umbralParticipacion && $Item->TCM < $PromTCM);
                                    @endphp
                                    @if($cumpleCondicion)
                                        @php $perros++; @endphp
                                        <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded mb-2">
                                            <div><strong>{{ $Item->Nombre }}</strong></div>
                                            <div class="d-flex flex-wrap">
                                                <span class="badge badge-info mr-1">TCM: {{ number_format($Item->TCM, 2) }}%</span>
                                                <span class="badge badge-success mr-1">
                                                    {{ $todosPRMMenores1 ? 'Cuota:' : 'PRM:' }} 
                                                    {{ number_format($participacion, 2) }}
                                                    @if($todosPRMMenores1)%@endif
                                                </span>
                                                @if(!$todosPRMMenores1)
                                                    <span class="badge badge-secondary">Cuota: {{ number_format($Item->Porcentaje, 2) }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                
                                @if($perros == 0)
                                    <div class="alert alert-secondary text-center py-3">
                                        <i class="fa fa-info-circle"></i> No hay productos en este cuadrante
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- CUADRANTE VACAS LECHERAS (Bajo crecimiento, alta participación) -->
                        <div class="quadrant border-right">
                            <h4 class="text-success">
                                <i class="fa fa-coffee mr-1"></i> VACAS LECHERAS 
                                <small class="text-muted">(Bajo Crecimiento / Alta Participación)</small>
                            </h4>
                            <div class="mt-3">
                                @php $vacas = 0; @endphp
                                @foreach($Productos as $Item)
                                    @php
                                        $participacion = $todosPRMMenores1 ? $Item->Porcentaje : $Item->PRM;
                                        $cumpleCondicion = ($participacion >= $umbralParticipacion && $Item->TCM < $PromTCM);
                                    @endphp
                                    @if($cumpleCondicion)
                                        @php $vacas++; @endphp
                                        <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded mb-2">
                                            <div><strong>{{ $Item->Nombre }}</strong></div>
                                            <div class="d-flex flex-wrap">
                                                <span class="badge badge-info mr-1">TCM: {{ number_format($Item->TCM, 2) }}%</span>
                                                <span class="badge badge-success mr-1">
                                                    {{ $todosPRMMenores1 ? 'Cuota:' : 'PRM:' }} 
                                                    {{ number_format($participacion, 2) }}
                                                    @if($todosPRMMenores1)%@endif
                                                </span>
                                                @if(!$todosPRMMenores1)
                                                    <span class="badge badge-secondary">Cuota: {{ number_format($Item->Porcentaje, 2) }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                
                                @if($vacas == 0)
                                    <div class="alert alert-success text-center py-3">
                                        <i class="fa fa-info-circle"></i> No hay productos en este cuadrante
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h5 class="font-weight-bold text-primary m-0"><i class="fas fa-lightbulb text-warning mr-2"></i> Claves estratégicas</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-3">
                        <div><strong class="d-block"><i class="fa fa-star mr-2 text-warning"></i> Estrellas</strong><small class="text-muted">Alto crecimiento y alta participación. Mantener inversión, son el futuro de la empresa.</small></div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                        <div><strong class="d-block"><i class="fa fa-question mr-2 text-primary"></i> Interrogación</strong><small class="text-muted">Alto crecimiento pero baja participación. Invertir selectivamente para convertirlos en Estrellas.</small></div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                        <div><strong class="d-block"><i class="fa fa-coffee mr-2 text-success"></i> Vacas lecheras</strong><small class="text-muted">Bajo crecimiento pero alta participación. Generan efectivo para financiar otros productos.</small></div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                        <div><strong class="d-block"><i class="fas fa-dog mr-2 text-secondary"></i> Perros</strong><small class="text-muted">Baja participación y crecimiento. Considerar desinversión o eliminación.</small></div>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-3">
                        <p class="small text-secondary"><i class="fas fa-chart-line mr-1"></i> <strong>Indicadores clave:</strong></p>
                        <ul class="small text-muted pl-3">
                            <li><i class="fas fa-percent"></i> TCM: Tasa de Crecimiento del Mercado</li>
                            <li><i class="fas fa-chart-simple"></i> PRM: Participación Relativa vs competidor principal</li>
                            <li><i class="fas fa-circle-info"></i> Datos basados en ventas y estructura competitiva</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="align-items-center">
                        <h5 class="font-weight-bold text-primary m-0">Gráfico de Burbujas · Área proporcional a ventas</h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="teble-responsive">
                        <canvas id="bubbleChart" height="200"></canvas>

                        <script>
                            var productos = [];
                            var ventas = [];
                            var pctVentas = [];
                            var tcm = [];
                            var prm = [];

                            <?php foreach($Productos as $Item){ ?>
                                productos.push(<?= json_encode($Item->Nombre) ?>);
                                ventas.push(<?= json_encode($Item->Ventas) ?>);
                                pctVentas.push(<?= json_encode($Item->Porcentaje) ?>);
                                tcm.push(<?= json_encode($Item->TCM) ?>);
                                prm.push(<?= json_encode($Item->PRM) ?>);
                            <?php } ?>

                            const ALTO_CRECIMIENTO = <?= $PromTCM ?>;
                            const ALTA_PRM = <?= $PromPRM ?>;
                            const ALTA_CUOTA = <?= $PromPorcentaje ?>;

                            // Validar datos
                            if (productos.length === 0) {
                                console.error('No hay productos para mostrar');
                                document.getElementById('bubbleChart').style.display = 'none';
                                document.write('<p>No hay datos disponibles</p>');
                            } else {
                                // Gráfico de burbujas
                                const ctx = document.getElementById('bubbleChart').getContext('2d');
                                
                                const maxVenta = Math.max(...ventas);
                                const getRadius = (v) => {
                                    const minR = 8;
                                    const maxR = 26;
                                    const ratio = v / maxVenta;
                                    return minR + ratio * (maxR - minR);
                                };
                                const radii = ventas.map(v => getRadius(v));
                                
                                const todosPRMMenores1 = prm.every(valor => valor < 1);
                                const tituloEjeX = todosPRMMenores1 
                                    ? 'Participación de Mercado (%)' 
                                    : 'Participación Relativa de Mercado (PRM)';
                                
                                let bubbleData;
                                if(todosPRMMenores1) {
                                    bubbleData = {
                                        datasets: [{
                                            label: 'Productos',
                                            data: productos.map((_, idx) => ({
                                                x: pctVentas[idx],
                                                y: tcm[idx],
                                                r: radii[idx]
                                            })),
                                            backgroundColor: '#3b82f6',
                                            borderColor: '#ffffff',
                                            borderWidth: 2,
                                            hoverBorderWidth: 2.5,
                                            hoverBorderColor: '#1e2b3c'
                                        }]
                                    };
                                } else {
                                    bubbleData = {
                                        datasets: [{
                                            label: 'Productos',
                                            data: productos.map((_, idx) => ({
                                                x: prm[idx],
                                                y: tcm[idx],
                                                r: radii[idx]
                                            })),
                                            backgroundColor: '#3b82f6',
                                            borderColor: '#ffffff',
                                            borderWidth: 2,
                                            hoverBorderWidth: 2.5,
                                            hoverBorderColor: '#1e2b3c'
                                        }]
                                    };
                                }
                                
                                const options = {
                                    responsive: true,
                                    maintainAspectRatio: true,
                                    plugins: {
                                        tooltip: {
                                            callbacks: {
                                                label: (context) => {
                                                    const idx = context.dataIndex;
                                                    if (idx === undefined) return '';
                                                    return [
                                                        `${productos[idx]}`,
                                                        `PRM: ${prm[idx].toFixed(2)}`,
                                                        `TCM: ${tcm[idx].toFixed(2)}%`,
                                                        `Ventas: ${ventas[idx]}`,
                                                        `Cuota: ${pctVentas[idx]}%`
                                                    ];
                                                }
                                            },
                                            backgroundColor: '#0f172ad9',
                                            titleColor: '#f1f5f9'
                                        },
                                        legend: { display: false }
                                    },
                                    scales: {
                                        x: {
                                            title: { display: true, text: tituloEjeX, font: { size: 11, weight: 'bold' } },
                                            ticks: { stepSize: 0.02, callback: (val) => val.toFixed(2) },
                                            grid: { color: '#e2edf2' }
                                        },
                                        y: {
                                            title: { display: true, text: 'Tasa de Crecimiento del Mercado (%)', font: { size: 11, weight: 'bold' } },
                                            ticks: { stepSize: 1, callback: (val) => val + '%' },
                                            grid: { color: '#e2edf2' }
                                        }
                                    },
                                    layout: { padding: { top: 25, bottom: 15, left: 10, right: 15 } }
                                };
                                
                                const bubbleChart = new Chart(ctx, {
                                    type: 'bubble',
                                    data: bubbleData,
                                    options: options
                                });
                                
                                // Líneas de referencia
                                const originalDraw = bubbleChart.draw;
                                bubbleChart.draw = function() {
                                    originalDraw.apply(this, arguments);
                                    const ctxCanvas = this.ctx;
                                    const yScale = this.scales.y;
                                    const xScale = this.scales.x;
                                    if (yScale && this.chartArea) {
                                        const yPos = yScale.getPixelForValue(ALTO_CRECIMIENTO);
                                        ctxCanvas.save();
                                        ctxCanvas.beginPath();
                                        ctxCanvas.moveTo(this.chartArea.left, yPos);
                                        ctxCanvas.lineTo(this.chartArea.right, yPos);
                                        ctxCanvas.strokeStyle = '#f97316';
                                        ctxCanvas.lineWidth = 2;
                                        ctxCanvas.setLineDash([8, 6]);
                                        ctxCanvas.stroke();
                                        ctxCanvas.setLineDash([]);
                                        ctxCanvas.font = 'bold 9px "Segoe UI"';
                                        ctxCanvas.fillStyle = '#c2410c';
                                        ctxCanvas.fillText('▲ Umbral TCM ≥ '+ALTO_CRECIMIENTO+'% (alto crecimiento)', this.chartArea.right - 170, yPos - 5);
                                        
                                        if (xScale) {
                                            if(todosPRMMenores1) {
                                                const xPos = xScale.getPixelForValue(ALTA_CUOTA);
                                                ctxCanvas.beginPath();
                                                ctxCanvas.moveTo(xPos, this.chartArea.top);
                                                ctxCanvas.lineTo(xPos, this.chartArea.bottom);
                                                ctxCanvas.strokeStyle = '#2c6e9e';
                                                ctxCanvas.lineWidth = 1.8;
                                                ctxCanvas.setLineDash([5, 5]);
                                                ctxCanvas.stroke();
                                                ctxCanvas.fillStyle = '#1e5480';
                                                ctxCanvas.font = 'bold 9px "Segoe UI"';
                                                ctxCanvas.fillText('▶ Umbral Cuota de Mercado ≥ '+Number.parseFloat(ALTA_CUOTA).toFixed(2)+'%', xPos + 3, this.chartArea.top + 12);
                                            } else {
                                                const xPos = xScale.getPixelForValue(ALTA_PRM);
                                                ctxCanvas.beginPath();
                                                ctxCanvas.moveTo(xPos, this.chartArea.top);
                                                ctxCanvas.lineTo(xPos, this.chartArea.bottom);
                                                ctxCanvas.strokeStyle = '#2c6e9e';
                                                ctxCanvas.lineWidth = 1.8;
                                                ctxCanvas.setLineDash([5, 5]);
                                                ctxCanvas.stroke();
                                                ctxCanvas.fillStyle = '#1e5480';
                                                ctxCanvas.font = 'bold 9px "Segoe UI"';
                                                ctxCanvas.fillText('▶ Umbral PRM ≥ '+Number.parseFloat(ALTA_PRM).toFixed(2), xPos + 3, this.chartArea.top + 12);
                                            }
                                        }
                                        ctxCanvas.restore();
                                    }
                                };
                                bubbleChart.draw();
                                
                                window.addEventListener('resize', () => bubbleChart.draw());
                            }
                        </script>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-6 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="align-items-center">
                        <h5 class="font-weight-bold text-primary m-0">MATRIZ PEST</h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="teble-responsive">
                        <canvas id="globalPestChart" height="200"></canvas>

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
                                    legend: { display: false, position: 'top', labels: { font: { size: 10 } } },
                                    tooltip: { callbacks: { label: (ctx) => `Impacto: ${ctx.raw} pts` } }
                                },
                                scales: {
                                    y: { 
                                    beginAtZero: true, 
                                    max: 100,
                                    title: { display: true, text: 'Nivel de impacto de factores generales externos', font: { size: 12 } },
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