function mascara(o, f) {
    objeto = o;
    funcao = f;
    setTimeout("executaMascara()", 1);
}

function executaMascara() {
    objeto.value = funcao(objeto.value);
}

//Máscara nome
function nomePessoal(variavel) {
    variavel = variavel.replace(/[^a-zA-Z áÁéÉíÍóÓúÚçÇ]/g,"");
    return variavel;
}

//Máscara sobrenome
function sobrenomePessoal(variavel) {
    variavel = variavel.replace(/[^a-zA-Z áÁéÉíÍóÓúÚçÇ]/g,"");
    return variavel;
}

//Máscara rua
function ruaEndereco(variavel) {
    variavel = variavel.replace(/[^a-zA-Z áÁéÉíÍóÓúÚçÇ]/g,"");
    return variavel;
}

//Máscara bairro
function bairroEndereco(variavel) {
    variavel = variavel.replace(/[^a-zA-Z áÁéÉíÍóÓúÚçÇ]/g,"");
    return variavel;
}

//Máscara cidade
function cidadeEndereco(variavel) {
    variavel = variavel.replace(/[^a-zA-Z áÁéÉíÍóÓúÚçÇ]/g,"");
    return variavel;
}


//Máscara RG
function rgPessoal(variavel) {
    variavel = variavel.replace(/\D/g,"");
    variavel = variavel.replace(/(\d{3})(\d)/,"$1.$2");
    variavel = variavel.replace(/(\d{3})(\d)/,"$1.$2");
    variavel = variavel.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    return variavel;
}

//Máscara CPF
function cpfPessoal(variavel) {
    variavel = variavel.replace(/\D/g,"");
    variavel = variavel.replace(/(\d{3})(\d)/,"$1.$2");
    variavel = variavel.replace(/(\d{3})(\d)/,"$1.$2");
    variavel = variavel.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    return variavel;
}

//Máscara número (endereço)
function numeroEndereco(variavel) {
    variavel = variavel.replace(/\D/g,"");
    return variavel;
}

//Máscara CEP
function cepEndereco(variavel) {
    variavel = variavel.replace(/\D/g,"");
    variavel = variavel.replace(/(\d{5})(\d{1,3})$/,"$1-$2");
    return variavel;
}

//Máscara Telefone
function telefoneLogin(variavel) {
    variavel = variavel.replace(/\D/g,"");
    variavel = variavel.replace(/^(\d\d)(\d)/g,"($1) $2");
    variavel = variavel.replace(/(\d{4})(\d)/,"$1-$2");
    return variavel;
}