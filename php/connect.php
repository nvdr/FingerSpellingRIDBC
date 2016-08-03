<?php
//Server login variables
$dsn = 'mysql:host=localhost;dbname=letters';
$user = "root";
$pass = "root";

//Try connecting to database
try {
    $dbh = new PDO($dsn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    foreach($dbh->query('SELECT * from letters') as $row) {
        //print_r($row);
        //print_r("<br/>");
    }
    //$dbh = null;

// Catch exception if connection fails.
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


class GuestBook {
  public $letter, $id, $entry;

  public function __construct(){
    $this->entry = "{$this->letter} is awesome";
  }

}

//Query database
$query = $dbh->query('SELECT * FROM letters');
$query->setFetchMode(PDO::FETCH_CLASS, 'GuestBook');
while($r = $query->fetch()){
  echo $r->entry . "<br/><br/>";
  //print "<br/>";
}

?>
