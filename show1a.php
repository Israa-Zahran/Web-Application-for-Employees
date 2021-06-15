<?php
// session_start();
// if (!isset($_SESSION['uname'])) {
//     header("location: log.php");

// }
?>  
<?php

$conn = mysqli_connect("localhost","root","") or die ("could not connect " . mysqli_error($conn));

mysqli_select_db($conn,"employees") or die ("could not connect " . mysqli_error($conn));



//	Show all employees names associated with their titles, departments and salaries.
$query="SELECT DISTINCT first_name,last_name,title,dept_name,salary 
FROM employees,titles,departments,salaries,dept_emp
 WHERE employees.emp_no=titles.emp_no AND titles.emp_no=salaries.emp_no 
        AND dept_emp.dept_no=departments.dept_no LIMIT 100";
  // ini_set('memory_limit', '-1');



      $result=mysqli_query($conn,$query);

      $num1 = mysqli_num_rows($result);



      // if(!$result || mysqli_num_rows($result) == 0){
      //     $num1 = mysqli_num_rows($result);
      // }
    
      echo "<table>";
   
      echo "<th> First name</th><th> Last name </th><th> Title </th><th> Department name </th><th> Salary </th>";
      for($i=1; $i<= $num1 ; $i++){
        $rows = mysqli_fetch_row($result);
        echo "<tr> " ; 
        echo  "<td>". $rows[0] . "</td><td>" . $rows[1] . "</td><td>" . $rows[2] . "</td><td>" . $rows[3] . "</td><td>" . $rows[4] . "</td>";
    
    }
        
?>
<!DOCTYPE html>

<head>
<title> show Employee Information </title>

<style>
body{
  background-color:rgb(236, 198, 198);
  
}

table {
  width:100%;
  background-color:rgb(236, 198, 198);
  color:rgb(77, 25, 25);
  height :100px;
  font-size:20px;
  font-weight:bold;
}
th{
  font-size:30px;

}
table, td ,th{
  border: 1px solid black;
  border-collapse: collapse;}
  button{
             background-color:black;
             color:white;
             font-size:15px;
             float:right;
            }

</style>
</head>
<body>
<button  onclick="location.href = 'empInfo.php';" >Employee Page</button><br>


</body>

