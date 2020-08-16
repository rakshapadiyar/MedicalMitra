<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
      .bg {
  /* The image used */
  background-image: url("https://i.pinimg.com/736x/59/89/59/5989599aefecb81702ed22924b04960f.jpg");

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
$cname= "";
$mob="";
$iname="";
$itemqty="";
$price="";



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

<h2 align="center">Update Bill</h2>
<div style="width:60%;margin-left: 250px;margin-top:140px">
	<form action="prathbill_update2.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id ?>" /> <!-- ID will be hidden, but need to be specified inorder to send id to next page-->
		<div class="form-group"><!--This is bootstrap class-->
			<label>Customer Name</label>
			<input type="text" name="customer_name" value="<?php echo $name; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Customer Phone</label>
			<input type="text" name="customer_phone" value="<?php echo $cphone; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Item Name</label>
			<input type="text" name="item_name" value="<?php echo $iname; ?>" class="form-control">
		</div>
                <div class="form-group">
			<label>Item Quantity</label>
			<input type="text" name="item_quantity" value="<?php echo $iqty; ?>" class="form-control">
		</div>
                 <div class="form-group">
			<label>Price</label>
			<input type="text" name="price" value="<?php echo $price; ?>" class="form-control">
		</div>
		<button type="submit" name="save" class="btn btn-default">Update</button>
	</form>
</div>

</body>
</html>
