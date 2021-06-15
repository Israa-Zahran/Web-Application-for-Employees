<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: log.php");

}
?>
<!DOCTYPE html>
<html>
<title> Insert New Employee Information </title>
    
<head>
    <style>
        body{
            background-color:rgb(236, 198, 198);
        }
        pre{
            font-family: Arial, Helvetica, sans-serif;
        font-size:20px;
        }
        button{
            font-size:18px;
            color:white;
        background-color:black;
        }
        center{
            text-decoration: underline;
        }
        .btn{
            float:right;
            font-size:15px;

        }
        </style>
</head>
<body>


<?php
  
    if(isset($_POST['save'])){

    $con=mysqli_connect("localhost","root","","employees") or die ("could not connect " . mysqli_error($con));

    mysqli_select_db($con,'employees')or die ("could not connect " . mysqli_error($con));
    $dept_no = mysqli_real_escape_string($con, $_REQUEST['dept_no']);

    $dept_name = mysqli_real_escape_string($con, $_REQUEST['dept_name']);

    $sql = "INSERT INTO departments (dept_no,dept_name) VALUES ('$dept_no', '$dept_name')";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Records added successfully.')</script>";
    } else{
      
        echo "<script>alert('ERROR: Could not able to execute, check the department no')</script>";
    }
    mysqli_close($con);


}

    ?>

    <button class="btn" onclick="location.href = 'depInfo.php';" >Department Page</button>
   <center> <h1>Fill the Form </h1></center><br>
    <form method="post" action=""> 
<pre>                     department no :        <input type="text" name="dept_no"><br></pre>
<pre>                     department Name :         <input type="text" name="dept_name"><br></pre>

<pre>                     <button type="submit" name="save">Insert</button></pre>
    <!-- <button type="submit" name="get">get</button> -->
    </form>
    
</body>
</html>