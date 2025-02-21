<?php
  function removerEspacos($frase) {
    return str_replace(' ', '', $frase);
  }

  $texto = "Essa frase não contém espaços";
  $textoSemEspacos = removerEspacos($texto);
  echo $textoSemEspacos;
?>