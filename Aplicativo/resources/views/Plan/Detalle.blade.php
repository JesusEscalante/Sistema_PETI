@extends('layouts.default')
@section('content')

<div class="container-fluid">

<!-- title -->
<div class="app-title justify-content-between mb-3" style="position: sticky; top: 80px; background-color: #fff; z-index: 999;">
    <h1>PLAN ESTRATÉGICO</h1>
    <div class="d-flex">
        <a type="button" id="btnGuardar" class="btn btn-outline-primary mr-2" style="opacity: 0; transition: opacity 1s ease-out;"><i class="app-menu__icon fa fa-repeat"></i> Guardar Conclución</a>
        <a type="button" onclick="Imprimir()" class="btn btn-outline-info mr-2"><i class="app-menu__icon fa fa-print"></i> Imprimir</a>
    </div>
</div>
<!-- title -->
<div class="d-flex justify-content-center align-items-center">
        
    <!-- content -->
    <div class="border border-shadow">
        <div class="m-3">
            
            <div class="inline-editor-container" id="Contenido">
                <div id="tiny-editor-inline">
                <?= $Plan->Contenido ?>
                <form id="fomrConclucion" action="/plan/save_conclucion" method="post">
                    <input type="hidden" name="id" value="{{ $Plan->Id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(auth()->user()->Rol == "Administrador" || auth()->user()->Rol == "Editor")
                    <textarea class="form-control" id='txtConclucion' name='conclucion' style='margin-left: 40px; width: calc(100% - 80px);'>{{ $Plan->Conclucion }}</textarea>
                    @else
                    <h6 style='padding-left: 40px; width: calc(100% - 40px);'>{{ $Plan->Conclucion }}</h6>
                    @endif
                </form>
                </div>
            </div>
            
        </div>
    </div>

    <script>
        const textarea = document.getElementById('txtConclucion');
        const botonGuardar = document.getElementById('btnGuardar');
        let contenidoOriginal = textarea.value;

        function verificarCambios() {
            if (textarea.value !== contenidoOriginal) {
                botonGuardar.style.display = 'inline-block';
                botonGuardar.offsetHeight;
                botonGuardar.style.opacity = 1;
            } else {
                botonGuardar.style.display = 'none';
                botonGuardar.style.opacity = 0;
            }
        }
        
        // Evento para detectar cambios en el textarea
        textarea.addEventListener('input', verificarCambios);

        // Guardar cambios
        botonGuardar.addEventListener('click', function() {
            document.getElementById('fomrConclucion').submit();
        });
    </script>
        
    <script>      
        function Imprimir() {
            try {
                function obtenerContenidoCompleto() {
                    let div = document.getElementById('Contenido');
                    let clone = div.cloneNode(true); // Clona el div
                    let textarea = clone.querySelector('textarea');
                    if (textarea) {
                        textarea.textContent = textarea.value;
                    }
                    return clone.innerHTML;
                }
                let content = obtenerContenidoCompleto();
                //const content = document.getElementById('Contenido').innerHTML;
                const contentForPrint = content.replace(/<!-- pagebreak -->/g, '<div style="page-break-before: always; break-before: page;"></div>');

                // Crear ventana temporal para imprimir
                var printWindow = window.open(' ','popimpr');
                
                const printStyles = `
                    <style>
                        body { 
                            font-family: Arial, sans-serif; 
                            line-height: 1.6;
                            margin: 20px;
                            font-size: 12pt;
                            color: #000;
                        }
                        .page-break {
                            page-break-before: always;
                            padding: 10px;
                            background: #f9f9f9;
                            margin: 20px 0;
                            cursor: default;
                            text-align: center;
                            color: #666;
                        }
                        .page-break::after {
                            content: "--- Salto de Página ---";
                            font-style: italic;
                        }
                        img { 
                            max-width: 100% !important; 
                            height: auto !important; 
                        }
                        table { 
                            width: 100%; 
                            border-collapse: collapse; 
                        }
                        table, th, td { 
                            border: 1px solid #ddd; 
                        }
                        th, td { 
                            padding: 8px 12px; 
                            text-align: left; 
                        }
                        h1, h2, h3, h4, h5, h6 {
                            margin-top: 1.5em;
                            margin-bottom: 0.5em;
                            page-break-after: avoid;
                        }
                        p {
                            margin-bottom: 1em;
                        }
                        blockquote {
                            border-left: 4px solid #ccc;
                            margin: 1em 0;
                            padding-left: 1em;
                            font-style: italic;
                        }
                        
                        @media print {
                            body { 
                                margin: 0.5in; 
                            }
                            .no-print { 
                                display: none !important; 
                            }
                            h1, h2, h3 {
                                page-break-after: avoid;
                            }
                            img {
                                page-break-inside: avoid;
                            }
                            table {
                                page-break-inside: auto;
                            }
                            tr {
                                page-break-inside: avoid;
                                page-break-after: auto;
                            }
                        }
                    </style>
                `;
                
                printWindow.document.write(`
                    <!DOCTYPE html>
                    <html>
                        <head>
                            <title>RESUMEN EJECUTIVO DEL PLAN ESTRATÉGICO</title>
                            <meta charset="utf-8">
                            ${printStyles}
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                        </head>
                        <body>
                            <div class="print-content">
                                ${contentForPrint}
                            </div>
                            <script>
                                setTimeout(function() {
                                    window.print();
                                    setTimeout(function() {
                                        window.close();
                                    }, 100);
                                }, 500);
                            <\/script>
                        </body>
                    </html>
                `);
                
                printWindow.document.close();
                printWindow.focus();
                printWindow.onload = function() {
                    printWindow.print();
                    printWindow.close();
                };
                return true;
                
            } catch (error) {
                console.error('Error al imprimir:', error);
                alert('Error al imprimir el documento: ' + error.message);
            }
        }
    </script>
    
</div>

</div>

@stop