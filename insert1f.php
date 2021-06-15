<?php
// session_start();
// if (!isset($_SESSION['uname'])) {
//     header("location: log.php");

// }
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

    $emp_no = mysqli_real_escape_string($con, $_REQUEST['emp_no']);

    $birth_date = mysqli_real_escape_string($con, $_REQUEST['birth_date']);

    $first_name = mysqli_real_escape_string($con, $_REQUEST['fname']);

    $last_name = mysqli_real_escape_string($con, $_REQUEST['lname']);

    $gender = mysqli_real_escape_string($con, $_REQUEST['gender']);

    $hire_date = mysqli_real_escape_string($con, $_REQUEST['hire_date']);

    $sql = "INSERT INTO employees (emp_no,birth_date,first_name, last_name, gender, hire_date) VALUES ('$emp_no', '$birth_date', '$first_name','$last_name','$gender','$hire_date')";
    if(mysqli_query($con, $sql)){
        echo "<script>alert('Records added successfully.')</script>";
        
    } else{
        echo "<script>alert('ERROR: Could not able to execute')</script>";

    }
    mysqli_close($con);


}

    ?>
    <button class="btn" onclick="location.href = 'empInfo.php';" >Employee Page</button>
   <center> <h1>Fill the Form </h1></center><br>
    <form method="post" action=""> 
<pre>                     Employee No :            <input type="text" name="emp_no"></pre>
<pre>                     Birth Date :                  <input type="text" name="birth_date"></pre>
<pre>                     First Name :                <input type="text" name="fname"></pre>
<pre>                     last Name :                  <input type="text" name="lname"></pre>
<pre>                     Gender :                      <input type="text" name="gender"></pre>
<pre>                     Hire Date :                   <input type="text" name="hire_date"></pre><br>
<pre>                     <button type="submit" name="save">Insert</button></pre>
    <!-- <button type="submit" name="get">get</button> -->
    </form>
    
</body>
</html>