<script src="../js/typeahead.js"></script>   
<script src="../js/jquery-3.3.1.js"></script>
<script type="text/javascript">
    $(document).ready(function()
        {
            // aqui a função ajax que busca os dados em outra pagina do tipo html
            function load_dados(valores, page, div)
                {
                    $.ajax
                        ({
                            type: 'POST',
                            dataType: 'html',
                            url: page,
                            data: valores,
                            success: function(msg)
                                {
                                    var data = msg;
                                    $(div).html(data).fadeIn();				
                                }
                        });
                }
                
           
            //Aqui uso o evento on blu para começar a pesquisar, assim que mudar o foco do mouse
            $('#login').blur(function()
                {    
                    var valores = $('#cadastro').serialize()//o serialize retorna uma string pronta para ser enviada
                    //pegando o valor do campo
                    var $parametro = $(this).val();
                                
                    if($parametro.length >= 1)
                        {
                            load_dados(valores, '../controllers/pesquisaLogin.php', '#MostraPesq');
                        }
                    else
                        {
                            load_dados(null, '../controllers/pesquisaLogin.php', '#MostraPesq');
                        }
                })
        })
</script>