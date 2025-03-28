<?php

//Verificação de usuário logado
include('../Home/protect.php');

//Conectando BD
include('../connect.php');

// Inclui o arquivo com a função getLivros
include($_SERVER['DOCUMENT_ROOT'] . "/camporeal/EBooks/Home/getLivros.php");

// Chama a função getLivros() e atribui o resultado à variável $livros
$livros = getLivros($pdo);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livros</title>
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #2C3E50;
      color: #F5F5DC;
      display: flex;
      width: 100%;
      padding: 10px 20px;
      box-sizing: border-box;
      align-items: center;
    }

    header button {
      justify-content: end;
      margin-left: auto;
      color: #F5F5DC;
      text-transform: uppercase;
      background-color: #C94C4C;
      padding: 10px 20px;
      transition: .5s;
      cursor: pointer;
      border: none;
      border-radius: 10px;
    }

    header button:hover {
      background-color: rgb(117, 46, 46);
      transition: .5s;
    }

    header a {
      display: flex;
      text-decoration: none;
      margin-left: auto;
    }

    header button a:visited {
      text-decoration: none;
      color: #F5F5DC;
    }

    main {
      padding: 20px;
      background-color: #f4f4f9;
    }

    ul {
      list-style-type: none;
      padding: 0;
    }

    li {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      padding: 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    li:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    strong {
      font-size: 1.2em;
      color: #2c3e50;
    }

    a {
      text-decoration: none;
      color: #006d77;
      font-weight: bold;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #004d4d;
    }

    hr {
      border: 0;
      height: 1px;
      background-color: #e0e0e0;
      margin-top: 15px;
    }

    footer {
      background-color: #006D77;
      width: 100%;
      display: flex;
      text-align: center;
      justify-content: center;
      color: #fff;
      box-sizing: border-box;
      padding: 10px;
    }

    .green{
      background-color:rgb(13, 213, 80);
    }
    .green:hover{
      background-color:rgb(51, 187, 97);
    }
  </style>
</head>

<body>
  <header>
    <h2>GIGI Books</h2>
    <a href="http://localhost/camporeal/EBooks/Home/addLivro.php">
      <button class="green">Adicionar novo livro</button>
    </a>
    <a href="../logout.php">
      <button>Sair</button>
    </a>
  </header>
  <main>
    <ul>
      <!-- Listagem de todos os livros -->
      <?php foreach ($livros as $livro): ?>
        <li>
          <!-- Nome do livro -->
          <!-- 'htmlspecialchars' serve para converter o campo em entidade HTML (evitando vulnerabilidades) -->
          <strong><?= htmlspecialchars($livro['nome']) ?></strong><br>
          <!-- Descrição do livro -->
          <?= htmlspecialchars($livro['descricao']) ?><br>

          <!-- Botões para o livro -->
          <div style="display: flex; justify-content: space-between;">
            <!-- Link para ler PDF --> 
            <a href="<?= htmlspecialchars($livro['url']) ?>" target="_blank">Ler PDF</a> <br/>
            <div style="display: flex; gap: 50px;">
              <!-- Alterar livro -->
              <a href="http://localhost/camporeal/EBooks/Home/updateLivro.php?id=<?= $livro['id'] ?>">
                Alterar
              </a>
              <!-- Deletar livro -->
              <a href="deleteLivro.php? id=<?= htmlspecialchars($livro['id']) ?>" onclick="return confirm('Tem certeza que deseja deletar?');"> 
                Deletar
              </a>
            </div>
          </div>
        </li>
        <hr>
      <?php endforeach; ?>
    </ul>
  </main>
  <footer>&copy; Todos os direitos reservados</footer>
</body>
</html>