@php
$TU = Auth::user()->TipoUsuarioId;

$actual_link = "$_SERVER[REQUEST_URI]";
$modulo = explode("/", $actual_link);
@endphp
<ul class="app-menu">

        <li><a class="app-menu__item <?= $modulo[1] == "empresa" ? "active" : "" ?>" href="/empresa/home"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Datos de la Empresa</span></a></li>

        <hr>

        @if(auth()->user()->Rol == "Administrador" || auth()->user()->Rol == "Editor")

        <li><a class="app-menu__item <?= $modulo[2] == "cadena" ? "active" : "" ?>" href="/analisis/cadena"><i class="app-menu__icon fa fa-check"></i><span class="app-menu__label">Analisis de Cadena de Valor</span></a></li>

        <li><a class="app-menu__item <?= $modulo[2] == "participacion" ? "active" : "" ?>" href="/analisis/participacion"><i class="app-menu__icon fa fa-check"></i><span class="app-menu__label">Analisis de Participación</span></a></li>

        <li><a class="app-menu__item <?= $modulo[2] == "interno" ? "active" : "" ?>" href="/analisis/interno"><i class="app-menu__icon fa fa-search"></i><span class="app-menu__label">Analisis Interno</span></a></li>
        
        <hr>

        <li><a class="app-menu__item <?= $modulo[2] == "porter" ? "active" : "" ?>" href="/analisis/porter"><i class="app-menu__icon fa fa-check"></i><span class="app-menu__label">Analisis de Porter</span></a></li>

        <li><a class="app-menu__item <?= $modulo[2] == "pest" ? "active" : "" ?>" href="/analisis/pest"><i class="app-menu__icon fa fa-check"></i><span class="app-menu__label">Analisis PEST</span></a></li>

        <li><a class="app-menu__item <?= $modulo[2] == "externo" ? "active" : "" ?>" href="/analisis/externo"><i class="app-menu__icon fa fa-search"></i><span class="app-menu__label">Analisis Externo</span></a></li>

        <hr>
        @endif

        <li><a class="app-menu__item <?= $modulo[2] == "graficos" ? "active" : "" ?>" href="/analisis/graficos"><i class="app-menu__icon fa fa-line-chart"></i><span class="app-menu__label">Graficos</span></a></li>

        <hr>

        <li><a class="app-menu__item <?= $modulo[1] == "plan" ? "active" : "" ?>" href="/plan/list"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Planes Estratégicos</span></a></li>

        <hr>

        @if(auth()->user()->Rol == "Administrador")
        <li><a class="app-menu__item <?= $modulo[1] == "usuario" ? "active" : "" ?>" href="/usuario/listar"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Usuarios</span></a></li>
        @endif
        
</ul>