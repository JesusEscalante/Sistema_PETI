@php
$TU = Auth::user()->TipoUsuarioId;

$actual_link = "$_SERVER[REQUEST_URI]";
$modulo = explode("/", $actual_link);
@endphp
<ul class="app-menu">

        <li><a class="app-menu__item <?= $modulo[1] == "empresa" ? "active" : "" ?>" href="/empresa/home"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Datos de la Empresa</span></a></li>

        <hr>

        <li>
                <a class="app-menu__item <?= $modulo[1] == "plan" || $modulo[2] == "cadena" || $modulo[2] == "participacion" || $modulo[2] == "interno" || $modulo[2] == "porter" || $modulo[2] == "pest" || $modulo[2] == "externo" || $modulo[2] == "grafico" || $modulo[2] == "identificacion" || $modulo[2] == "came" ? "active" : "" ?>" href="/plan/list">
                        <i class="app-menu__icon fa fa-pie-chart"></i>
                        <span class="app-menu__label">Planes Estratégicos</span>
                </a>
        </li>

        <hr>

        @if(auth()->user()->Rol == "Administrador")
        <li><a class="app-menu__item <?= $modulo[1] == "usuario" ? "active" : "" ?>" href="/usuario/listar"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Usuarios</span></a></li>
        @endif
        
</ul>