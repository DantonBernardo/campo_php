<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exc 3</title>
</head>
<body>
  <h2>Digite sua frase:</h2>
  <form action="" method="POST">
    <input type="text" name="frase" placeholder="Digite algo..." required>
    <button type="submit">Enviar</button>
  </form>
  <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $frase = $_POST["frase"];
      $contrario = "";
      for ($i = strlen($frase)-1; $i >= 0; $i--){
        $contrario .= $frase[$i];
      }
      echo "<h2>A frase ao contrário é: $contrario</h2>";
    }
  ?>
</body>
</html>