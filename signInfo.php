<?php
  
  if(isset($_POST['submit'])){

  $con=mysqli_connect("localhost","root","","employees") or die ("could not connect " . mysqli_error($con));

  mysqli_select_db($con,'employees')or die ("could not connect " . mysqli_error($con));

  $id = mysqli_real_escape_string($con, $_REQUEST['id']);

  $username = mysqli_real_escape_string($con, $_REQUEST['username']);
  $password =MD5( mysqli_real_escape_string($con, $_REQUEST['password']));

  $first_name = mysqli_real_escape_string($con, $_REQUEST['first_name']);


  

  $sql = "INSERT INTO user (id,username,password,first_name) VALUES ('$id', '$username', '$password', '$first_name')";
  if(mysqli_query($con, $sql)){
      echo "<script>alert('Records added successfully.')</script>";

  } else{
   
      echo "<script>alert('ERROR: Could not able to execute')</script>";

  }
  mysqli_close($con);


}

  ?>
  <!DOCTYPE html>
  <head>
      <style>
center{

}
button{

}
      </style>
</head>
<body>
    <center>
<!-- <form action="mainpage.php" method="post"> -->
    <button onclick="location.href = 'mainpage.php';" >Move To Main Page</button>
<!-- </form> -->
</center>

</body>