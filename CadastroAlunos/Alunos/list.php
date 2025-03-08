<?php
session_start(); // Inicia a sessão
require('./aluno.php'); // Inclui a classe Aluno
require('./cadastroAlunos.php'); // Inclui a classe CadastroAluno

use CadastroAlunos\CadastroAluno; // Usa a classe CadastroAluno do namespace CadastroAlunos

// Verifica se há um cadastro armazenado na sessão
$cadastro = null;
if (isset($_SESSION['cadastro']) && is_string($_SESSION['cadastro'])) {
    $cadastro = unserialize($_SESSION['cadastro']); // Recupera o cadastro da sessão
} else {
    $cadastro = new CadastroAluno(); // Cria um novo cadastro se não existir
}

// Obtém a lista de alunos cadastrados
$alunos = $cadastro->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
</head>
<body>
    <div class="container">
        <h2>Lista de Alunos</h2>
        <!-- Link para cadastrar um novo aluno -->
        <a href="form.php" class="add-btn">Cadastrar Novo Aluno</a>

        <?php if (!empty($alunos)): ?>
            <!-- Tabela para exibir a lista de alunos -->
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>Curso</th>
                </tr>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?= htmlspecialchars($aluno->getNome()); ?></td>
                        <td><?= htmlspecialchars($aluno->getMatricula()); ?></td>
                        <td><?= htmlspecialchars($aluno->getCurso()); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <!-- Mensagem exibida caso não haja alunos cadastrados -->
            <p class="no-data">Nenhum aluno cadastrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>