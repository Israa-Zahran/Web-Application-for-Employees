<!DOCTYPE html>
<html>
<head>

</head>
<body>

<h1> search data </h1>

<form action="" method="POST">
<input type="text" name="first_name" placeholder="search range salary ex '6200-7200'">

<input type="submit" name="search" value="search Data">

</form>
<?php

$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'employees');


if(isset($_POST['search'])){
    $f=$_POST['first_name'];
 $token = strtok($f, "-");
 $min= $token;

   $token = strtok("-");
   $max=$token;


    $query="SELECT * FROM  salaries , employees WHERE salary BETWEEN '$min' AND '$max' AND salaries.emp_no = employees.emp_no ";
  
    $query_run=mysqli_query($con,$query);
     while ($row = mysqli_fetch_array($query_run)){
         ?>
         <form action="" method="POST">
         <input type="text" name="emp_no" value="<?php echo $row['emp_no']?> "/>
         <input type="text" name="first_name" value="<?php echo $row['first_name']?> "/>
         <input type="text" name="last_name" value="<?php echo $row['last_name']?> "/>
         
         <input type="text" name="hire_date" value="<?php echo $row['salary']?> "/>
       
         </form>
         <?php
     }
  




}

?> 

</body>
</html>