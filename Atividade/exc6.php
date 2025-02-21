<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exc 6</title>
</head>

<body>
  <h2>Digite uma palavra:</h2>
  <form action="" method="POST">
    <input type="text" name="palavra" placeholder="..." required>
    <button type="submit">Enviar</button>
  </form>

  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $palavra = $_POST["palavra"];

      function palindromo($palavraAnalisada) {
        $contrario = strrev($palavraAnalisada);

        if ($contrario == $palavraAnalisada) {
          echo "<h3>Essa palavra é um palíndromo!</h3>";
        } else {
        echo "<h3>Essa palavra não é um palíndromo!</h3>";
        }
      }

      palindromo($palavra);
    }
  ?>

</body>

</html>