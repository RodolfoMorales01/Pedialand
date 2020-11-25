$(document).ready(function() {
    $('#formregister').submit(function(e) {
        e.preventDefault();

        var email = document.getElementById('email').value;
        var passwd = document.getElementById('passwd').value;
        var name = document.getElementById('nombre').value;
        var paterno = document.getElementById('ap_paterno').value;
        var materno = document.getElementById('ap_materno').value;
        var fecha = document.getElementById('nacimiento').value;
        var cedula = document.getElementById('cedula').value;
        var roles = document.getElementById('roles').value;

        var envio = "email="+email+"&passwd="+passwd+"&name="+name+"&paterno="+paterno+"&materno="+materno+"&fecha="+fecha+"&cedula="+cedula+"&roles="+roles;
        // var envio = "email="+email+"&passwd="+passwd+"&name="+name+"&paterno="+paterno+"&materno="+materno+"&fecha="+fecha+"&cedula="+cedula;

        $.ajax({
            url: '../../php/register.php',
            type: 'POST',
            data: envio,
            cache: false,
            beforeSend:function() {
                $('.register').val("Validando información....");
                setTimeout(10000);
            }
        })
        .done(function(respuesta) {
            if (respuesta == "1") {
                console.log(respuesta);
                limpiar()
                $('.register').val('Agregar usuario');       
                $('#result').slideDown('slow');
                $('#result').html("<section class='alert alert-success alert-dismissible fade show'><strong>Usuario Registrado</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></section>");
                setTimeout(function(){
                    $('#result').slideUp('slow');
                },5000);
                
            } else {
                console.log(respuesta);
                $('.register').val('Agregar usuario');         
                $('#result').slideDown('slow');
                $('#result').html("<section class='alert alert-danger alert-dismissible fade show'><strong>Usuario No Registrado</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></section>");
                setTimeout(function(){
                    $('#result').slideUp('slow');
                },5000);
            }
        })
    });
});

function limpiar() {
    document.getElementById('email').value ="";
    document.getElementById('passwd').value ="";
    document.getElementById('nombre').value ="";
    document.getElementById('ap_paterno').value ="";
    document.getElementById('ap_materno').value ="";
    document.getElementById('nacimiento').value ="";
    document.getElementById('cedula').value ="";
    document.getElementById('roles').val ="Selecciona....";
}

function viewPerson(id){
    var ruta ='modals/modal_ver.php?persona=' + id;
    $.get(ruta,function (data) {
       $('#divModal').html(data);
       $('#viewModal').modal('show');
    });
}

function editPerson(id){
    var ruta ='modals/modal_edit.php?persona=' + id;
    $.get(ruta,function (data) {
       $('#divModal').html(data);
       $('#viewModal').modal('show');
    });
}

function updatePerson(id) {
    var email = document.getElementById('correo').value;
    var passwd = document.getElementById('pwd').value;
    var name = document.getElementById('nombre').value;
    var paterno = document.getElementById('paterno').value;
    var materno = document.getElementById('materno').value;
    var fecha = document.getElementById('fecha').value;
    var cedula = document.getElementById('cedula').value;
    var roles = document.getElementById('rol').value;

    var envio = "email="+email+"&passwd="+passwd+"&name="+name+"&paterno="+paterno+"&materno="+materno+"&fecha="+fecha+"&cedula="+cedula+"&roles="+roles+"&persona="+id;
    
    $.ajax({
        url: '../../php/update.php',
        type: 'POST',
        data: envio,
        cache: false,
        beforeSend:function() {
            $('.update').val("Validando información....");
            setTimeout(10000);
        }
    })
    .done(function(respuesta) {
        if (respuesta == "1") {
            console.log(respuesta);
            $('.register').val('Agregar usuario');       
            $('#result').slideDown('slow');
            $('#result').html("<section class='alert alert-success alert-dismissible fade show'><strong>Usuario Registrado</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></section>");
            setTimeout(function(){
                $('#result').slideUp('slow');
            },5000);
            $('#viewModal').modal('toggle');
            location.reload();
        } else {
            console.log(respuesta);
            $('.register').val('Agregar usuario');         
            $('#result').slideDown('slow');
            $('#result').html("<section class='alert alert-danger alert-dismissible fade show'><strong>Usuario No Registrado</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></section>");
            setTimeout(function(){
                $('#result').slideUp('slow');
            },5000);
        }
    })
}
