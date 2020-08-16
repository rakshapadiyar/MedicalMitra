
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
$id=$_POST["Vendor_Id"];
$name=$_POST["Vendor_Name"];
$mob=$_POST["Vendor_MobileNo"];
$add=$_POST["Vendor_Address"];
$result = $conn->query("SELECT `id` FROM `vendor` WHERE `vendor_id`=$id");
if($result>0)
{
$sql="UPDATE `vendor` SET `vendor_name`='$name',`vmobile_no`=$mob,`vaddress`='$add' WHERE `vendor_id`=$id";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
else
{
    echo "ID does not exist in table <br>Error:". mysqli_error($conn);
}


mysqli_close($conn);
?>
