

<!DOCTYPE html>

<head>
<style>
body{
  background-color:rgb(236, 198, 198);
  color:rgb(77, 25, 25);
  font-weight:bold;
  font-size:20px;
}
/* rgb(77, 25, 25) */
table {
  width:90%;
  background-color:rgb(236, 198, 198);
  height :100px;
}
table, td ,th{
  border: 1px solid black;
  border-collapse: collapse;
}
th{
  font-size:25px;
  
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
<button  onclick="location.href = 'depInfo.php';" >Department Page</button><br><br>

</body>

<?php

$conn = mysqli_connect("localhost","root","") or die ("could not connect " . mysqli_error($conn));

mysqli_select_db($conn,"employees") or die ("could not connect " . mysqli_error($conn));


//Show all departments, and their managers
$query="SELECT departments.dept_name, employees.first_name
 FROM employees  , dept_manager , departments 
  WHERE departments.dept_no = dept_manager.dept_no  AND dept_manager.emp_no = employees.emp_no ";
  
      $result=mysqli_query($conn,$query);

      $num1 = mysqli_num_rows($result);
      if(!$result || mysqli_num_rows($result) == 0){
          $num1 = mysqli_num_rows($result);
      }
      echo "<table>";
      
      echo "<th> Department name </th><th> Managers </th>";
      for($i=1; $i<= $num1 ; $i++){
        $rows = mysqli_fetch_row($result);
        echo "<tr> " ; 
        echo  "<td>". $rows[0] . "</td><td>" . $rows[1] . "</td>";}
        
?>


