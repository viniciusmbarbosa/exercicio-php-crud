<?php
require_once "conecta.php";

function selectAluno(PDO $conexao): array
{

$sql = "SELECT
id,
nome,
primeiro,
segunda,
(primeiro + segunda) / 2 as media
FROM alunos";

try {
    $consulta = $conexao->prepare($sql);
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $erro) {
    die("Erro ao carregar Aluno:".$erro->getMessage());
}
return $resultado;
}

function inserirAlunos(
    PDO $conexao,
    string $nome,
    float $primeiro,
    float $segunda
    
): void {

    $sql = "INSERT INTO alunos(
        nome, primeiro, segunda 
    )VALUES(
        :nome, :primeiro, :segunda
    )";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":primeiro", $primeiro, PDO::PARAM_STR);
        $consulta->bindValue(":segunda", $segunda, PDO::PARAM_STR);

        $consulta->execute();

    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}

function atualizarAluno(PDO $conexao, string $nome, int $id): void {
    $sql = "UPDATE alunos SET nome = :nome, primeiro = :primeiro, segundo = :segundo WHERE ID = :id";

    try {
        $consulta = $conexao->prepare($sql);

    }
}