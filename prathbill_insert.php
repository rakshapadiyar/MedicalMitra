<?php
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
$id=$_POST["bill_id"];
$cname=$_POST["customer_name"];
$mob=$_POST["customer_phone"];
$iname=$_POST["item_name"];
$itemqty=$_POST["item_quantity"];
$price=$_POST["price"];



$res="select item_id from item where item_name='".$iname."'";

$res1=mysqli_query($conn,$res);
$itemname_exist=false;
$total= $itemqty * $price;
if(mysqli_num_rows($res1)>0)
{
    while($row=mysqli_fetch_assoc($res1))
    {
        $iid=$row["item_id"];
       $itemname_exist=true;
    }
}
else
{
 echo"<a href='purchase.html'><h2 align:'center'>Please enter valid item name<h2></a>";
}
if ( $itemname_exist==true)
{
$sql = "INSERT INTO `bill`(`bill_id`, `customer_name`, `customer_phone`, `item_id`, `item_name`, `item_quantity`,`price`,`total`) VALUES ('$id','$cname','$mob','$iid','$iname','$itemqty','$price','$total')";
$sql2= "Update `item` set item_quantity= item_quantity-'$itemqty'  where item_name='".$iname."'"; 
if ($conn->query($sql) === TRUE and $conn->query($sql2) ===TRUE)
{
    echo "New record created successfully";
    header("Location: prathbill_disp.php"); 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

mysqli_close($conn);
?>

