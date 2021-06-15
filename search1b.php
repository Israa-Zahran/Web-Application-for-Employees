<?php
// session_start();
// if (!isset($_SESSION['uname'])) {
//     header("location: log.php");

// }
?>
<!DOCTYPE html>
<html>
<head>
<title> Search Based on Name/Department/Title/Salary </title>

<style>
    
    body,.in{
        background-color:rgb(236, 198, 198);

        font-family: Arial, Helvetica, sans-serif;
    }
    .in{
        font-weight: bold;
    }
    .sub{
        color:white;
        background-color:black;
        font-size:15px;
        
    }
    pre{
        font-family: Arial, Helvetica, sans-serif;
        font-size:17px;
    }
    .def{
        color:gray;
    }
    .tit{
        background-color: rgb(77, 25, 25);;
        color:rgb(236, 198, 198);
        border :1px solid black;
        width:80%;
        /* font-weight: bold; */
    }
    button{
             background-color:black;
             color:white;
             font-size:15px;
             float:right;
            }
            .pre-tit{
                font-size:23px;
                font-weight: bold;
            }
    </style>
</head>
<body>
<button  onclick="location.href = 'empInfo.php';" >Employee Page</button>
<h2>You Can Type --> (First Name or Last Name or Both / Department Name / Specific Title / Salary Range)</h2>


<form action="" method="POST">
<label for="rec">How many records you want ? </label>
  <input class="def" type="text" id="rec" name="rec" value="100"><br>
<pre>Type here =>                         <input type="text" name="name" >

<input class="sub" type="submit" name="search" value="LET’S GO"></pre>

</form>
<?php

$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'employees');



if(isset($_POST['search'])){
    $f=$_POST['name'];
    $numOfRecords = $_POST['rec'];
    $numOfRecords1 = $_POST['rec'];

    $numOfRecords2 = $_POST['rec'];

 $token = strtok($f, " ");

 $first= $token;
   $token = strtok(" ");

   $last=$token;
   $query="SELECT * FROM employees WHERE (first_name = '$first' AND  last_name = '$last') OR first_name = '$f' OR last_name='$f' ";
  
   $query_run=mysqli_query($con,$query);
   $numOfRows = mysqli_num_rows($query_run);
   if ($numOfRecords>$numOfRows) {

       $numOfRecords = $numOfRows;
   }
echo "<pre class='tit'>   Employee Number     |      Birth Date               |           First Name         |            Last Name        |            Gender             |           Hire Date      </pre>";

   for($i=1; $i<=$numOfRecords; $i++){
       $row = mysqli_fetch_array($query_run);
      
     
        ?>
        <form action="" method="POST">
        <input class="in" type="text" name="emp_no" value="<?php echo $row['emp_no']?> "/>
        <input class="in" type="text" name="birth_date" value="<?php echo $row['birth_date']?> "/>
        <input class="in" type="text" name="first_name" value="<?php echo $row['first_name']?> "/>
        <input class="in" type="text" name="last_name" value="<?php echo $row['last_name']?> "/>
        <input class="in" type="text" name="gender" value="<?php echo $row['gender']?> "/>
        <input class="in" type="text" name="hire_date" value="<?php echo $row['hire_date']?> "/>
      
        </form>
        <?php
    }
    $query2="SELECT * FROM employees  , dept_emp , departments  WHERE departments.dept_name = '$f'  AND dept_emp.dept_no = departments.dept_no AND employees.emp_no = dept_emp.emp_no";
  
    $query_run2=mysqli_query($con,$query2);
  $numOfRows2 = mysqli_num_rows($query_run2);
  if ($numOfRecords1>$numOfRows2) {

      $numOfRecords1 = $numOfRows2;
  }
  for($i=1; $i<=$numOfRecords1; $i++){
      $row2 = mysqli_fetch_array($query_run2);
     
         ?>
         <form action="" method="POST">
         
         <input class="in" type="text" name="emp_no" value="<?php echo $row2['emp_no']?> "/>
         <input class="in" type="text" name="birth_date" value="<?php echo $row2['birth_date']?> "/>
         <input class="in" type="text" name="first_name" value="<?php echo $row2['first_name']?> "/>
         <input class="in" type="text" name="last_name" value="<?php echo $row2['last_name']?> "/>
         <input class="in" type="text" name="gender" value="<?php echo $row2['gender']?> "/>
         <input  class="in" type="text" name="hire_date" value="<?php echo $row2['hire_date']?> "/>
       
         </form>
         <?php
     }
     $query1="SELECT * FROM  titles  , employees  WHERE titles.emp_no=employees.emp_no AND  title='$f' ";
  
    $query_run1=mysqli_query($con,$query1);
   $numOfRows1 = mysqli_num_rows($query_run1);
   if ($numOfRecords2>$numOfRows1) {

       $numOfRecords2 = $numOfRows1;
   }

   for($i=1; $i<=$numOfRecords2; $i++){
       $row1 = mysqli_fetch_array($query_run1);
      
         ?>
         <form action="" method="POST">
         <input class="in" type="text" name="emp_no" value="<?php echo $row1['emp_no']?> "/>
         <input class="in" type="text" name="birth_date" value="<?php echo $row1['birth_date']?> "/>
         <input class="in" type="text" name="first_name" value="<?php echo $row1['first_name']?> "/>
         <input class="in" type="text" name="last_name" value="<?php echo $row1['last_name']?> "/>
         <input class="in" type="text" name="gender" value="<?php echo $row1['gender']?> "/>
         <input class="in" type="text" name="hire_date" value="<?php echo $row1['hire_date']?> "/>
        

       
         </form>
         <?php
     }


     $numOfRecords3 = $_POST['rec'];
 
     $token = strtok($f, "-");
     $min= $token;
    
       $token = strtok("-");
       $max=$token;
 
 
       $query="SELECT * FROM  salaries , employees WHERE salary BETWEEN '$min' AND '$max' AND salaries.emp_no = employees.emp_no ";
   
    $query_run=mysqli_query($con,$query);
    $numOfRows = mysqli_num_rows($query_run);
    if ($numOfRecords3>$numOfRows) {
 
        $numOfRecords3 = $numOfRows;
    }
 
    for($i=1; $i<=$numOfRecords3; $i++){
        $row = mysqli_fetch_array($query_run);
       
      
         ?>
         <form action="" method="POST">
         <input class="in" type="text" name="emp_no" value="<?php echo $row['emp_no']?> "/>
         <input class="in" type="text" name="birth_date" value="<?php echo $row['birth_date']?> "/>
         <input class="in" type="text" name="first_name" value="<?php echo $row['first_name']?> "/>
         <input class="in" type="text" name="last_name" value="<?php echo $row['last_name']?> "/>
         <input class="in" type="text" name="gender" value="<?php echo $row['gender']?> "/>
         <input class="in" type="text" name="hire_date" value="<?php echo $row['hire_date']?> "/>
         
 
       
         </form>
         <?php
     }



}

?> 

</body>
</html>