<script type="text/javascript">
    function id(el) 
		{
            return document.getElementById(el);
        }

    function mostra(element) 
		{
            if (element) 
			{
                id(element.value).style.display = 'block';
            }
        }

    function esconde_todos($element, tagName) 
		{
            var $elements = $element.getElementsByTagName(tagName),
                i = $elements.length;
            while (i--) 
				{
					$elements[i].style.display = 'none';
				}
        }
    window.addEventListener('load', function() 
		{
            var $cpf = id('cpf'), $sus = id('sus'), $paciente = id('paciente');              

            //mostrando no onload da página
            esconde_todos(id('palco'), 'div');
            mostra(document.querySelector('input[name="pesquisa"]:checked'));

            //mostrando ao clicar no radio
            var $radios = document.querySelectorAll('input[name="pesquisa"]');
            $radios = [].slice.call($radios);

            $radios.forEach(function($each) 
			{
                $each.addEventListener('click', function() 
					{
						esconde_todos(id('palco'), 'div');
						mostra(this);
					});
            });
        });
    </script>