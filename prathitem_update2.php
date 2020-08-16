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


<body class="bg">
<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "medical store");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$id=$_POST["id"];
$name=$_POST["item_name"];
$cp=$_POST["item_costprice"];
$sp=$_POST["item_saleprice"];
$vid=$_POST["vendor_id"];
$item_qty=$_POST["item_quantity"];
$res= "select vendor_id from vendor where vendor_id= $vid";
$res1=mysqli_query($conn,$res);
$vendor_exist=FALSE;
if(mysqli_num_rows($res1) > 0)
{
    while($row=mysqli_fetch_assoc($res1))
    {
        $vid=$row["vendor_id"];
       $vendor_exist=true;
    }
}
else
{
 echo"<a href='prathitem_disp.php'><h2 align:'center'>Please enter valid vendor id<h2></a>";
}
if ( $vendor_exist==true)
{

//Prepare query
$query = "UPDATE item SET item_name='$name', item_costprice = '$cp', item_saleprice ='$sp' ,vendor_id='$vid',item_quantity='$item_qty' WHERE item_id='$id'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: prathitem_disp.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}

}
//close connection
mysqli_close($conn);

?>
</body>
</html>
