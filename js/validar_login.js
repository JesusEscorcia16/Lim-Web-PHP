$(document).ready(function () {
    $('form').submit(function (e) {
        e.preventDefault();

        var data = $(this).serializeArray();
        data.push({name: 'tag', value: 'registro'});
        $.ajax({
            url: '../process/login.php',
            type: 'post',
            dataType: 'json',
            data: data
        })
                .done(function () {
                    window.location.href = "../pages/index.php";               
                })
                .fail(function () {
                    //Materialize.toast('Error al registrar', 4000);
                    $('#error_login').show();
                 
                })
                .always(function () {
                    setTimeout(function(){
                        $('#error_login').hide();
                    }, 5000)
                })
    });
});