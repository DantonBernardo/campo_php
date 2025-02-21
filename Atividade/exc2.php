<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exc 2</title>
</head>
<body>
  <h2>Digite um número:</h2>
  <form action="" method="POST">
    <input type="number" name="numero" placeholder="Digite um número..." required>
    <button type="submit">Enviar</button>
  </form>
  <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $numero = $_POST["numero"];
      if (($numero % 2) == 0){
        echo "<h2>Esse número é par!</h2>";
      } else {
        echo "<h2>Esse número é impar!</h2>";
      }
    }
  ?>
</body>
</html>