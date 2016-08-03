<?php
//Set input to a variable
$fname = strtolower($_POST["name"]);

//Find length of string
$flen = strlen($fname);

//Cycle through each letter of the string and print on a new line
for ($x = 0; $x<=$flen; $x++){
  print $fname[$x]. "<br/>";
}


 ?>
