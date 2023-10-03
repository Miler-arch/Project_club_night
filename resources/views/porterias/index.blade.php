@extends('layouts.main', ['activePage' => 'porterias', 'titlePage' => 'Nueva Porteria'])
@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('porterias.store') }}" method="post" class="form-horizontal" id="myForm">
                @csrf
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Porteria</h4>
                        <a class="btn btn-info float-right" href="{{route('porterias.registros')}}"> ver registros</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-form d-flex align-items-center">
                                        <span>Nombre personal:</span>
                                    </label>
                                    <select class="js-example-basic-single w-100" id="user_select" name="user_id" placeholder="Select a person...">
                                        <option value="">Seleccione un usuario...</option>
                                        @foreach ($users as $user)
                                            @if (!$user->hasRole('chica'))
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-form d-flex align-items-center">
                                        <span>Nombre chica:</span>
                                    </label>
                                    <select class="js-example-basic-single w-100" id="user_chica_select" name="chica_id" placeholder="Select a person...">
                                        <option value="">Seleccione un usuario...</option>
                                        @foreach ($chicas as $chica)
                                            <option value="{{ $chica->id }}">{{ $chica->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                   <label class="font-form d-flex align-items-center">
                                        <span>Estado :</span>
                                    </label>
                                    <div>
                                        <div id="chica_state_display" class="d-flex justify-content-center bg-dark rounded text-white pt-2 pb-2"> Aun no hay un estado.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-form d-flex align-items-center">
                                        Carnet de Sanidad :
                                    </label>
                                    <div id="chica_sanidad_display" class="d-flex justify-content-center bg-dark rounded text-white pt-2 pb-2"> Estado de Sanidad</div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-form">
                                        <span>Foto :</span>
                                    </label>
                                    <img id="photo_user"  width="200" height="200">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-form d-flex align-items-center">
                                        Tipo de personal :
                                    </label>
                                    <select name="type_user" id="" class="form-control">
                                        <option value="" >Seleccione una opción :</option>
                                        <option value="1">Chica</option>
                                        <option value="2">Cajero</option>
                                        <option value="3">Garzon</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <label class="font-form d-flex align-items-center">
                                        Vencimiento Sanidad :
                                </label>
                                <input type="date" name="health_card_expiry_date" id="health_card_expiry_date" class="form-control p-3" readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="font-form d-flex align-items-center">
                                    Código de Sanidad :
                                </label>
                                <input type="text" name="code_card" id="code_card" class="form-control p-3" readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="font-form d-flex align-items-center">
                                    Número de Celular :
                                </label>
                                <input type="text" id="phone_user" readonly class="form-control p-3">
                            </div>

                            <div class="col-md-6">
                                <label class="font-form d-flex align-items-center">
                                    Número de Carnet :
                                </label>
                                <input type="text" id="ci_user" readonly class="form-control p-3">
                            </div>

                            <div class="col-md-2 mt-3">
                                <label class="font-form d-flex align-items-center">
                                    ¿Bloquear? :
                                </label>
                                Marque si desea bloquear
                                <input type="checkbox" id="miCheckbox">
                            </div>
                            <div class="col-md-4 mt-3">
                                <label class="font-form d-flex align-items-center">
                                    Motivo de bloqueo :
                                </label>
                                <textarea placeholder="Ingrese el motivo" name="reason_txt" id="miTextarea" class="form-control"></textarea>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="font-form d-flex align-items-center">
                                        Autorizado por :
                                    </label>
                                    <select name="user_id" class="form-control">
                                                <option value="">Seleccione un usuario...</option>
                                        @foreach ($users as $user)
                                            @if ($user->hasRole('superAdmin'))
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                       <input type="text" name="reason" id="reason" style="display: none;">
                       <input type="text" name="user_id" id="user_id" style="display: none;">
                    <div class="card-footer ml-auto mr-auto">
                        <a href="{{ route('porterias.index') }}" class="btn btn-success mr-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary" id="submitButton">INGRESO</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>

<script>
    $(document).ready(function () {
        $('#user_select').change(function () {
            let userId = $(this).val();

            // Realiza una solicitud AJAX para obtener el número de teléfono del usuario seleccionado
            $.ajax({
                url: '/get-user-phone', // Debes definir esta ruta en tu archivo de rutas
                method: 'POST',
                data: { user_id: userId, "_token": "{{ csrf_token() }}" },
                success: function (data) {
                    // Actualiza el campo de entrada con el número de teléfono del usuario
                    $('#photo_user').attr('src', data.photo);
                    $('#ci_user').val(data.ci);
                    $('#phone_user').val(data.phone);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#user_chica_select').change(function () {
            let chicaId = $(this).val();

            $.ajax({
                url: '/get-user-chica',
                method: 'POST',
                data: { chica_id: chicaId, "_token": "{{ csrf_token() }}" },
                success: function (data) {
                    $('#photo_user').attr('src', data.image);
                    $('#ci_user').val(data.ci);
                    $('#phone_user').val(data.phone);
                    $('#health_card_expiry_date').val(data.health_card_expiry_date);
                    $('#code_card').val(data.code_card);

                    let estadoDisplay = $('#chica_state_display');
                    if (data.state_chica === 0) {
                        estadoDisplay.text('Inactivo').removeClass().addClass('bg-danger p-2 rounded font-weight-bold text-white d-flex justify-content-center');
                    } else if (data.state_chica === 1) {
                        estadoDisplay.text('Activo').removeClass().addClass('bg-success p-2 rounded font-weight-bold text-white d-flex justify-content-center');
                    } else if (data.state_chica === 2) {
                        estadoDisplay.text('Bloqueado').removeClass().addClass('bg-warning p-2 rounded font-weight-bold d-flex justify-content-center');
                    }

                    let estadoSanidad = $('#chica_sanidad_display');
                    if (data.health_card_expiry_date) {
                        // Verifica si la fecha de vencimiento es posterior a la fecha actual
                        const fechaVencimiento = new Date(data.health_card_expiry_date);
                        const fechaActual = new Date();

                        if (fechaVencimiento > fechaActual) {
                            // Si la fecha de vencimiento es posterior a la fecha actual, está activo
                            estadoSanidad.text('Activo').removeClass().addClass('bg-success p-2 font-weight-bold rounded text-white d-flex justify-content-center');
                        } else {
                            // Si la fecha de vencimiento es igual o anterior a la fecha actual, está inactivo
                            estadoSanidad.text('Inactivo').removeClass().addClass('bg-danger p-2 font-weight-bold rounded text-white d-flex justify-content-center');
                        }
                    } else {
                        // Si no tiene fecha de vencimiento, está inactivo
                        estadoSanidad.text('Inactivo').removeClass().addClass('bg-danger p-2 font-weight-bold rounded text-white d-flex justify-content-center');
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>
{{-- bloquear chica con ajax --}}
<script>
    var motivo = $("#miTextarea").val();
</script>


<script>
    // Agrega un evento de clic al botón
    document.getElementById('submitButton').addEventListener('click', function (e) {
        // Evita que el formulario se envíe automáticamente
        e.preventDefault();

        // Obtiene la fecha de vencimiento del carné de sanidad
        const healthCardExpiryDate = new Date(document.getElementById('health_card_expiry_date').value);
        // Obtiene la fecha actual
        const currentDate = new Date();

    // Verifica si la fecha de vencimiento ha expirado
        if (healthCardExpiryDate < currentDate) {
        Swal.fire({
            title: 'El carnet de sanidad ha expirado',
            text: '¿Desea continuar sin el carnet de sanidad?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, continuar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Supongamos que tienes una lista de usuarios con roles en tu aplicación
                const usuarios = [
                    { id: 1, name: 'Freddy', role: 'superAdmin' },
                    { id: 2, name: 'Wilson', role: 'superAdmin' },
                ];

                // Filtra la lista para obtener solo los usuarios con el rol "superAdmin"
                const superAdminUsers = usuarios.filter(user => user.role === 'superAdmin');

                if (superAdminUsers.length > 0) {
                    // Construye el objeto de opciones para el selector
                    const inputOptions = {};
                    superAdminUsers.forEach(user => {
                        inputOptions[user.id] = user.name;
                    });

                    Swal.fire({
                        title: 'Seleccione al usuario con rol superAdmin:',
                        input: 'select',
                        inputOptions: inputOptions,
                        showCancelButton: true,
                        confirmButtonText: 'Seleccionar',
                        cancelButtonText: 'Cancelar'
                    }).then((userResult) => {
                        if (userResult.isConfirmed) {
                            const selectedUserId = userResult.value;
                            // Puedes hacer algo con el ID seleccionado aquí si lo necesitas
                            console.log('Usuario superAdmin seleccionado:', selectedUserId);

                            // Muestra el campo de razón
                            Swal.fire({
                                title: 'Ingrese la razón:',
                                input: 'text',
                                inputAttributes: {
                                    name: 'reason',
                                },
                                showCancelButton: true,
                                confirmButtonText: 'Guardar',
                                cancelButtonText: 'Cancelar'
                            }).then((reasonResult) => {
                                if (reasonResult.isConfirmed) {
                                    const reason = reasonResult.value;
                                    if (reason.trim() !== "") {
                                        document.getElementById('reason').value = reason;
                                        Swal.fire({
                                            title: 'Se registró correctamente.',
                                            icon: 'success',
                                            showConfirmButton: false,
                                            timer: 1000
                                        }).then(() => {
                                            // Envía el formulario después de la alerta de registro exitoso
                                            document.getElementById('myForm').submit();
                                        });

                                    } else {
                                        Swal.fire('Error', 'Debes ingresar una razón', 'error');
                                    }
                                }
                            });
                        }
                    });
                } else {
                    // No hay usuarios superAdmin disponibles
                    Swal.fire('Error', 'No hay usuarios con rol superAdmin disponibles', 'error');
                }
            }
        });
    }else {
            Swal.fire({
                title: 'Se registró correctamente.',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000
            }).then(() => {
                // Envía el formulario después de la alerta de registro exitoso
                document.getElementById('myForm').submit();
            });
        }
    });
</script>


@endsection
