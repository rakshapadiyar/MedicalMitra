<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
        .bg {
  /* The image used */
  background-image: url("https://i.pinimg.com/originals/43/a9/70/43a970700f2b9622e8ed34f08b252b3b.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

  </style>
</head>
<body class="bg">
<h2 align="center">Delete Vendor</h2>

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
<table>
	<tr><td>Vendor Name</td><td><?php echo $name; ?></td></tr>
	<tr><td>Mobile Number</td><td><?php echo $mob; ?></td></tr>
	<tr><td>Vendor Address</td><td><?php echo $add; ?></td></tr>
	
	<tr><td>Are you sure, you wan't to Delete?      .</td><td><a href='prath_delete2.php?id=<?php echo $id ?>'><button type='button' class='btn btn-primary'>Yes</button></a></td></tr>
</body>
</html>

