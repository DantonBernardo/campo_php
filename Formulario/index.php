<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form PHP</title>
</head>
<body>
  <h2>Digite seu nome:</h2>
  <form method="POST" action="">
    <input type="text" name="nome" placeholder="Digite seu nome..." required>
    <button type="submit">Enviar</button>
  </form>
  <h2>Digite seu ano de nascimento:</h2>
  <form method="POST" action="">
    <input type="number" name="ano" placeholder="Ano..." required>
    <button type="submit">Enviar</button>
  </form>

  <?php 
    //Verificar form enviado
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $nome = $_POST["nome"];
      echo "<h3>Olá, $nome! Seja bem-vindo!</h3>";
    }
  ?>
  <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $idade = 2025 - $_POST["ano"];
      echo "<h3>Sua idade é $idade</h3>";
    }
  ?>
</body>
</html>