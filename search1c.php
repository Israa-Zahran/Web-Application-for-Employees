<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: log.php");

}
?>
<!DOCTYPE html>
<html>
<head>
<title> Search Based on Department Name </title>

<style>
    
    body,.in{
        background-color:rgb(221, 204, 255);
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
        background-color:gray;
        border :1px solid black;
        width:80%;
        
    }
    button{
             background-color:black;
             color:white;
             font-size:15px;
             float:right;
            }
    </style>
</head>
<body>
<button  onclick="location.href = 'empInfo.php';" >Employee Page</button>
<h1> Type a Department Name</h1>

<form action="" method="POST">
<label for="rec">How many records you want ? </label>
  <input class="def" type="text" id="rec" name="rec" value="100"><br>
<pre>Type here =>                         <input type="text" name="name" placeholder="Type an Department Name">

<input class="sub" type="submit" name="search" value="LET’S GO"></pre>

</form>
<?php

$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'employees');



if(isset($_POST['search'])){
    $f=$_POST['name'];
    $numOfRecords = $_POST['rec'];
   
    $query2="SELECT * FROM employees  , dept_emp , departments  WHERE departments.dept_name = '$f'  AND dept_emp.dept_no = departments.dept_no AND employees.emp_no = dept_emp.emp_no";
  
    $query_run2=mysqli_query($con,$query2);
  $numOfRows2 = mysqli_num_rows($query_run2);
  if ($numOfRecords>$numOfRows2) {

      $numOfRecords = $numOfRows2;
  }
echo "<pre class='tit'>   Employee Number     |      Birth Date               |           First Name         |            Last Name        |            Gender             |           Hire Date      </pre>";
  for($i=1; $i<=$numOfRecords; $i++){
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
     
}

?> 

</body>
</html>