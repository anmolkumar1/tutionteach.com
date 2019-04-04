<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "abcd2");
 
// Check connection



if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$State = $_POST['State'];
$City = $_POST['City'];
$Class = $_POST['Class'];
$Subject = $_POST['Subject'];

// Attempt select query execution
$sql = "select * ,(select avg(rating) from rating where detail_id = id group by detail_id) as rank from detail";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
               
                echo "<th>First_name</th>";
                echo "<th>Last_name</th>";
                echo "<th>Email</th>";
				echo "<th>Fees_structure</th>";
				echo "<th>Contact_no</th>";
				echo "<th>Address</th>";
				echo "<th>rating</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
               
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
				echo "<td>" . $row['Fees'] . "</td>";
				echo "<td>" . $row['Contactno'] . "</td>";
				echo "<td>" . $row['Address'] . "</td>";
				echo "<td>" . $row['rank'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>


<!DOCTYPE html>
<html>
<head>
<tittle>Matches Found!</tittle>
<style>


body {
  
  background-color: pink;
  background-image: url("edu.jpg");
}






table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;};
}</style>
</head>
<body>

</body>
</html>