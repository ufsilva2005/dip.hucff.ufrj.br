function validarSenha() {
    if (forca < 100) {
        alert('A SENHA INFORMADA NÃO É VÁLIDA!');
        document.admin.passAdmin.value = '';
        document.admin.passAdmin.focus();
        return false;
    } else {
        return true;
    }
}