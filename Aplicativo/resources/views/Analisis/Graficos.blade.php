@extends('layouts.default')
@section('content')

<!-- content -->
<div class="container-fluid">

    <div class="row">

        <div class="col-lg-8 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="align-items-center">
                        <h5 class="font-weight-bold text-primary m-0">MATRIZ PARTICIPACION</h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="matrix-grid">
                        
                        <!-- CUADRANTE INTERROGANTE -->
                        <div class="quadrant border-bottom">
                            <h4 class="text-primary"><i class="fa fa-question mr-1"></i> INTERROGANTE</h4>
                            <div class="mt-2">
                                @foreach($Productos as $Item)
                                @if($Item->PRM <= $PromPRM && $Item->TCM > $PromTCM)
                                <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded mb-2">
                                    <div><strong>{{ $Item->Nombre }}</strong></div>
                                    <div class="d-flex">
                                        <span class="badge badge-info mr-1">TCM {{ number_format((float)$Item->TCM, 2, '.', '') }}%</span>
                                        <span class="badge badge-success">PRM {{ number_format((float)$Item->PRM, 2, '.', '') }}</span>
                                        <span class="badge badge-light">{{ number_format((float)$Item->Porcentaje, 2, '.', '') }}% cuota</span>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <hr class="my-2">
                            <div class="small text-primary"><i class="fa fa-puzzle-piece"></i> Alto crecimiento de mercado pero participación baja. Requieren inversión selectiva.</div>
                        </div>

                        <!-- CUADRANTE ESTRELLAS (alto crecimiento + alta participación relativa / peso en ventas) -->
                        <div class="quadrant border-right border-bottom">
                            <h4 class="text-warning"><i class="fa fa-star mr-1"></i> ESTRELLAS</h4>
                            <div class="mt-2">
                                @foreach($Productos as $Item)
                                @if($Item->PRM > $PromPRM && $Item->TCM > $PromTCM)
                                <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded mb-2">
                                    <div><strong>{{ $Item->Nombre }}</strong></div>
                                    <div class="d-flex">
                                        <span class="badge badge-info mr-1">TCM {{ number_format((float)$Item->TCM, 2, '.', '') }}%</span>
                                        <span class="badge badge-success">PRM {{ number_format((float)$Item->PRM, 2, '.', '') }}</span>
                                        <span class="badge badge-light">{{ number_format((float)$Item->Porcentaje, 2, '.', '') }}% cuota</span>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <hr class="my-2">
                            <div class="small text-muted"><i class="fa fa-bolt text-warning"></i> Alto crecimiento + alta participación relativa. Productos dominantes con potencial.</div>
                        </div>

                        <!-- CUADRANTE PERROS (Dogs) -->
                        <div class="quadrant">
                            <h4 class="text-secondary"><i class="fas fa-dog mr-1"></i> PERROS</h4>
                            <div class="mt-2">
                                @foreach($Productos as $Item)
                                @if($Item->PRM <= $PromPRM && $Item->TCM <= $PromTCM)
                                <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded mb-2">
                                    <div><strong>{{ $Item->Nombre }}</strong></div>
                                    <div class="d-flex">
                                        <span class="badge badge-info mr-1">TCM {{ number_format((float)$Item->TCM, 2, '.', '') }}%</span>
                                        <span class="badge badge-success">PRM {{ number_format((float)$Item->PRM, 2, '.', '') }}</span>
                                        <span class="badge badge-light">{{ number_format((float)$Item->Porcentaje, 2, '.', '') }}% cuota</span>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <hr class="my-2">
                            <div class="small text-muted"><i class="fas fa-ban"></i> Baja participación y crecimiento limitado. Reevaluar rentabilidad.</div>
                        </div>

                        <!-- CUADRANTE VACAS LECHERAS (Cash Cow) -->
                        <div class="quadrant border-right">
                            <h4 class="text-success"><i class="fa fa-coffee mr-1"></i> VACAS LECHERAS</h4>
                            <div class="mt-2">
                                @foreach($Productos as $Item)
                                @if($Item->PRM > $PromPRM && $Item->TCM <= $PromTCM)
                                <div class="d-flex justify-content-between align-items-center bg-light p-2 rounded mb-2">
                                    <div><strong>{{ $Item->Nombre }}</strong></div>
                                    <div class="d-flex">
                                        <span class="badge badge-info mr-1">TCM {{ number_format((float)$Item->TCM, 2, '.', '') }}%</span>
                                        <span class="badge badge-success">PRM {{ number_format((float)$Item->PRM, 2, '.', '') }}</span>
                                        <span class="badge badge-light">{{ number_format((float)$Item->Porcentaje, 2, '.', '') }}% cuota</span>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <hr class="my-2">
                            <div class="small text-success"><i class="fas fa-hand-holding-usd"></i> Bajo crecimiento aparente (estable), alta participación. Financian otros productos.</div>
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
                        <div><strong class="d-block"><i class="fa fa-star mr-2 text-warning"></i> Estrellas</strong><small class="text-muted">Alto crecimiento + alta cuota. Invertir para mantener liderazgo.</small></div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                        <div><strong class="d-block"><i class="fa fa-question mr-2 text-primary"></i> Interrogación</strong><small class="text-muted">Alto crecimiento, baja cuota. Inversión selectiva o desinversión.</small></div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                        <div><strong class="d-block"><i class="fa fa-coffee mr-2 text-success"></i> Vacas lecheras</strong><small class="text-muted">Bajo crecimiento, alta cuota. Maximizar flujo de caja.</small></div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                        <div><strong class="d-block"><i class="fas fa-dog mr-2 text-secondary"></i> Perros</strong><small class="text-muted">Baja participación, bajo crecimiento. Reasignar recursos.</small></div>
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
                            
                            // Umbrales: Alto crecimiento >= 6% , Alta participación relativa >= 0.52 (por encima de la media aproximada)
                            const ALTO_CRECIMIENTO = <?= $PromTCM ?>;
                            const ALTA_PRM = <?= $PromPRM ?>;
                            
                            // ------------------ GRÁFICO DE BURBUJAS (CHART.JS) ------------------
                            
                            const ctx = document.getElementById('bubbleChart').getContext('2d');
                            
                            // radios proporcionales a ventas (área ~ ventas)
                            const maxVenta = Math.max(...ventas);
                            const getRadius = (v) => {
                                const minR = 8;
                                const maxR = 26;
                                const ratio = v / maxVenta;
                                return minR + ratio * (maxR - minR);
                            };
                            const radii = ventas.map(v => getRadius(v));
                            
                            const bubbleData = {
                                datasets: [{
                                    label: 'Productos',
                                    data: productos.map((_, idx) => ({
                                        x: prm[idx],
                                        y: tcm[idx],
                                        r: radii[idx]
                                    })),
                                    backgroundColor: ['#f97316', '#3b82f6', '#8b5cf6', '#10b981', '#f59e0b'],
                                    borderColor: '#ffffff',
                                    borderWidth: 2,
                                    hoverBorderWidth: 2.5,
                                    hoverBorderColor: '#1e2b3c'
                                }]
                            };
                            
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
                                                    `TCM: ${tcm[idx].toFixed(1)}%`,
                                                    `Ventas: ${ventas[idx]}`,
                                                    `Cuota: ${pctVentas[idx]}%`
                                                ];
                                            }
                                        },
                                        backgroundColor: '#0f172ad9',
                                        titleColor: '#f1f5f9'
                                    },
                                    datalabels: {
                                        
                                    },
                                    legend: { display: false }
                                },
                                scales: {
                                    x: {
                                        title: { display: true, text: 'Participación Relativa de Mercado (PRM)', font: { size: 11, weight: 'bold' } },
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
                            
                            // Línea de referencia vertical/horizontal personalizada: umbral TCM
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
                                    
                                    // línea vertical referencia PRM
                                    if (xScale) {
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
                                        ctxCanvas.fillText('PRM = '+Number.parseFloat(ALTA_PRM).toFixed(2), xPos + 3, this.chartArea.top + 12);
                                    }
                                    ctxCanvas.restore();
                                }
                            };
                            bubbleChart.draw();
                            
                            // Ajuste en resize
                            window.addEventListener('resize', () => bubbleChart.draw());
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