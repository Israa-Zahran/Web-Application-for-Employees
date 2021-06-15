<!DOCTYPE html>
<html>
<head>

</head>
<body>

<h1> search data </h1>

<form action="" method="POST">
<input type="text" name="first_name" placeholder="type first name or last name  to search">

<input type="submit" name="search" value="search Data">

</form>
<?php

$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'employees');
if(isset($_POST['search'])){
    $dept =$_POST['first_name'];
 

   
   
  



    $query="SELECT * FROM employees  , dept_emp , departments  WHERE departments.dept_name = '$dept'  AND dept_emp.dept_no = departments.dept_no AND employees.emp_no = dept_emp.emp_no";
  
    $query_run=mysqli_query($con,$query);
     while ($row = mysqli_fetch_array($query_run)){
         ?>
         <form action="" method="POST">
         <input type="text" name="emp_no" value="<?php echo $row['dept_no']?> "/>
         <input type="text" name="birth_date" value="<?php echo $row['dept_name']?> "/>
         <input type="text" name="emp_no" value="<?php echo $row['emp_no']?> "/>
         <input type="text" name="birth_date" value="<?php echo $row['birth_date']?> "/>
         <input type="text" name="first_name" value="<?php echo $row['first_name']?> "/>
         <input type="text" name="last_name" value="<?php echo $row['last_name']?> "/>
         <input type="text" name="gender" value="<?php echo $row['gender']?> "/>
         <input type="text" name="hire_date" value="<?php echo $row['hire_date']?> "/>
       
         </form>
         <?php
     }
   

}

?> 

</body>
</html>