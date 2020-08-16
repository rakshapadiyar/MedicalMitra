<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            .bg {
  /* The image used */
  background-image: url("https://cdn3.vectorstock.com/i/1000x1000/13/27/abstract-blue-medical-background-vector-19761327.jpg");

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
$mob = "";
$add="";

$query = "SELECT * FROM vendor where vendor_id=".$id;
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		$name = $row["vendor_name"];
		$mob = $row["vmobile_no"];
		$add = $row["vaddress"];
	}
}
//close connection
mysqli_close($conn);
?>

<h2 align="center">Update Vendor</h2>
<div style="margin-left:100px">
	<form action="prath_update2.php" method="POST" style="width:60%" >
		<input type="hidden" name="id" value="<?php echo $id ?>" /> <!-- ID will be hidden, but need to be specified inorder to send id to next page-->
		<div class="form-group"><!--This is bootstrap class-->
			<label>Vendor Name</label>
			<input type="text" name="vendor_name" value="<?php echo $name; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Vendor Mobile</label>
			<input type="text" name="vmobile_no" value="<?php echo $mob; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Vendor Address</label>
			<input type="text" name="vaddress" value="<?php echo $add; ?>" class="form-control">
		</div>
		<button type="submit" name="save" class="btn btn-default" style="background-color:#add8e6">Update</button>
	</form>
</div>

</body>
</html>