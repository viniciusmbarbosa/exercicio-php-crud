<?php
require_once "./src/funcoes-alunos.php";
require_once "./src/ultilidades-func.php";
$listaDeAlunos = selectAluno($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">


    <h1>Lista de alunos</h1>
    <hr>
    <p><a class="btn btn-primary" href="inserir.php">Inserir novo aluno</a></p>
    <?php
    foreach($listaDeAlunos as $alunos){?>

    
    
    <div class="row">
        <article class="col">
        
                <p>
                    Nome do Aluno: <?=$alunos['nome']?>
                </p>
                <p class="">
                    Primeira nota: <?=$alunos['primeiro']?>
                </p>
                <p>
                    Segunda nota: <?=$alunos['segunda']?>
                </p>
        
                <p>Média: <?= resultadoMedia($alunos['primeiro'], $alunos['segunda'] )?></p>
                <p>
                    Resultado: <?=resultado(resultadoMedia($alunos['primeiro'], $alunos['segunda']))?>
                </p>
        
        
            </article>
        
        <p><a class="btn btn-primary" href="atualizar.php?id=<?=$alunos["id"]?>">Atualizar dados aluno</a></p>
        <p><a class="btn btn-danger" href="excluir.php?id=<?=$alunos["id"]?>">Excluir Aluno</a></p>
        
    </div>
  <?php }  ?>
        
  

    <p><a class="btn btn-secondary" href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>