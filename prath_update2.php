<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "medical store");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$id= $_POST["id"];
$name = $_POST["vendor_name"];
$mob = $_POST["vmobile_no"];
$add = $_POST["vaddress"];

//Prepare query
$query = "UPDATE vendor SET vendor_name='$name', vmobile_no = '$mob', vaddress ='$add'WHERE vendor_id='$id'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: prath_disp.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
