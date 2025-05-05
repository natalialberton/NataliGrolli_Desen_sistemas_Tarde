function mascara(o, f) {
    objeto = o;
    funcao = f;
    setTimeout("executaMascara()", 1);
}

function executaMascara() {
    objeto.value = funcao(objeto.value);
}

//Máscara nome
function Name(variavel) {
    variavel = variavel.replace(/[^a-zA-Z áÁéÉíÍóÓúÚçÇ]/g,"");
    return variavel;
}

//Máscara CPF
function Cpf(variavel) {
    variavel = variavel.replace(/\D/g,"");
    variavel = variavel.replace(/(\d{3})(\d)/,"$1.$2");
    variavel = variavel.replace(/(\d{3})(\d)/,"$1.$2");
    variavel = variavel.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    return variavel;
}

//Máscara Telefone
function Phone(variavel) {
    variavel = variavel.replace(/\D/g,"");
    variavel = variavel.replace(/^(\d\d)(\d)/g,"($1) $2");
    variavel = variavel.replace(/(\d{4})(\d)/,"$1-$2");
    return variavel;
}