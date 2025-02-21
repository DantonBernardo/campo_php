<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exc 5</title>
</head>

<body>
  <h2>Digite uma frase:</h2>
  <form action="" method="POST">
    <input type="text" name="frase" placeholder="..." required>
    <button type="submit">Enviar</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = $_POST["frase"];
    $palavras = explode(" ", $frase);
    $numero_palavras = count($palavras);

    echo "Número de palavras: $numero_palavras<br>";
    echo "Palavras:<br>";

    foreach ($palavras as $palavra) {
      echo "$palavra<br>";
    }
  }
  ?>
</body>
</html>