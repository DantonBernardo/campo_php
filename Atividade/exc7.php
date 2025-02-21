<?php 
  for ($i = 1; $i < 21; $i++){
    if (($i % 3) == 0){
      echo "<h1> x </h1>";
    } else {      
      echo "<h1>" . $i . "</h1>";
    }
  }
?>