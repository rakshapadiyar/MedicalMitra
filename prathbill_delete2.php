<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "medical store");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
//get ID
$id= $_GET["id"];


//Prepare Query
$query = "DELETE from bill WHERE bill_id='$id'";

if (mysqli_query($conn, $query)) 
{
    //If Delete is successful, user will be redirected to Display page
	header("Location: prathbill_disp.php"); 
} 
else 
{
    echo "Error while deleting Data from DataBase <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>