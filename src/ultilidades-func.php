<?php

function resultadoMedia(float $primeiro, float $segunda):string{
    $media = ($primeiro + $segunda) / 2;
    return number_format($media, 2);
}

// Situação de Aluno

function resultado(float $media):string {
    if ($media >= 7) {
        $mensagem = "Aprovado";
    } elseif($media < 5) {
        $mensagem = "Reprovado";
    } else{
        $mensagem = "Recuperação";
    }
    return $mensagem;
}


?>