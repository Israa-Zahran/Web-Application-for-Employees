<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: log.php");

}
?>
<!DOCTYPE html>
<html>
<head>
<title> Search Based on Employee Title </title>

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

<h1> Type an Employee Title</h1>

<form action="" method="POST">
<label for="rec">How many records you want ? </label>
  <input class="def" type="text" id="rec" name="rec" value="100"><br>
<pre>Type here =>                         <input type="text" name="name" placeholder="Type an employee title">

<input class="sub" type="submit" name="search" value="LET’S GO"></pre>

</form>
<?php

$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'employees');



if(isset($_POST['search'])){
    $f=$_POST['name'];
    $numOfRecords1 = $_POST['rec'];
    $query1="SELECT * FROM  titles  , employees  WHERE titles.emp_no=employees.emp_no AND  title='$f' ";
  
    $query_run1=mysqli_query($con,$query1);
   $numOfRows1 = mysqli_num_rows($query_run1);
   if ($numOfRecords1>$numOfRows1) {

       $numOfRecords1 = $numOfRows1;
   }
echo "<pre class='tit'>   Employee Number     |      Birth Date               |           First Name         |            Last Name        |            Gender             |           Hire Date      </pre>";

   for($i=1; $i<=$numOfRecords1; $i++){
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
     
}

?> 

</body>
</html>