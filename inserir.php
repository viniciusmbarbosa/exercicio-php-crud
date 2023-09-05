<?php
require_once "./src/funcoes-alunos.php";

if (isset($_POST['inserir'])){
	$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);

	$primeiro = filter_input(
		INPUT_POST, "primeira", FILTER_SANITIZE_NUMBER_FLOAT,
		FILTER_FLAG_ALLOW_FRACTION
	);

	$segunda = filter_input(
		INPUT_POST, "segunda", FILTER_SANITIZE_NUMBER_FLOAT,
		FILTER_FLAG_ALLOW_FRACTION
	);

	inserirAlunos($conexao, $nome, $primeiro, $segunda);
	header("location:visualizar.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">b

<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form class="mb-3" action="#" method="post">
	    <p><label class="form-labe" for="nome">Nome:</label>
	    <input name="nome" type="text" id="nome" required></p>
        
      <p><label for="primeira">Primeira nota:</label>
	    <input name="primeira" type="number" id="primeira" step="0.01" min="0.00" max="10.00" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input type="number" name="segunda" id="segundo" step="0.01" min="0.00" max="10.00" required></p>
	    
      <button name="inserir" >Cadastrar aluno</button>
	</form>

    <hr>
    <p><a class="btn btn-secondary" href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>