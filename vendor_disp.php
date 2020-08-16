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

$sql = "SELECT vendor_id,vendor_name,vmobile_no,vaddress From vendor";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["vendor_id"]. " | Name: " . $row["vendor_name"]. " | Mobile Number: " . $row["vmobile_no"]. " | Address: " . $row["vaddress"]. " <br><br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
