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
<h2 align="center">All Items</h2>
<a href="item.html"><button type='button' class='btn btn-primary' style="float :right;margin-right:15px;">Add new item</button></a>
<a href="admin_home_page.html"><button type='button'text class='btn btn-primary' style='float:left;margin-left:15px;'>HOME</button></a>
<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "medical store");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM item";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>ITEM ID</th><th>ITEM Name</th><th>ITEM COSTPRICE</th><th>ITEM SALEPRICE</th><th>VENDOR ID</th><th>Item Quantity</th><th>OPTION</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["item_id"];
		$name = $row["item_name"];
		$cp = $row["item_costprice"];
		$sp = $row["item_saleprice"];
		$vendor_id = $row["vendor_id"];
                $item_qty= $row["item_quantity"];
        echo "<tr><td>". $id ."</td><td>". $name ." </td><td>". $cp ."</td><td>". $sp ." </td><td>". $vendor_id ." </td><td>". $item_qty ."</td><td> <a href='prathitem_update.php?id=". $id ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='prathitem_delete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
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

