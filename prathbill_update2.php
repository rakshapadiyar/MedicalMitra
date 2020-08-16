<?php

//connect to mysql & DB,  Format - 'localhost-username-password-databasename'
$conn = mysqli_connect("localhost", "root", "", "medical store");
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

//Get All Form Data
$id=$_POST["id"];
$cname=$_POST["customer_name"];
$mob=$_POST["customer_phone"];
$iname=$_POST["item_name"];
$itemqty=$_POST["item_quantity"];
$price=$_POST["price"];

$res="select item_id from item where item_name='".$iname."'";
$res1=mysqli_query($conn,$res);
$item_exist=FALSE;
$total= $itemqty * $price;

if(mysqli_num_rows($res1) > 0)
{
    while($row=mysqli_fetch_assoc($res1))
    {
        $iid=$row["item_id"];
       $item_exist=true;
    }
}
else
{
 echo"<a href='prathbill_disp.php'><h2 align:'center'>Please enter valid item<h2></a>";
}
if ( $item_exist==true)
{

//Prepare query
$query = "UPDATE `bill` SET `bill_id`='$id',`customer_name`='$cname',`customer_phone`='$mob',`item_id`='$iid',`item_name`='$iname',`item_quantity`='$itemqty',`price`='$price',`total`='$total' WHERE bill_id='$id'";

if (mysqli_query($conn, $query)) 
{
    //If update is successful, user will be redirected to Display page
	header("Location: prathbill_disp.php"); 
} 
else 
{
    echo "Error while updating Data to DB <br>" . mysqli_error($conn);
}

}
//close connection
mysqli_close($conn);

?>
