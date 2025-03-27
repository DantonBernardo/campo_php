<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Limpa todas as variáveis de sessão
$_SESSION = [];

// Destroi a sessão
session_destroy();

// Redireciona para a página inicial
header("Location: /camporeal/EBooks/index.php");
exit; // Garante que o script para de executar após o redirecionamento

?>
