<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
        .bg {
  /* The image used */
  background-image: url("https://images.unsplash.com/photo-1540837115927-13018753fdf6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1088&q=80");

  /* Full height */
  height: 50%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
</head>
<body class="bg">
<h2 align="center">Stock</h2>
<a href="admin_home_page.html"><button type='button'text class='btn btn-primary' style='float:left;margin-left:15px;'>HOME</button></a>
<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "medical store");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$iname=$_GET["item_name"];

$query = "SELECT * FROM item where item_name='".$iname."'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>ITEM ID</th><th>ITEM Name</th><th>VENDOR ID</th><th>Available Stock</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["item_id"];
		$name = $row["item_name"];
		$vendor_id = $row["vendor_id"];
                $item_qty= $row["item_quantity"];
        echo "<tr><td>". $id ."</td><td>". $name ." </td><td>". $vendor_id ." </td><td>". $item_qty ."</td></tr>";
    }
	echo "</tbody></table>";
} 
else 
{
    echo "0 results";
}

//close connection
mysqli_close($conn);
?>

</body>


