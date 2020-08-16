<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            .bg {
  /* The image used */
  background-image: url("https://drexel.edu/~/media/Images/medicine/backgrounds/backgroundAbstractMolecules/mobile.ashx");

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
<h2 align="center">All Vendors</h2>

<a href="vendor.html"><button type='button' class='btn btn-primary' style="float :right;margin-right:15px;">Add new vendor</button></a> 
<a href="admin_home_page.html"><button type='button'text class='btn btn-primary' style='float:left;margin-left:15px;'>HOME</button></a>

<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "medical store");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM vendor";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>ID</th><th>Vendor name</th><th>Vendor Mobile</th><th>Vendor address</th><th>Options</th></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["vendor_id"];
		$name = $row["vendor_name"];
		$mob = $row["vmobile_no"];
		$add = $row["vaddress"];
        echo "<tr><td>". $id ."</td><td>". $name ." </td><td>". $mob ."</td><td>". $add ." </td><td><a href='prath_update.php?id=". $id ." '><button type='button' class='btn btn-primary '>Edit</button></a><a href='prath_delete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button></td></tr>";
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