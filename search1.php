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
    $f=$_POST['first_name'];
 $token = strtok($f, " ");
//  $token1 = strtok($f, " ");

 $first= $token;
 $min= $token;
   $token = strtok(" ");
//    $token1 = strtok(" ");

   $last=$token;
   $max=$token;
   

//search upon name

    $query="SELECT * FROM employees WHERE (first_name = '$first' AND  last_name = '$last') OR first_name = '$f' OR last_name='$f' ";
  
    $query_run=mysqli_query($con,$query);
     while ($row = mysqli_fetch_array($query_run)){
         ?>
         <form action="" method="POST">
         <input type="text" name="emp_no" value="<?php echo $row['emp_no']?> "/>
         <input type="text" name="birth_date" value="<?php echo $row['birth_date']?> "/>
         <input type="text" name="first_name" value="<?php echo $row['first_name']?> "/>
         <input type="text" name="last_name" value="<?php echo $row['last_name']?> "/>
         <input type="text" name="gender" value="<?php echo $row['gender']?> "/>
         <input type="text" name="hire_date" value="<?php echo $row['hire_date']?> "/>
       
         </form>
         <?php
     }
     //search upon titels
     $query="SELECT * FROM  titles  , employees  WHERE titles.emp_no=employees.emp_no AND  title='$f' ";
  
     $query_run=mysqli_query($con,$query) or die( mysqli_error($con) );
      while ($row = mysqli_fetch_array($query_run)){
          ?>
          <form action="" method="POST">
          <input type="text" name="emp_no" value="<?php echo $row['emp_no']?> "/>
          <input type="text" name="birth_date" value="<?php echo $row['birth_date']?> "/>
          <input type="text" name="first_name" value="<?php echo $row['first_name']?> "/>
          <input type="text" name="last_name" value="<?php echo $row['last_name']?> "/>
          <input type="text" name="gender" value="<?php echo $row['gender']?> "/>
          <input type="text" name="hire_date" value="<?php echo $row['hire_date']?> "/>
          <input type="text" name="title" value="<?php echo $row['title']?> "/>

        
          </form>
          <?php
      }

      //search upon department
      $query="SELECT * FROM employees  , dept_emp , departments  WHERE departments.dept_name = '$f'  AND dept_emp.dept_no = departments.dept_no AND employees.emp_no = dept_emp.emp_no";
  
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

//search upon range salary

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