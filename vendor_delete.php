<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical store";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name=$_POST["Vendor_Name"];
$id=$_POST["Vendor_Id"];
$sql = "DELETE FROM `vendor` WHERE `vendor_id`='$id' and `vendor_name`='$name'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
