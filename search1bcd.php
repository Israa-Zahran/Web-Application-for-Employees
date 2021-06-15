<!DOCTYPE html>
<html>
<head>

</head>
<body>

<h1> search data </h1>

<form action="" method="POST">
<label for="num">Number of records:</label>
  <input type="text" id="num" name="num" value="100">
<input type="text" name="first_name" placeholder="type name / title / department">

<input type="submit" name="search" value="search Data">

</form>
<?php

$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'employees');



if(isset($_POST['search'])){
    $f=$_POST['first_name'];
    $numOfRecords = $_POST['num'];
 $token = strtok($f, " ");

 $first= $token;
   $token = strtok(" ");

   $last=$token;
   
   
  

//search upon name

    $query="SELECT * FROM employees WHERE (first_name = '$first' AND  last_name = '$last') OR first_name = '$f' OR last_name='$f' ";
  
    $query_run=mysqli_query($con,$query);
    $numOfRows = mysqli_num_rows($query_run);
    if ($numOfRecords>$numOfRows) {

        $numOfRecords = $numOfRows;
    }

    for($i=1; $i<=$numOfRecords; $i++){
        $row = mysqli_fetch_array($query_run);
       
      
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
     $query1="SELECT * FROM  titles  , employees  WHERE titles.emp_no=employees.emp_no AND  title='$f' ";
  
     $query_run1=mysqli_query($con,$query1);
    $numOfRows1 = mysqli_num_rows($query_run1);
  

    for($i=1; $i<=$numOfRows1; $i++){
        $row1 = mysqli_fetch_array($query_run1);
       
          ?>
          <form action="" method="POST">
          <input type="text" name="emp_no" value="<?php echo $row1['emp_no']?> "/>
          <input type="text" name="birth_date" value="<?php echo $row1['birth_date']?> "/>
          <input type="text" name="first_name" value="<?php echo $row1['first_name']?> "/>
          <input type="text" name="last_name" value="<?php echo $row1['last_name']?> "/>
          <input type="text" name="gender" value="<?php echo $row1['gender']?> "/>
          <input type="text" name="hire_date" value="<?php echo $row1['hire_date']?> "/>
          <input type="text" name="title" value="<?php echo $row1['title']?> "/>

        
          </form>
          <?php
      }

      //search upon department
      $query2="SELECT * FROM employees  , dept_emp , departments  WHERE departments.dept_name = '$f'  AND dept_emp.dept_no = departments.dept_no AND employees.emp_no = dept_emp.emp_no";
  
      $query_run2=mysqli_query($con,$query2);
    $numOfRows2 = mysqli_num_rows($query_run2);
   

    for($i=1; $i<= $numOfRows2; $i++){
        $row2 = mysqli_fetch_array($query_run2);
       
           ?>
           <form action="" method="POST">
           <input type="text" name="emp_no" value="<?php echo $row2['dept_no']?> "/>
           <input type="text" name="birth_date" value="<?php echo $row2['dept_name']?> "/>
           <input type="text" name="emp_no" value="<?php echo $row2['emp_no']?> "/>
           <input type="text" name="birth_date" value="<?php echo $row2['birth_date']?> "/>
           <input type="text" name="first_name" value="<?php echo $row2['first_name']?> "/>
           <input type="text" name="last_name" value="<?php echo $row2['last_name']?> "/>
           <input type="text" name="gender" value="<?php echo $row2['gender']?> "/>
           <input type="text" name="hire_date" value="<?php echo $row2['hire_date']?> "/>
         
           </form>
           <?php
  
       }









}

?> 

</body>
</html>