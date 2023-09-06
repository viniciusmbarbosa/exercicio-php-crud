const formulario = document.querySelector("form");
const inputPrimeiro = formulario.querySelector("#primeira");
const inputSegunda = formulario.querySelector("#segunda");
const inputMedia = formulario.querySelector("#media");
const inputSituacao = formulario.querySelector("#situacao");

let primeiro, segunda, media, situacao;

function atualizarMedia(nota1, nota2){
    return (nota1 + nota2) / 2;
}

function atualizarSituacao(resultadoDaMedia){
        if(resultadoDaMedia >= 7){
            situacao = "aprovado";
        }else if(resultadoDaMedia >= 5){
            situacao = "recuperacao";
        }else{
            situacao = "reprovado";
        }
        return situacao;
}
inputPrimeiro.addEventListener("input", function(){
    primeiro = parseFloat(this.value);
    media = atualizarMedia(primeiro, parseFloat(inputSegunda.value));
    inputMedia.value = media.toFixed(2);
    inputSituacao.value = atualizarSituacao(media);
});

inputSegunda.addEventListener("input", function(){
    segunda = parseFloat(this.value);
    media = atualizarMedia( parseFloat(inputSegunda.value), segunda);
    inputMedia.value = media.toFixed(2);
    inputSituacao.value = atualizarSituacao(media);
});
