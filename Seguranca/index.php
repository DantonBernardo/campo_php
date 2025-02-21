<?php
$nome = "";
$email = "";
$mensagem = "";
$erroNome = "";
$erroEmail = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Validações de campos obrigatórios
  if (empty($_POST["nome"])) {
    echo "O campo NOME é obrigatório (tongao kkkkkkk)";
  } else {
    $nome = filter_input(
      type: INPUT_POST,
      var_name: "nome",
      filter: FILTER_SANITIZE_STRING,
    );
    if (empty($_POST["email"])) {
      $erroEmail = "O campo email é obrigatório (bobao)";
    } else {
      $email = filter_input(
        type: INPUT_POST,
        var_name: "email",
        filter: FILTER_VALIDATE_EMAIL,
      );
    }

    $mensagem = htmlspecialchars(
      string: $_POST["mensagem"],
      flags: ENT_QUOTES,
      encoding: "UTF-8"
    );
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Segurança</title>
</head>

<body>
  <h2>Formulário com Validação e Segurança</h2>
  <form
    method="POST"
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nome">Nome:</label>
    <input
      type="text"
      id="nome"
      name="nome"
      value="<?php echo $nome; ?>">
    <span style="color: red"> <?php echo $erroNome; ?> </span>
  </form>

  <br />

  <form
    method="POST"
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="Email">Email:</label>
    <input
      type="text"
      id="Email"
      name="Email"
      value="<?php echo $email; ?>">
    <span style="color: red"> <?php echo $erroEmail; ?> </span>
  </form>

  <br/>

  <form
    method="POST"
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="Mensagem">Mensagem:</label>
    <input
      type="text"
      id="Mensagem"
      name="Mensagem"
      value="<?php echo $mensagem; ?>">
  </form>
  
  <button
    type="submit"
    value="Enviar"
  >
    Enviar
  </button>

  <?php 
    //Exibe os dados processados, caso não aja erro
    if($_SERVER["REQUEST_METHOD"] == "POST" && empty($erroNome) && empty($erroEmail)){
      echo "<h3>Dados recebidos:</h3>";
      echo "<p>Nome:" . $nome . "</p>";
      echo "<p>Email:" . $email . "</p>";
      echo "<p>Mensagem:" . $mensagem . "</p>";
    }
  ?>
</body>
</html>