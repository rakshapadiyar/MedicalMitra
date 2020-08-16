<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
$id=$_POST["Vendor_Id"];
$name=$_POST["Vendor_Name"];
$mob=$_POST["Vendor_MobileNo"];
$add=$_POST["Vendor_Address"];
$sql = "INSERT INTO `vendor`(`vendor_id`,`vendor_name`, `vmobile_no`, `vaddress`) VALUES ('$id','$name',$mob,'$add')";
if ($conn->query($sql) === TRUE)
{
   header("Location: prath_disp.php"); 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>