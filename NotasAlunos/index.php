<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Notas</title>
</head>

<body>
  <h2>Cadastro de Notas</h2>

  <form action="processar.php" method="post">
    <h3>Nome do Aluno:</h3>
    <input type="text" name="nome" required>

    <h3>Nota:</h3>
    <input type="number" name="nota" min="0" max="10" step="0.01" required>

    <button type="submit">
      Salvar
    </button>
  </form>

  <h2>Lista de Alunos e Notas</h2>
  <?php
  function listarNotas()
  {
    $arquivo = "notas.txt";

    if (filesize($arquivo) > 0) {
      $conteudo = file($arquivo, FILE_IGNORE_NEW_LINES);
      $soma = 0;
      $quantidade = 0;

      echo "<ul>";
      foreach ($conteudo as $linha) {
        list($nome, $nota) = explode(";", $linha);
        echo "<li><strong>$nome:</strong> $nota</li>";
        $soma += (float)$nota;
        $quantidade++;
      }
      echo "</ul>";

      if ($quantidade > 0) {
        $media = $soma / $quantidade;
        echo "<h3>Média das Notas: " . number_format($media, 2) . "</h3>";
      }
    } else {
      echo "<p>Nenhum aluno cadastrado.</p>";
    }
  }

  listarNotas();
  ?>
  <form action="excluir.php" method="post">
    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir todas as notas?');">
        Excluir Todas as Notas
    </button>
  </form>

</body>
</html>