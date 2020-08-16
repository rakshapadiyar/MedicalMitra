<html>
    <head>
        <title>Update Item2</title>
        <style>.bg {
  /* The image used */
  background-image: url("https://images.unsplash.com/photo-1565184944956-70a161db60f4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}</style>
    </head>


    <body class="bg"><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medical store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
$id=$_POST["Item_Id"];
$name=$_POST["Item_Name"];
$cp=$_POST["Item_Costprice"];
$sp=$_POST["Item_Saleprice"];
$vendor_ids=$_POST["Vendor_Id"];
$item_qty=$_POST["item_quantity"];

$res= "select vendor_id from vendor where vendor_id= $vendor_ids";
$res1=mysqli_query($conn,$res);
$vendor_exist=FALSE;
if(mysqli_num_rows($res1) > 0)
{
    while($row=mysqli_fetch_assoc($res1))
    {
        $vendor_ids=$row["vendor_id"];
       $vendor_exist=true;
    }
}
else
{
 echo"<a href='item.html'><h2 align:'center'>Please enter valid vendor id<h2></a>";
}
if ( $vendor_exist==true)
{
$sql = "INSERT INTO `item`(`item_id`, `item_name`, `item_costprice`, `item_saleprice`, `vendor_id`,`item_quantity`) VALUES ('$id','$name','$cp','$sp','$vendor_ids','$item_qty')";
if ($conn->query($sql) === TRUE)
{
    echo "New record created successfully";
    header("Location: prathitem_disp.php"); 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

mysqli_close($conn);
?>
    </body>
</html>
