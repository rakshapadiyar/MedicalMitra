<html>
<head>
	<title>Delete</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            .bg {
  /* The image used */
  background-image: url("https://cdn.nohat.cc/thumb/f/720/4601323286691840.jpg");

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
<h2 align="center">Delete Item</h2>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "medical store");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET["id"];
$name = "";
$cp = "";
$sp="";
$vid=$cp = "";
$sp="";

$query = "SELECT * FROM item where item_id=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		
		$id = $row["item_id"];
		$name = $row["item_name"];
		$cp = $row["item_costprice"];
		$sp = $row["item_saleprice"];
		$vendor_id = $row["vendor_id"];
                $item_qty= $row["item_quantity"];
	}
}

//close connection
mysqli_close($conn);
?>
<table>
	<tr><td>Item Name</td><td><?php echo $name; ?></td></tr>
	<tr><td>Item id</td><td><?php echo $id; ?></td></tr>
        
	
	<tr><td>Are you sure, you wan't to Delete?</td><td><a href='prathitem_delete2.php?id=<?php echo $id ?>'><button type='button' class='btn btn-primary'>Yes</button></a></td></tr>
</body>
</html>



