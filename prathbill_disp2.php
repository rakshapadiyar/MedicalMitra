<html>
<head>
	<title>Bill Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            .bg {
  /* The image used */
  background-image: url("https://static.vecteezy.com/system/resources/previews/000/543/692/non_2x/vector-medical-abstract-background-polygon-and-dot-line-graphic-design-element-blue-and-white-tone-for-modern-science-futuristic-wallpaper-cover-concept-digital-network-of-health-care-template-theme.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
        </style>
</head>
<body class="bg">
<a href="admin_home_page.html"><button type='button'text class='btn btn-primary' style='float:left;margin-left:15px;'>HOME</button></a>
<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "medical store");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET["id"];

$query = "SELECT * FROM bill where bill_id=$id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>Bill ID</th><th>Customer Name</th><TH>Customer Phone</TH><TH>Item Name</TH><TH>Item Quantity</TH><TH>Price</TH><th>Total Cost</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["bill_id"];
		$name = $row["customer_name"];
                $cphone = $row["customer_phone"];
                $iname = $row["item_name"];
                $iqty = $row ["item_quantity"];
                $price = $row ["price"];
                $total = $row ["total"];
        echo "<tr><td>". $id ."</td><td>". $name ." </td><td>". $cphone ." </td><td>". $iname ." </td><td>". $iqty ." </td><td>". $price ." </td><td>". $total ." </td>";
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
