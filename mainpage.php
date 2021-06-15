<?php

  
if(isset($_POST['submit'])){

$con=mysqli_connect("localhost","root","","employees") or die ("could not connect " . mysqli_error($con));

mysqli_select_db($con,'employees')or die ("could not connect " . mysqli_error($con));

$id = mysqli_real_escape_string($con, $_REQUEST['id']);

$username = mysqli_real_escape_string($con, $_REQUEST['username']);
$password =MD5( mysqli_real_escape_string($con, $_REQUEST['password']));

$first_name = mysqli_real_escape_string($con, $_REQUEST['first_name']);




$sql = "INSERT INTO user (id,username,password,first_name) VALUES ('$id', '$username', '$password', '$first_name')";
if(mysqli_query($con, $sql)){
    echo "<script>alert('Records added successfully.')</script>";

} else{
 
    echo "<script>alert('ERROR: Could not able to execute')</script>";

}
mysqli_close($con);


}


?>
<!DOCTYPE html>
<html>
    <head>
        <style>
             body{
        background-color:rgb(115, 38, 38) ;
    }
.button {
  display: inline-block;
  border-radius: 4px;
  background-color:rgb(230, 179, 179);
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 654px;
  height: 570px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
span{
  color:rgb(115, 38, 38);
  font-size:40px;
  font-weight:bold;
}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
button{
             background-color:black;
             color:white;
             font-size:25px;}
        </style>
        <body>
        <span id="left"><button onclick="location.href = 'empInfo.php';" class="button" style="vertical-align:middle"><span>Employees information  </span></button></span>
        <span id="right"><button onclick="location.href = 'depInfo.php';" class="button" style="vertical-align:middle"><span>Departments information  </span></button></span>
<!-- logout button -->
<button onclick="location.href = 'log.php';">Log Out </button>
        </body>
        </html>