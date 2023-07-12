<script language="javascript">
    function ValidarCPF(Objcpf)
        {
            var cpf = Objcpf.value;

            //retira a mascara
            exp = /\.|\-/g
            cpf = cpf.toString().replace(exp, "");
            var numeros, digitos, soma, i, resultado, digitos_iguais;
            digitos_iguais = 1;
            if (cpf.length < 11)
                return false;
            for (i = 0; i < cpf.length - 1; i++)
                if (cpf.charAt(i) != cpf.charAt(i + 1))
                        {
                        digitos_iguais = 0;
                        break;
                        }
            if (!digitos_iguais)
                {
                    numeros = cpf.substring(0,9);
                    digitos = cpf.substring(9);
                    soma = 0;
                    for (i = 10; i > 1; i--)
                            soma += numeros.charAt(10 - i) * i;
                    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                    if (resultado != digitos.charAt(0))
                        {
                            alert('O CPF INFORMADO NÃO É VÁLIDO!');
                            $('#dadosCpf').addClass("textfield_erro");
                            document.cadastro.dadosCpf.value='';
                            document.cadastro.dadosCpf.focus();
                            return false;
                        }

                    numeros = cpf.substring(0,10);
                    soma = 0;
                    for (i = 11; i > 1; i--)
                            soma += numeros.charAt(11 - i) * i;
                    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
                    if (resultado != digitos.charAt(1))
                        {
                            alert('O CPF INFORMADO NÃO É VÁLIDO!');
                            $('#dadosCpf').addClass("textfield_erro");
                            document.cadastro.dadosCpf.value='';
                            document.cadastro.dadosCpf.focus();
                            return false;
                        }

                    return true;
                }
            else
                {
                    alert('O CPF INFORMADO NÃO É VÁLIDO!');
                    $('#dadosCpf').addClass("textfield_erro");
                    document.cadastro.dadosCpf.value='';
                    document.cadastro.dadosCpf.focus();
                    return false;
                }

  }
           
</script>
