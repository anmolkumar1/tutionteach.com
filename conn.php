<?php
 $conn = mysql_connect("localhost","root","");
mysql_select_db("abcd2");
if(!$conn)
	echo"error";
else
	echo"connected";



?>