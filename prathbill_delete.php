<html>
<head>
	<title>Delete Bill</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            .bg {
  /* The image used */
  background-image: url("https://img.freepik.com/free-vector/abstract-medical-wallpaper-template-design_53876-61803.jpg?size=626&ext=jpg");

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
<h2 align="center">Delete Bill</h2>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "medical store");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];
$name = "";
$mob = "";
$add="";

$query = "SELECT * FROM bill where bill_id=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		
		$id = $row["bill_id"];
		$name = $row["customer_name"];
                $cphone = $row["customer_phone"];
                $iname = $row["item_name"];
                $iqty = $row ["item_quantity"];
                $price = $row ["price"];
                $total = $row ["total"];
	}
}

//close connection
mysqli_close($conn);
?>
<table>
        
	<tr><td>Customer Name</td><td><?php echo $name ; ?></td></tr>
	<tr><td>Item name</td><td><?php echo $iname; ?></td></tr>
	<tr><td>Item Quantity</td><td><?php echo $iqty; ?></td></tr>
        <tr><td>Price</td><td><?php echo $price ; ?></td></tr>
        <tr><td>Total cost</td><td><?php echo $total ; ?></td></tr>


	
	<tr><td>Are you sure, you wan't to Delete?</td><td><a href='prathbill_delete2.php?id=<?php echo $id ?>'><button type='button' class='btn btn-primary'>Yes</button></a></td></tr>
</body>
</html>

