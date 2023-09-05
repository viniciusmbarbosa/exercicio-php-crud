<?php
require_once "src/funcoes-alunos.php";
require_once "src/ultilidades-func.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$aluno = lerUmAluno($conexao, $id);

if (isset($_POST['atualizar-dados'])) {
    $nome = filter_input(
        INPUT_POST,
        "nome",
        FILTER_SANITIZE_SPECIAL_CHARS
    );

    $primeiro = filter_input(
        INPUT_POST,
        "primeiro",
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
    );

    $segunda = filter_input(
        INPUT_POST,
        "segunda",
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
    );

    atualizarAluno($conexao, $nome, $primeiro, $segunda, $id);

    header("location:visualizar.php?status=sucesso");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Atualizar dados do aluno </h1>
        <hr>

        <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>

        <form action="#" method="post">

            <p><label for="nome">Nome:</label>
                <input value="<?=$aluno['nome']?>" type="text" name="nome" id="nome" required>
            </p>

            <p><label for="primeira">Primeira nota:</label>
                <input value="<?=$aluno['primeiro']?>" name="primeiro" type="number" id="primeira" step="0.01" min="0.00" max="10.00" required>
            </p>

            <p><label for="segunda">Segunda nota:</label>
                <input value="<?=$aluno['segunda']?>" name="segunda" type="number" id="segunda" step="0.01" min="0.00" max="10.00" required>
            </p>



            <p>
                <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
                <label for="media">Média:</label>
                <input value="<?=resultadoMedia($aluno['primeiro'], $aluno['segunda'])?>" name="media" type="number" id="media" step="0.01" min="0.00" max="10.00" readonly disabled>
            </p>

            <p>
                <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
                <label for="situacao">Situação:</label>
                <input value="<?=resultado(resultadoMedia($aluno['primeiro'], $aluno['segunda'])) ?>" type="text" name="situacao" id="situacao" readonly disabled>
            </p>

            <button type="submit" name="atualizar-dados">Atualizar dados do aluno</button>
        </form>

        <hr>
        <p><a href="visualizar.php">Voltar à lista de alunos</a></p>

    </div>


</body>

</html>