<?php
require_once "./src/funcoes-alunos.php";
$listaDeAlunos = selectAluno($conexao);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">


    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>
    
    <?php
    foreach($listaDeAlunos as $alunos){?>
    <article>
        <p>
            Nome do Aluno: <?=$alunos['nome']?>
        </p>
    
        <p>
            Primeira nota: <?=$alunos['primeiro']?>
        </p>
        <p>
            Segunda nota: <?=$alunos['segunda']?>
        </p>
        </article>
  <?php }  ?>
  

    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>