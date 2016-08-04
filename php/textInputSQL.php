<?php
require 'connect.php';
session_start();


class LetterImg {
  public $letter, $id, $location, $entry;

  public function __construct(){
      // Consruct the output
      $this->entry = "{$this->letter} <img src='..{$this->location}' style='width:30%;'/>";
  }
}

//Set input to a variable
$fname = strtolower($_POST["name"]);

//Find length of string
$flen = strlen($fname);

//Cycle through each letter of the string.
for ($x = 0; $x<=$flen; $x++){

  //Query database with corresponding letter
  $query = $dbh->query("SELECT * FROM letters WHERE letter = '$fname[$x]'");
  $query->setFetchMode(PDO::FETCH_CLASS, 'LetterImg');
    while($r = $query->fetch()){
      echo $r->entry . "<br/>";
      //print "<br/>";
  }
}
?>
