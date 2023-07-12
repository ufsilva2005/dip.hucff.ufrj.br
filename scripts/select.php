<script type="text/javascript">
    $(document).ready(function() {
        $('input:radio[name="pesquisa"]').on("change", function() {
           if (this.checked && this.value == 'paciente') 
                {
                    $("#nomePaciente").show().focus();
                    $("#dadosCpf, #numSus").hide();
                } 
            else if (this.checked && this.value == 'cpf') 
                {
                    $("#dadosCpf").show().focus();
                    $("#nomePaciente, #numSus").hide();
                }
            else 
                {
                    $("#numSus").show().focus();
                    $("#nomePaciente, #dadosCpf").hide();
                }
        });
    });
</script>