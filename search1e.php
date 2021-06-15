<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: log.php");

}
?>
<!DOCTYPE html>
<html>
<head>
<title> Search Based on Salary Range </title>

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
        width:93%;
        /* font-weight: bold; */
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

<h1> Type a Salary Range </h1>

<form action="" method="POST">
<label for="rec">How many records you want ? </label>
  <input class="def" type="text" id="rec" name="rec" value="100"><br>
<pre>Type here =>                         <input type="text" name="name" placeholder="Type a salary range">

<input class="sub" type="submit" name="search" value="LET’S GO"></pre>

</form>
<?php

$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'employees');



if(isset($_POST['search'])){
    $f=$_POST['name'];
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
echo "<pre class='tit'>   Employee Number     |      Birth Date               |           First Name         |            Last Name        |            Gender             |           Hire Date          |           salary</pre>";

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
        <input class="in" type="text" name="hire_date" value="<?php echo $row['salary']?> "/>

      
        </form>
        <?php
    }
}

?> 

</body>
</html>