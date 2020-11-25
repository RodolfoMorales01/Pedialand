 $(document).ready(function(){

    $('#formlogin').submit(function(e) {
        e.preventDefault();
        
        var Correo = document.getElementById('email').value;
        var Contra = document.getElementById('password').value;

        var ruta= "correo="+Correo+"&password="+Contra;

        $.ajax({
            url: 'php/login.php',
            type: 'POST',
            data: ruta,
            cache: false,
            beforeSend:function(){
                $('.botonlg').val("Validando....");
            }
        })
        
        .done(function(respuesta){
            $('.botonlg').val('Iniciar Sesión');
            if (respuesta =="1") {
               $(location).attr('href','admin.php')
            } else {
                $('.error').slideDown('slow');
                setTimeout(function(){
                    $('.error').slideUp('slow');
                },3000);
                $('.botonlg').val('Iniciar Sesión');
            }
        })
    })
})