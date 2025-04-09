//EXECUTAR MÁSCARAS
//Define o objeto e chama a função
function mascara(o, f) {
    objeto = o
    funcao = f
    setTimeout("executaMascara()", 1)
}

function executaMascara() {
    objeto.value = funcao(objeto.value)
}

//Máscara do Telefone
function telefone(variavel) {
    //A linha abaixo é responsável por remover tudo o que não é número
    variavel = variavel.replace(/\D/g,"")
    //A linha abaixo é responsável por adicionar parênteses em volta dos dois primeiros dígitos
    variavel = variavel.replace(/^(\d\d)(\d)/g,"($1) $2")
    //A linha abaixo é responsável de adicionar o hífen entre o quarto e o quinto dígito
    variavel = variavel.replace(/(\d{4})(\d)/,"$1-$2")
    return variavel
}

//Máscara do RG & CPF
function RGeCPF(variavel) {
    variavel = variavel.replace(/\D/g,"")
    //Coloca um ponto após o terceiro dígito
    variavel = variavel.replace(/(\d{3})(\d)/,"$1.$2")
    //Coloca um ponto após o sexto dígito
    variavel = variavel.replace(/(\d{3})(\d)/,"$1.$2")
    //Coloca o hífen após o sétimo dígito e permite apenas dois dígitos após o hífen
    variavel = variavel.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
    return variavel
}

//Máscara do CEP
function cep(variavel) {
    variavel = variavel.replace(/\D/g,"")
    variavel = variavel.replace(/(\d{2})(\d)/,"$1.$2")
    variavel = variavel.replace(/(\d{3})(\d{1,3})$/,"$1-$2")
    return variavel
}

//Máscara Data
function data(variavel) {
    variavel = variavel.replace(/\D/g,"")
    variavel = variavel.replace(/(\d{2})(\d)/,"$1/$2")
    variavel = variavel.replace(/(\d{2})(\d)/,"$1/$2")
    return variavel
}

//Máscara Cartão SUS
function CartaoSus(variavel) {
    variavel = variavel.replace(/\D/g,"")
    return variavel
}