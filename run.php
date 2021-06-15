<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php

$conn = mysqli_connect("localhost","root","") or die ("could not connect " . mysqli_error($conn));
print "good work <br>"; 
mysqli_select_db($conn,"employees") or die ("could not connect " . mysqli_error($conn));
print "good work <br>";







mysqli_close($conn);


?>


</body>
</html>