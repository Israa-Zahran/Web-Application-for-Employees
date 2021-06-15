<?php
// session_start();
// if (!isset($_SESSION['uname'])) {
//     header("location: log.php");

// }
?>
<!DOCTYPE html>
<html>
<head>
<title> Search Based on Department Name </title>

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
        background-color:rgb(236, 198, 198);
        border :1px solid black;
        width:26%;
        font-weight: bold;
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
<button  onclick="location.href = 'depInfo.php';" >Department Page</button>
<h1> Type a Department Name </h1>

<form action="" method="POST">
<label for="rec">How many records you want ? </label>
  <input class="def" type="text" id="rec" name="rec" value="100"><br>
<pre>Type here =>                         <input type="text" name="name" placeholder="Type dept_name">

<input class="sub" type="submit" name="search" value="LET’S GO"></pre>

</form>
<?php

$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'employees');



if(isset($_POST['search'])){
    $f=$_POST['name'];
    $numOfRecords = $_POST['rec'];

   $query="SELECT * FROM employees  , dept_emp , departments  
   WHERE departments.dept_name = '$f'  AND dept_emp.dept_no = departments.dept_no 
   AND employees.emp_no = dept_emp.emp_no LIMIT 30";

   $query_run=mysqli_query($con,$query);
   $numOfRows = mysqli_num_rows($query_run);
   if ($numOfRecords>$numOfRows) {

       $numOfRecords = $numOfRows;
   }
       
        echo "<pre><h4>Department Name:<p style='text-decoration:underline';>". $f."</p></h4></pre>";
echo "<pre class='tit'>   First Name              |           Last Name         </pre>";

   for($i=1; $i<=$numOfRecords; $i++){
       $row = mysqli_fetch_array($query_run);
      
     
        ?>
        <form action="" method="POST">
      
        <input class="in" type="text" name="first_name" value="<?php echo $row['first_name']?> "/>
        <input class="in" type="text" name="last_name" value="<?php echo $row['last_name']?> "/>
    
      
        </form>
        <?php
    }
}

?> 

</body>
</html>