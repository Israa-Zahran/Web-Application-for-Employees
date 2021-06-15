
<!DOCTYPE html>
<html>
<head>
<style>


table {
  width:100%;
  background-color:#CC99FF;
  height :100px;
}
table, td ,th{
  border: 1px solid black;
  border-collapse: collapse;


}‏
</style>
</head>
<body>

<?php

$conn = mysqli_connect("localhost","root","") or die ("could not connect " . mysqli_error($conn));

mysqli_select_db($conn,"employees") or die ("could not connect " . mysqli_error($conn));


//Show all departments, and their managers
$query="SELECT dept_manager.dept_no,departments.dept_name, employees.first_name 
FROM employees  , dept_manager , departments  
WHERE departments.dept_no = dept_manager.dept_no  AND dept_manager.emp_no = employees.emp_no ";
  
      $result=mysqli_query($conn,$query);

      $num1 = mysqli_num_rows($result);
      if(!$result || mysqli_num_rows($result) == 0){
          $num1 = mysqli_num_rows($result);
      }
      echo "<table>";
      
      echo "<th> department number</th><th> department name </th><th> managers </th>";
      for($i=1; $i<= $num1 ; $i++){
        $rows = mysqli_fetch_row($result);
        echo "<tr> " ; 
        echo  "<td>". $rows[0] . "</td><td>" . $rows[1] . "</td><td>" . $rows[2] . "</td>";}
      
        echo".<br><br><br>";

//Show departments names with the amount of employees’ salaries who work on each
$query1 = "SELECT dept_name ,sum_salary
FROM (SELECT  dep.dept_name ,  SUM(salary) AS sum_salary
        FROM departments AS dep ,salaries
        WHERE dep.dept_no=dept_no
        GROUP BY dep.dept_name 
        ) dep_sum";

$result1 = mysqli_query($conn,$query1);

$num = mysqli_num_rows($result1);
if(!$result1 || mysqli_num_rows($result1) == 0){
    $num = mysqli_num_rows($result1);
}
echo "<table>";

echo "<th> department name</th><th> total salaries </th>";
for($i=1; $i<= $num ; $i++){
  $rows = mysqli_fetch_row($result1);
  echo "<tr> " ; 
  echo  "<td>". $rows[0] . "</td><td>" . $rows[1] . "</td>";}

 




?>

</body>
</html>