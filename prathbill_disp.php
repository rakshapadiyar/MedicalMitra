<html>
<head>
	<title>Bill Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
        .bg {
  /* The image used */
  background-image: url("https://static.vecteezy.com/system/resources/previews/000/586/788/non_2x/blur-bokeh-light-effect-with-blue-sky-vector-abstract-background.jpg");

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
<h2 align="center">All Bill </h2>
<a href="purchase.html"><button type='button' class='btn btn-primary' style="float :right;margin-right:15px;">Add new Bill</button></a>
<a href="admin_home_page.html"><button type='button'text class='btn btn-primary' style='float:left;margin-left:15px;'>HOME</button></a>
<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "medical store");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}


$query = "SELECT * FROM bill ";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
	echo "<table class='table'><thead class='thead-dark'> <tr><th>Bill ID</th><th>Customer Name</th><TH>Options</TH></tr></thead>";
	echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) 
	{
		$id = $row["bill_id"];
		$name = $row["customer_name"];
        echo "<tr><td>". $id ."</td><td>". $name ." </td><td> <a href='prathbill_update.php?id=". $id ." '><button type='button' class='btn btn-primary'>Edit</button></a><a href='prathbill_delete.php?id=". $id ." '><button type='button' class='btn btn-danger'>Delete</button><a href='prathbill_disp2.php?id=". $id ." '><button type='button' class='btn btn-danger'>Details</button></td>";
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


