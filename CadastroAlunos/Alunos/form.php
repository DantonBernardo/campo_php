<?php
session_start(); // Inicia a sessão
require('./cadastroAlunos.php'); // Inclui a classe CadastroAluno
require('./aluno.php'); // Inclui a classe Aluno

use Alunos\Aluno; // Usa a classe Aluno do namespace Alunos
use CadastroAlunos\CadastroAluno; // Usa a classe CadastroAluno do namespace CadastroAlunos

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $matricula = $_POST['matricula'] ?? '';
    $curso = $_POST['curso'] ?? '';

    // Valida se todos os campos foram preenchidos
    if (empty($nome) || empty($matricula) || empty($curso)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    // Cria um novo objeto Aluno com os dados do formulário
    $aluno = new Aluno($nome, $matricula, $curso);

    // Verifica se já existe um cadastro na sessão
    $cadastro = null;
    if (isset($_SESSION['cadastro']) && is_string($_SESSION['cadastro'])) {
        $cadastro = unserialize($_SESSION['cadastro']); // Recupera o cadastro da sessão
    } else {
        $cadastro = new CadastroAluno(); // Cria um novo cadastro se não existir
    }

    // Adiciona o aluno ao cadastro
    $cadastro->cadastrarAluno($aluno);
    // Armazena o cadastro atualizado na sessão
    $_SESSION['cadastro'] = serialize($cadastro);

    // Redireciona para a página de listagem
    header("Location: list.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
</head>
<body>
    <div class="container">
        <h2>Cadastrar Aluno</h2>
        <!-- Formulário para cadastrar um novo aluno -->
        <form action="form.php" method="POST">
            <input type="text" name="nome" placeholder="Nome do Aluno" required>
            <input type="text" name="matricula" placeholder="Matrícula" required>
            <input type="text" name="curso" placeholder="Curso" required>
            <button type="submit">Cadastrar</button>
        </form>
        <!-- Link para voltar à página de listagem -->
        <a href="list.php" class="back-btn">Voltar para Lista</a>
    </div>
</body>
</html>