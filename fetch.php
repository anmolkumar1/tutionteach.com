<?php

//fetch.php

$connect = new PDO('mysql:host=localhost;dbname=abcd2', 'root', '');

$query = "
SELECT * FROM detail
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $rating = count_rating($row['id'], $connect);
 $color = '';
 $output .= '
 <h3 class="text-primary">'.$row['FirstName'].'</h3>
 <h3 class="text-primary">'.$row['LastName'].'</h3>
 <ul class="list-inline" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">
 ';
 
 for($count=1; $count<=5; $count++)
 {
  if($count <= $rating)
  {
   $color = 'color:#ffcc00;';
  }
  else
  {
   $color = 'color:#ccc;';
  }
  $output .= '<li title="'.$count.'" id="'.$row['id'].'-'.$count.'" data-index="'.$count.'"  data-detail_id="'.$row['id'].'" data-rating="'.$rating.'" class="rating" style="cursor:pointer; '.$color.' font-size:16px;">&#9733;</li>';
 }
 $output .= '
 </ul>
 <p>'.$row["Email"].'</p>
 <label style="text-danger">'.$row["Subject"].'</label>
 <label style="text-danger">'.$row["City"].'</label>
 <p>thank you for your valuable feedback</p>
 <hr />
 ';
}
echo $output;

function count_rating($detail_id, $connect)
{
 $output = 0;
 $query = "SELECT AVG(rating) as rating FROM rating WHERE detail_id = '".$detail_id."'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 if($total_row > 0)
 {
  foreach($result as $row)
  {
   $output = round($row["rating"]);
  }
 }
 return $output;
}


?>