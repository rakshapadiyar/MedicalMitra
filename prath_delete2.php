
      

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
$query = "DELETE from vendor WHERE vendor_id='$id'";

if (mysqli_query($conn, $query)) 
{
    //If Delete is successful, user will be redirected to Display page
	header("Location: prath_disp.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}


//close connection
mysqli_close($conn);
?>
    
