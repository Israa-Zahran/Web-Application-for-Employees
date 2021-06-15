
<!DOCTYPE html>

<head>
<style>
body{
  background-color:rgb(236, 198, 198);
  color:rgb(77, 25, 25);
  font-weight:bold;
  font-size:20px;
}
table {
  width:100%;
  background-color:rgb(236, 198, 198);
  height :100px;
}
table, td ,th{
  border: 1px solid black;
  border-collapse: collapse;
}
button{
             background-color:black;
             color:white;
             font-size:15px;
             float:right;
            }‏
</style>
</head>
<body>
<button  onclick="location.href = 'depInfo.php';" >Department Page</button>

</body>
<?php

$conn = mysqli_connect("localhost","root","") or die ("could not connect " . mysqli_error($conn));

mysqli_select_db($conn,"employees") or die ("could not connect " . mysqli_error($conn));


//Show departments names with the amount of employees’ salaries who work on each
$sql = "SELECT dep.dept_name , SUM(salary) AS sum_salary 
FROM departments AS dep ,salaries ,dept_emp
WHERE dep.dept_no=dept_emp.dept_no 
AND dept_emp.emp_no= salaries.emp_no 
GROUP BY dep.dept_name ";


$result1 = mysqli_query($conn, $sql)or die("Error");


$num = mysqli_num_rows($result1) or die("could not connect " . mysqli_error($conn));

if(!$result1 || mysqli_num_rows($result1) == 0){
    $num = mysqli_num_rows($result1);
}
echo "<table>";

echo "<th> Department Name</th><th> Total Salaries </th>";
for($i=1; $i<= $num ; $i++){
  $rows = mysqli_fetch_row($result1);

  echo "<tr> " ; 
  echo  "<td>". $rows[0] . "</td><td>" . $rows[1] . "</td>";}

?>

