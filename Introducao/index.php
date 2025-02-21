<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Código de cria</title>
</head>
<body>
  <?php $teste = [1,2,3,4,5,6] ?>
  <?php if(true): ?>
    <?php foreach($teste as $a):?>
    <h1>MOSTRA</h1>
    <?php endforeach; ?>
  <?php endif; ?>


  <?php 
    echo "Olá, mundo!";
  ?>

  <?php 
    $nome = "Kicula amor da minha vida"?>
    <h1>Nome: <?php echo $nome?></h1>

  
  <?php $nome = "Carlos"?>
  <?php 
    function exibirNome() {
      global $nome;
      echo $nome. "<br>";
    }
    exibirNome();
  ?>


  <?php 
    function contador() {
      static $num = 0;
      $num++;
      echo $num. "<br>";
    }
    contador();
    contador();
  ?>
  
</body>
</html>