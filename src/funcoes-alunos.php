<?php
require_once "conecta.php";

function selectAluno(PDO $conexao): array
{

$sql = "SELECT
id,
nome,
primeiro,
segunda
FROM alunos";

try {
    $consulta = $conexao->prepare($sql);
    $consulta->execute();
                                          //trás array associativo      
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

function lerUmAluno(PDO $conexao, int $id){
    $sql = "SELECT * FROM  alunos where id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("Erro ao carregar dados:".$erro->getMessage());
        
    }
    return $resultado;
};

 function atualizarAluno(PDO $conexao, string $nome, float $primeiro, float $segunda, int $id): void {
    $sql = "UPDATE alunos SET nome = :nome, primeiro = :primeiro, segunda = :segunda WHERE ID = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":primeiro", $primeiro, PDO::PARAM_INT);
        $consulta->bindValue(":segunda", $segunda, PDO::PARAM_INT);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
    }catch(Exception $erro){
        die("Erro ao atualizar: ".$erro->getMessage());
    }
};


  
  function excluirAluno(PDO $conexao, int $id) : void
  {
      $query = "DELETE FROM alunos WHERE id = :id";
  
      try {
          $consulta = $conexao->prepare($query);
          $consulta->bindValue(":id", $id, PDO::PARAM_INT);
          $consulta->execute();
      } catch (Exception $e) {
          die("Erro ao deletar: " . $e->getMessage());
      }
  }