<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
  
    if(isset($_POST['save'])){

    $con=mysqli_connect("localhost","root","","employees") or die ("could not connect " . mysqli_error($con));

    mysqli_select_db($con,'employees')or die ("could not connect " . mysqli_error($con));

    $id = mysqli_real_escape_string($con, $_REQUEST['id']);

    $username = mysqli_real_escape_string($con, $_REQUEST['username']);
    $password = mysqli_real_escape_string($con, $_REQUEST['password']);

    $first_name = mysqli_real_escape_string($con, $_REQUEST['first_name']);


    

    $sql = "INSERT INTO users (id,username,password,first_name) VALUES ('$id', '$username', '$password', '$first_name')";
    if(mysqli_query($con, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute";
    }
    mysqli_close($con);


}

    ?>

    <form method="post" action=""> 
id :        <input type="text" name="id" required><br>
username :         <input type="text" name="username" required><br>
password :         <input type="password" name="password" required><br>
name :         <input type="text" name="first_name" required><br>

       

    <button type="submit" name="save">save</button>
    <!-- <button type="submit" name="get">get</button> -->
    </form>
</body>
</html>