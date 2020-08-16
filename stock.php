<html>
<head>
	<title>Stock</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            .bg {
  /* The image used */
  background-image: url("https://static.vecteezy.com/system/resources/previews/000/543/740/non_2x/medical-abstract-background-polygon-and-dot-line-graphic-design-element-blue-and-white-tone-for-modern-science-futuristic-wallpaper-cover-concept-digital-network-of-health-care-template-theme-vector.jpg");

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
<h2 align="center">Available Stock</h2>
<br>
<a href="admin_home_page.html"><button type='button'text class='btn btn-primary' style='float:left;margin-left:15px;'>HOME</button></a>
<hr>
<div style="width:60%;margin-left: 550px;margin-top:140px">
    <br>
    <br>
    <h4>Enter the item name </h4>
  <form action="stock2.php" method="get">
     <label for="item_name" style="margin-top:7px"></label>
     <input type="text" id="item_name" name="item_name" placeholder="Item Name" style="width:30%"><br>
    <input type="submit" value="Submit" style="background-color: #ccccff;margin-top:20px">
  </form>
</div>

</body>


