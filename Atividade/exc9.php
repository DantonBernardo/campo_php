<?php
  $termo1 = 0;
  $termo2 = 1;

  echo $termo1 . "</br>";
  echo $termo2 . "</br>";

  for ($i = 3; $i <= 10; $i++) {
    $proximoTermo = $termo1 + $termo2;
    echo $proximoTermo . "</br>";

    $termo1 = $termo2;
    $termo2 = $proximoTermo;
  }
?>