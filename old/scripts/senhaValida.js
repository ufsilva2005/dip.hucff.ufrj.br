function senhaValida() {
    var senha = document.getElementById('passAdmin').value;
    var letrasMaiusculas = /[A-Z]/;
    var letrasMinusculas = /[a-z]/;
    var numeros = /[0-9]/;
    var caracteresEspeciais = /[!|@|#|$|%|^|&|*|(|)|-|_]/;
    var auxMaiuscula = 0;
    var auxMinuscula = 0;
    var auxNumero = 0;
    var auxEspecial = 1;
    var x1 = null;
    forca = 0;
    var message = document.getElementById('ufsMsg');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";

    testeTam = senha.length;

    for (var i = 0; i < testeTam; i++) {
        if (letrasMaiusculas.test(senha[i]))
            auxMaiuscula++;
        else if (letrasMinusculas.test(senha[i]))
            auxMinuscula++;
        else if (numeros.test(senha[i]))
            auxNumero++;
        else if (caracteresEspeciais.test(senha[i]))
            auxEspecial++;
    }
    if (testeTam > 7 && auxMaiuscula > 0 && auxMinuscula > 0 && auxNumero > 0 && auxEspecial > 0) {
        forca = 100;
        message.style.color = goodColor;
        message.innerHTML = "A SENHA ATENDE AOS REQUISITOS";
    } else if (testeTam > 5 && auxMaiuscula > 0 && auxMinuscula > 0 && auxNumero > 0 && auxEspecial > 0) {
        forca = 75;
    } else if (testeTam > 3 && auxMaiuscula > 0 && auxMinuscula > 0 && auxNumero > 0 && auxEspecial > 0) {
        forca = 50;
    } else if (testeTam > 1 && auxMaiuscula > 0 && auxMinuscula > 0 && auxNumero > 0 && auxEspecial > 0) {
        forca = 25;
    } else {
        forca = 20;
        message.style.color = badColor;
        message.innerHTML = "A SENHA ATENDE NÃO AOS REQUISITOS";
    }



    mostrarForca(forca);
}

function mostrarForca(forca) {

    if (forca < 50) {
        document.getElementById("erroSenhaForca").innerHTML = '<div class="progress"><div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div></div>';
    } else if (forca == 50) {
        document.getElementById("erroSenhaForca").innerHTML = '<div class="progress"><div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div></div>';
    } else if (forca == 75) {
        document.getElementById("erroSenhaForca").innerHTML = '<div class="progress"><div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></div>';
    } else if (forca == 100) {
        document.getElementById("erroSenhaForca").innerHTML = '<div class="progress"><div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>';
    }
}