<?php
    require('./login.php'); // Inclui o arquivo de lógica de login
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
        <h2>Login</h2>
        <!-- Formulário de login -->
        <form action="login.php" method="POST">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <?php 
            // Exibe mensagem de erro, se houver
            if (!empty($_SESSION['erro'])) {
                echo "<p>{$_SESSION['erro']}</p>";
                unset($_SESSION['erro']); // Remove a mensagem de erro após exibição
            }
        ?>
    </div>
</body>
</html>