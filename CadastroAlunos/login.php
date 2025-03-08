<?php
session_start();

$login = 'login';
$senha = '123';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $usuarioInserido = $_POST['usuario'];
    $senhaInserida = $_POST['senha'];

    if ($usuarioInserido == $login && $senhaInserida == $senha) {
        $novaUrl = 'alunos/list.php';
        header('Location: ' . $novaUrl);
        exit();
    } else {
        $_SESSION['erro'] = "Usuário ou senha incorretos.";
        header('Location: index.php');
        exit();
    }
}
?>