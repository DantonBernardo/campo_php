<?php

//Conexão ao BD
include('./connect.php');

//Iniciando a sessão
session_start();

//Aviso de erro ao logar
$loginError = false;

//Verificação de login
if (isset($_POST['username']) && isset($_POST['password'])) { //Se os campos não estiverem vazios (isset) [...]

    //Login vazio
    if (empty($_POST['username'])) {
        echo "<span>Insira seu usuário!</span>";
    } else if (empty($_POST['password'])) {
        echo "<span>Insira sua senha!</span>";
    } else {
        // Pegando os dados do formulário
        $username = trim($_POST['username']); // Trim para tirar espaços antes e depois digitados
        $password = trim($_POST['password']);

        // Consulta no BD usando Prepared Statements (Evita SQL Injection)
        $sql = "SELECT * FROM usuarios WHERE nome = :username AND senha = :password";
        $stmt = $pdo->prepare($sql);
        //bindParam para melhor segurança
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Verificando se encontrou um usuário
        if ($stmt->rowCount() == 1) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Armazenamento dos dados na sessão
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            // Redirecionamento
            header("Location: /camporeal/EBooks/Home/index.php");
            exit();
        } else {
            $loginError = true;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    /* Resetando margens e preenchimentos padrão */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Corpo da página */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    /* Container do formulário */
    div {
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    /* Título */
    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    /* Labels */
    label {
      display: block;
      margin-bottom: 8px;
      font-size: 14px;
      color: #666;
    }

    /* Campos de entrada */
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
      color: #333;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      border-color: #007bff;
      outline: none;
    }

    /* Botão de envio */
    button[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
      background-color: #0056b3;
    }

    /* Mensagens de erro */
    span {
      color: red;
      font-size: 14px;
      text-align: center;
      display: block;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <div>
    <h1>Login</h1>
    <form action="" method="POST">
      <label>Usuário</label>
      <input type="text" name="username" placeholder="Nome" required>

      <label>Senha</label>
      <input type="password" name="password" placeholder="Senha" required>

      <?php 
      if ($loginError) {
        echo "<span>Dados incorretos!</span>";
      }
      ?>

      <button type="submit">ENTRAR</button>
    </form>
  </div>

</body>

</html>
