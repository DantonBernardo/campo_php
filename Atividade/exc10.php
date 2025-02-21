<?php
  function ehPangrama($texto) {
    $texto = strtolower($texto);
    $alfabeto = range('a', 'z');
    foreach ($alfabeto as $letra) {
      if (strpos($texto, $letra) === false) {
        return false;
      }
    }
    return true;
  }

  $texto1 = "The quick brown fox jumps over the lazy dog";
  $texto2 = "Olá, mundo!";

  echo ehPangrama($texto1) ? "É um pangrama!</br>" : "Não é um pangrama.</br>";
  echo ehPangrama($texto2) ? "É um pangrama!</br>" : "Não é um pangrama.</br>";
?>