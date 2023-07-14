$(document).ready(function() {
    $('#codigo').focus(function() {
        $.ajax({
            url: '../controllers/buscaCap.php',
            type: 'GET',
            data: 'descricao=' + $('#descricao').val(),
            //dataType: 'html',
            //dataType: 'json',
            success: function(codigo) {
                $('#codigo').val(codigo);
            }
        });
    });
})