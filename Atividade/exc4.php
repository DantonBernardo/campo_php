<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exc 4</title>
</head>
<body>
  <h2>Digite um número:</h2>
  <form method="POST" action="">
    <input type="number" name="numero" placeholder="Digite um número..." required>
    <button type="submit">Enviar</button>
  </form>

  <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $numero = $_POST["numero"];
      $result = "";

      if ($numero == 0){
        echo "<h2>Esse número é nulo!</h2>";
      } elseif ($numero > 0){
        echo "<h2>Esse número é positivo!</h2>";
      } elseif ($numero < 0){
        echo "<h2>Esse número é negativo!</h2>";
      }
    }
  ?>
</body>
</html>