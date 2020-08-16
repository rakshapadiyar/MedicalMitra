<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            .bg {
  /* The image used */
  background-image: url("https://images.unsplash.com/photo-1567427361940-521d3e67e193?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1008&q=80");

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
$vid="";
$item_qty="";


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
    <h2 align="center">Update Item</h2>
    <div style="margin-left:370px">


<form action="prathitem_update2.php" method="post" style="width:65%">
		<input type="hidden" name="id" value="<?php echo $id ?>" /> <!-- ID will be hidden, but need to be specified inorder to send id to next page-->
		<div class="form-group"><!--This is bootstrap class-->
			<label>Item Name</label>
			<input type="text" name="item_name" value="<?php echo $name; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Item Costprice</label>
			<input type="text" name="item_costprice" value="<?php echo $cp; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Item Saleprice</label>
			<input type="text" name="item_saleprice" value="<?php echo $sp; ?>" class="form-control">
		</div>
                <div class="form-group">
			<label>Vendor ID</label>
			<input type="text" name="vendor_id" value="<?php echo $vendor_id; ?>" class="form-control">
		</div>
                <div class="form-group">
			<label>Item Quantity</label>
			<input type="text" name="item_quantity" value="<?php echo $item_qty; ?>" class="form-control">
		</div>
		<button type="submit" name="save" class="btn btn-default">Update</button>
	</form>
</div>

</body>
</html>