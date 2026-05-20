@extends('layouts.default')
@section('content')

<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12"><h5 class="font-weight-bold text-primary m-0">PLANES ESTRATEGICOS</h5></div>
                <div class="col-lg-6 col-sm-12 d-flex justify-content-end row">
                    @if(auth()->user()->Rol == "Administrador" || auth()->user()->Rol == "Editor")
                    <a href="/plan/add_plan" class="btn btn-primary btn-icon-split ml-1">
                        <i class="fa fa-plus"></i>
                        <span class="text">Agregar Plan Estratégico</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="TableData">
                    <thead class="bg-gray-100">
                        <tr>
                            <th width="10%" class="text-center">CODIGO</th>
                            <th width="15%" class="text-center">FECHA</th>
                            <th>CONCLUCIÓN</th>
                            <th width="18%"><center>ACCIONES</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Planes as $Plan)
                        <tr>
                            <td class="text-center">PE-{{ str_pad($Plan->Id, 3, "0", STR_PAD_LEFT) }}</td>
                            <td class="text-center">{{ date('d/m/Y h:i:s', strtotime($Plan->Fecha)) }}</td>
                            <td>{{ $Plan->Conclucion }}</td>
                            <td class="text-center">
                                @if(auth()->user()->Rol == "Administrador" || auth()->user()->Rol == "Editor")
                                <a href="/estrategia/identificacion/{{ $Plan->Id }}" class="btn btn-secondary btn-sm text-uppercase" title="Identificación de Estrategia"><i class="fa fa-lightbulb-o" aria-hidden="true" style="margin: 0 auto;"></i></a>

                                <a href="/analisis/came/{{ $Plan->Id }}" class="btn btn-secondary btn-sm text-uppercase" title="Matriz CAME"><i class="fa fa-check" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                @endif

                                @if(auth()->user()->Id == $Plan->UsuarioId)
                                <a href="#" class="btn btn-success btn-sm text-uppercase" title="Colaboradores" data-toggle="modal" data-target="#Colaboradores{{ $Plan->Id }}"><i class="fa fa-user" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                
                                <!-- Colaboradores Modal-->
                                <div class="modal fade" id="Colaboradores{{ $Plan->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Agregar Colaborador - Plan PE-{{ str_pad($Plan->Id, 3, "0", STR_PAD_LEFT) }}</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="/plan/add_colaborador">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="planid" value="{{ $Plan->Id }}">
                                            <div class="modal-body">
                                                <!-- Dropdown buscador -->
                                                <div class="user-dropdown">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-search"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" 
                                                            id="userSearchInput{{ $Plan->Id }}" 
                                                            class="form-control" 
                                                            placeholder="Escribe para buscar usuarios..."
                                                            name="buscar"
                                                            autocomplete="off">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary clearSearchBtn" type="button" data-planid="{{ $Plan->Id }}">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Dropdown de resultados -->
                                                    <div id="dropdownResults{{ $Plan->Id }}" class="dropdown-results">
                                                        <!-- Los resultados se muestran aquí -->
                                                    </div>
                                                </div>
                                                
                                                <!-- Usuario seleccionado -->
                                                <div id="selectedUserInfo{{ $Plan->Id }}" class="selected-user-info" style="display: none;">
                                                    <h6 class="mb-3">
                                                        <i class="fas fa-user-check"></i> Usuario Seleccionado:
                                                    </h6>
                                                    <div id="selectedUserContent{{ $Plan->Id }}"></div>
                                                </div>

                                                <hr>

                                                <div class="selected-user-info">
                                                    <h6 class="mb-3">
                                                        <i class="fas fa-user-check"></i> Colaboradores Registrados
                                                    </h6>
                                                    <hr>
                                                    <div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <?php 
                                                                $Nombre = $Plan->Nombre;
                                                                $Apellido = $Plan->Apellido;
                                                            ?>
                                                            <img src="https://ui-avatars.com/api/?background=3F51B5&color=fff&name={{ $Nombre[0] }} {{ $Apellido[0] }}" alt="{{ $Plan->Nombre }} {{ $Plan->Apellido }}" class="rounded-circle mr-3" width="60" height="60">
                                                            <div>
                                                                <h6 class="mb-1">{{ $Plan->Nombre }} {{ $Plan->Apellido }}</h6>
                                                                <div class="">
                                                                    <i class="fas fa-envelope"></i> {{ $Plan->Correo }}<br>
                                                                    <i class="fas fa-tag"></i> Propietario
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-sm" style="visibility: hidden;"><i class="fas fa-times"></i></a>
                                                        </div>
                                                        
                                                        @foreach($Colaboradores as $Item)
                                                        @if($Item->PlanId == $Plan->Id)
                                                        <hr>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <?php 
                                                                $Nombre = explode(" ", $Item->Nombre);
                                                                $Apellido = explode(" ", $Item->Apellido);
                                                            ?>
                                                            <img src="https://ui-avatars.com/api/?background=3F51B5&color=fff&name={{ $Nombre[0] }} {{ $Apellido[0] }}" alt="{{ $Plan->Nombre }} {{ $Plan->Apellido }}" class="rounded-circle mr-3" width="60" height="60">
                                                            <div>
                                                                <h6 class="mb-1">{{ $Item->Nombre }} {{ $Item->Apellido }}</h6>
                                                                <div class="">
                                                                    <i class="fas fa-envelope"></i> {{ $Item->Correo }}<br>
                                                                    <i class="fas fa-tag"></i> {{ $Item->Rol == 'Visualizador' ? 'Visualizador' : 'Colaborador' }}
                                                                </div>
                                                            </div>
                                                            <a href="/plan/delete_colaborador/{{ $Item->Id }}" class="btn btn-outline-danger btn-sm" title="Quitar Colaborador"><i class="fas fa-times"></i></a>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    <i class="fas fa-times"></i> Cerrar
                                                </button>
                                                <button type="submit" class="btn btn-primary confirmUserBtn" data-planid="{{ $Plan->Id }}" disabled>
                                                    <i class="fas fa-check"></i> Agregar Colaborador
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Colaboradores Modal-->
                                @endif

                                <a href="/plan/detalle/{{ $Plan->Id }}" class="btn btn-info btn-sm text-uppercase" title="Resumen de Plan Estratégico"><i class="fa fa-file-text-o" aria-hidden="true" style="margin: 0 auto;"></i></a>

                                @if(auth()->user()->Rol == "Administrador" || auth()->user()->Rol == "Editor")
                                @if(auth()->user()->Id == $Plan->UsuarioId)
                                <a href="#" class="btn btn-danger btn-sm text-uppercase" title="Eliminar" data-toggle="modal" data-target="#DeleteValor{{ $Plan->Id }}"><i class="fa fa-trash" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                <!-- Delete Modal-->
                                <div class="modal fade" id="DeleteValor{{ $Plan->Id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Desea eliminar el registro?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Haga clic en "Eliminar" si desea eliminar el Plan Estratégico seleccionado.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                <a class="btn btn-primary" href="/plan/delete_plan/{{ $Plan->Id }}">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Modal-->
                                @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach

                        @foreach($PlanesColab as $Plan)
                        <tr>
                            <td class="text-center">PE-{{ str_pad($Plan->PlanId, 3, "0", STR_PAD_LEFT) }}</td>
                            <td class="text-center">{{ date('d/m/Y h:i:s', strtotime($Plan->Fecha)) }}</td>
                            <td>{{ $Plan->Conclucion }}</td>
                            <td class="text-center">
                                @if(auth()->user()->Rol == "Administrador" || auth()->user()->Rol == "Editor")
                                <a href="/estrategia/identificacion/{{ $Plan->PlanId }}" class="btn btn-secondary btn-sm text-uppercase" title="Identificación de Estrategia"><i class="fa fa-lightbulb-o" aria-hidden="true" style="margin: 0 auto;"></i></a>

                                <a href="/analisis/came/{{ $Plan->PlanId }}" class="btn btn-secondary btn-sm text-uppercase" title="Matriz CAME"><i class="fa fa-check" aria-hidden="true" style="margin: 0 auto;"></i></a>
                                @endif

                                <a href="/plan/detalle/{{ $Plan->PlanId }}" class="btn btn-info btn-sm text-uppercase" title="Resumen de Plan Estratégico"><i class="fa fa-file-text-o" aria-hidden="true" style="margin: 0 auto;"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

<script>
// Array de usuarios desde PHP (una sola vez, fuera del foreach)
const users = [
    <?php foreach($Usuarios as $Item): ?>{
        id: <?= $Item->Id ?? $Item->id ?? 0 ?>,
        name: <?= json_encode(trim($Item->Nombre . ' ' . $Item->Apellido), JSON_UNESCAPED_UNICODE) ?>,
        email: <?= json_encode($Item->Correo ?? '', JSON_UNESCAPED_UNICODE) ?>,
        role: <?= json_encode($Item->Rol ?? 'Usuario', JSON_UNESCAPED_UNICODE) ?>,
        <?php 
        $Nombre = explode(" ", trim($Item->Nombre ?? ''));
        $Apellido = explode(" ", trim($Item->Apellido ?? ''));
        $primernombre = $Nombre[0] ?? 'Usuario';
        $primerapellido = $Apellido[0] ?? '';
        $iniciales = $primernombre . ' ' . $primerapellido;
        ?>
        avatar: "https://ui-avatars.com/api/?background=667eea&color=fff&name=" + encodeURIComponent(<?= json_encode(trim($iniciales)) ?>)
    },
    <?php endforeach; ?>
];

// Funciones globales
function highlightText(text, searchTerm) {
    if (!searchTerm || searchTerm.trim() === '') return text;
    const regex = new RegExp(`(${escapeRegex(searchTerm)})`, 'gi');
    return text.replace(regex, '<span class="search-highlight">$1</span>');
}

function escapeRegex(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}

function filterUsers(searchTerm) {
    if (!searchTerm || searchTerm.trim() === '') return [];
    const searchLower = searchTerm.toLowerCase().trim();
    return users.filter(user => {
        return user.name.toLowerCase().includes(searchLower) ||
            user.email.toLowerCase().includes(searchLower) ||
            user.role.toLowerCase().includes(searchLower);
    });
}

// Inicializar cada modal individualmente
@foreach($Planes as $Plan)
(function(planId) {
    let selectedUser = null;
    let searchTimeout = null;
    
    const searchInput = document.getElementById(`userSearchInput${planId}`);
    const dropdownResults = document.getElementById(`dropdownResults${planId}`);
    const selectedUserInfo = document.getElementById(`selectedUserInfo${planId}`);
    const selectedUserContent = document.getElementById(`selectedUserContent${planId}`);
    const confirmBtn = document.querySelector(`.confirmUserBtn[data-planid="${planId}"]`);
    const clearBtn = document.querySelector(`.clearSearchBtn[data-planid="${planId}"]`);
    
    function showDropdownResults(searchTerm) {
        const filteredUsers = filterUsers(searchTerm);
        
        if (!searchTerm || searchTerm.trim() === '') {
            dropdownResults.innerHTML = `
                <div class="no-results-dropdown">
                    <i class="fas fa-info-circle fa-2x mb-2"></i>
                    <p class="mb-0">Escribe para buscar usuarios</p>
                </div>
            `;
            dropdownResults.classList.add('show');
            return;
        }
        
        if (filteredUsers.length === 0) {
            dropdownResults.innerHTML = `
                <div class="no-results-dropdown">
                    <i class="fas fa-user-slash fa-2x mb-2"></i>
                    <p class="mb-0">No se encontraron usuarios</p>
                    <small>Intenta con otros términos</small>
                </div>
            `;
            dropdownResults.classList.add('show');
            return;
        }
        
        dropdownResults.innerHTML = filteredUsers.map(user => `
            <div class="dropdown-item-user" data-user-id="${user.id}">
                <div class="d-flex justify-content-start align-items-center">
                    <img src="${user.avatar}" alt="${user.name}" class="user-avatar-small mr-3">
                    <div class="flex-grow-1" style="text-align: left;">
                        <div class="font-weight-bold">${highlightText(user.name, searchTerm)}</div>
                        <div class="small text-muted">
                            <i class="fas fa-envelope"></i> ${highlightText(user.email, searchTerm)}
                        </div>
                        <div class="small">
                            <span class="badge badge-info badge-pill">
                                <i class="fas fa-tag"></i> ${highlightText(user.role, searchTerm)}
                            </span>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right text-muted"></i>
                </div>
            </div>
        `).join('');
        
        dropdownResults.classList.add('show');
        
        document.querySelectorAll(`#dropdownResults${planId} .dropdown-item-user`).forEach(item => {
            item.addEventListener('click', (e) => {
                const userId = parseInt(item.getAttribute('data-user-id'));
                const user = users.find(u => u.id === userId);
                if (user) {
                    selectedUser = user;
                    selectedUserContent.innerHTML = `
                        <div class="d-flex align-items-center">
                            <input type="hidden" name="usuarioid" value="${user.id}">
                            <img src="${user.avatar}" alt="${user.name}" class="rounded-circle mr-3" width="60" height="60">
                            <div>
                                <h6 class="mb-1">${user.name}</h6>
                                <div class="">
                                    <i class="fas fa-envelope"></i> ${user.email}<br>
                                    <i class="fas fa-tag"></i> ${user.role}
                                </div>
                            </div>
                        </div>
                    `;
                    selectedUserInfo.style.display = 'block';
                    if(confirmBtn) confirmBtn.disabled = false;
                    searchInput.value = '';
                    dropdownResults.classList.remove('show');
                }
            });
        });
    }
    
    if(searchInput) {
        searchInput.addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            const searchTerm = e.target.value;
            searchTimeout = setTimeout(() => showDropdownResults(searchTerm), 300);
        });
        
        searchInput.addEventListener('click', function(e) {
            e.stopPropagation();
            const searchTerm = this.value;
            if (searchTerm && searchTerm.trim() !== '') {
                showDropdownResults(searchTerm);
            }
        });
    }
    
    if(clearBtn) {
        clearBtn.addEventListener('click', function() {
            if(searchInput) {
                searchInput.value = '';
                dropdownResults.classList.remove('show');
                searchInput.focus();
            }
        });
    }
    
    // Cerrar dropdown al hacer click fuera
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.user-dropdown').length) {
            dropdownResults.classList.remove('show');
        }
    });
    
    // Resetear cuando se cierra el modal
    $(`#Colaboradores${planId}`).on('hidden.bs.modal', function () {
        if(searchInput) searchInput.value = '';
        dropdownResults.classList.remove('show');
        selectedUserInfo.style.display = 'none';
        if(confirmBtn) confirmBtn.disabled = true;
        selectedUser = null;
    });
    
    // Enfocar input cuando se abre el modal
    $(`#Colaboradores${planId}`).on('shown.bs.modal', function () {
        if(searchInput) searchInput.focus();
    });
    
})({{ $Plan->Id }});
@endforeach
</script>


@stop