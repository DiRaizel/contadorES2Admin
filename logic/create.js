//---------------------------------Usuarios-------------------------------------

//
function guardarUsuario() {
    //
    if ($('#password').val() !== $('#passwordC').val()) {
        //
        swal("Atención", "Las contraseñas no coinciden!");
    } else {
        //
        var formElement = document.getElementById("formNuevoUsuario");
        formData = new FormData(formElement);
        //
        formData.append('accion', 'guardarUsuario');
        //
        if (sessionStorage.idUsu != 1) {
            //
            formData.append('empresa', sessionStorage.idEmp);
        }
        //
        $.ajax({
            url: 'controllers/create.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json'
        }).done(function (data) {
            //
            if (data === 1) {
                //
                $("#formNuevoUsuario")[0].reset();
                $('#modalNuevoUsuario').modal('hide');
                //
                if (sessionStorage.idUsu == 1) {
                    //
                    cargarTablaUsuarios();
                } else {
                    //
                    cargarTablaUsuariosE();
                }
                //}
                swal("Atención", "Guardado!");
                //
            } else if (data === 2) {
                //
                swal("Atención", "Error al guardar usuario!");
            } else {
                //
                swal("Atención", "Error correo ya se encuetra registrado!");
            }
        }).fail(function (data_error) {
            console.log(data_error);
            swal("Atención", "Error al conectarse!");
        });
    }
}

//---------------------------------Empresas-------------------------------------

//
function guardarEmpresa() {
    //
    var formElement = document.getElementById("formNuevaEmpresa");
    formData = new FormData(formElement);
    //
    formData.append('accion', 'guardarEmpresa');
    //
    if ($('#password').val() !== $('#passwordC').val()) {
        //
        swal("Atención", "Las contraseñas no coinciden!");
    } else {
        //
        $.ajax({
            url: 'controllers/create.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json'
        }).done(function (data) {
            //
            if (data === 1) {
                //
                $("#formNuevaEmpresa")[0].reset();
                $('#modalNuevaEmpresa').modal('hide');
                //
                cargarTablaEmpresas();
                //
                swal("Atención", "Guardado!");
                //
            } else if (data === 2) {
                //
                swal("Atención", "Error al Guardar Empresa!");
            }
        }).fail(function (data_error) {
            console.log(data_error);
            swal("Atención", "Error al conectarse!");
        });
    }
}

//------------------------------------Sedes-------------------------------------

//
function guardarSede() {
    //
    var formElement = document.getElementById("formNuevaSede");
    formData = new FormData(formElement);
    //
    formData.append('accion', 'guardarSede');
    formData.append('idUsu', sessionStorage.idUsu);
    formData.append('idEmp', sessionStorage.idEmp);
    //
    if (sessionStorage.idUsu != 1) {
        //
        formData.append('empresa', sessionStorage.idEmp);
    }
    //
    $.ajax({
        url: 'controllers/create.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        dataType: 'json'
    }).done(function (data) {
        //
        if (data === 1) {
            //
            $("#formNuevaSede")[0].reset();
            $('#modalNuevaSede').modal('hide');
            //
            if (sessionStorage.idUsu == 1) {
                //
                cargarTablaSedesS();
            } else {
                //
                cargarTablaSedesE();
            }
            //
            swal("Atención", "Guardado!");
            //
        } else if (data === 2) {
            //
            swal("Atención", "Error al guardar la sede!");
        }
    }).fail(function (data_error) {
        console.log(data_error);
        swal("Atención", "Error al conectarse!");
    });
}

//
function guardarConfigSede() {
    //
    var formElement = document.getElementById("formConfigSede");
    formData = new FormData(formElement);
    //
    formData.append('accion', 'guardarConfigSede');
    formData.append('idSed', idConfigSede);
    formData.append('idEmp', idConfigSedeEmp);
    //
    $.ajax({
        url: 'controllers/create.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        dataType: 'json'
    }).done(function (data) {
        //
        if (data === 1) {
            //
            $("#formConfigSede")[0].reset();
            $('#modalConfigSede').modal('hide');
            //
            swal("Atención", "Guardado!");
            //
        } else if (data === 2) {
            //
            swal("Atención", "Error al guardar la configuracion!");
        }
    }).fail(function (data_error) {
        console.log(data_error);
        swal("Atención", "Error al conectarse!");
    });
}

//--------------------------------Sliders---------------------------------------

//
function guardarSlider() {
    //
    var formElement = document.getElementById("formNuevoSlider");
    formData = new FormData(formElement);
    //
    formData.append('accion', 'guardarSlider');
    //
    if ($("#empresa").val()=== null) {
        //
        formData.append('empresa', 0);
    }
    //
    $.ajax({
        url: 'controllers/create.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        cache: false,
        dataType: 'json'
    }).done(function (data) {
        //
        if (data === 1) {
            //
            $("#formNuevoSlider")[0].reset();
            $('#modalNuevoSlider').modal('hide');
            //
            cargarTablaSliders();
            //
            swal("Atención", 'Guardado!');
            //
        } else if (data === 3) {
            //
            swal("Atención", 'Error al subir la imagen!');
        } else {
            //
            swal("Atención", 'Error al guardar el slider!');
        }
    }).fail(function (data_error) {
        console.log(data_error);
        swal("Atención", 'Error al conectarse!');
    });
}