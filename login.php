<?php
  $con=mysqli_connect("localhost","root","","medical store");
  if($con->connect_error)
  {
      die("Connection failed".$con->connect_error);
  }
  $username=$_POST["username"];
  $password=$_POST["password"];
  $sql = "SELECT * FROM login WHERE username='".admin."' and password='".admin."'";
  $result = $con->query($sql);
  if ($result->num_rows==TRUE)
  {
      $SESSION['username']='".admin."';
      header('Location:admin_home_page.html');
  }
  else
  {
      echo '<script type="text/javascript">
       alert("Wrong username/password");
        </script> ';
       
  }
  mysqli_close($con);
    