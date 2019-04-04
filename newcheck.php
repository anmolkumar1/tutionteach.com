<?php
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Email = $_POST['Email'];
$State = $_POST['State'];
$City = $_POST['City'];
$Address = $_POST['Address'];
$Class = $_POST['Class'];
$Subject = $_POST['Subject'];
$Contactno = $_POST['Contactno'];
$Fees = $_POST['Fees'];


if (!empty($FirstName) || !empty($LastName) || !empty($Address) || !empty($Email) ||
!empty($State) ||!empty($City) || !empty($Class) || !empty($Subject) || !empty($Contactno) ) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "abcd2";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From detail Where Email = ? Limit 1";
     $INSERT = "INSERT Into detail(FirstName, LastName, Email,State, City, Address, Class, Subject,Fees,Contactno) values(?, ?, ?, ?, ?, ?, ?,?,?,?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Email);
     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssssssii", $FirstName, $LastName, $Email, $State, $City, $Address, $Class, $Subject ,$Fees,$Contactno);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
