<?php

//fetch.php

$connect = new PDO('mysql:host=localhost;dbname=abcd2', 'root', '');

if(isset($_POST["index"], $_POST["detail_id"]))
{
 $query = "
 INSERT INTO rating(detail_id, rating) 
 VALUES (:detail_id, :rating)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':detail_id'  => $_POST["detail_id"],
   ':rating'   => $_POST["index"]
  )
 );
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'done';
 }
}


?>