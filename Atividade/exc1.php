<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exc 1</title>
</head>
<body>
  <h2>Digite algo:</h2>
  <form method="POST" action="">
    <input type="text" name="frase" placeholder="..." required>
    <button type="submit">Enviar</button>
  </form>

  <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $frase = $_POST["frase"];
      $resultado = "";

      for ($i = 0; $i < strlen($frase); $i++) {
        $char = $frase[$i];

        if (strpos("aeiouAEIOU", $char)) {
          $resultado .= "*";
        } else {
          $resultado .= $char;
        }
      }

      echo "<p>Frase sem vogais: <strong>$resultado</strong></p>";
    }
  ?>
</body>
</html>