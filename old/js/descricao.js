$(function() {
    $('#numOrigem').change(function() {
        if ($(this).val()) {
            $('#descricao').hide();
            $('.carregando').show();
            $.getJSON('../scripts/descricao.php?search=', { numOrigem: $(this).val(), ajax: 'true' }, function(j) {
                var options;
                for (var i = 0; i < j.length; i++) {
                    options += '<option value="' + j[i].idOrigem + '">' + j[i].descricao + '</option>';
                }
                $('#descricao').html(options).show();
                $('.carregando').hide();
            });
        } else {
            $('#descricao').html('<option value="">– Escolha Subcategoria –</option>');
        }
    });
});