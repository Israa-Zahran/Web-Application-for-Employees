<?php
// Start the session
session_start();
?>

<?php
$conn =  mysqli_connect("localhost", "root", "", "employees") or die("FAILEEED");

mysqli_select_db($conn, "employees") or die("could not connect to db");


$username = mysqli_real_escape_string($conn,$_POST['username']);
$password =MD5( mysqli_real_escape_string($conn,$_POST['password']));


if ($username != "" && $password != ""){

    $sql_query = "select count(*) as cntUser FROM user WHERE username='".$username."' and password='".$password."'";
    $result = mysqli_query($conn,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];

    if($count > 0){
        $_SESSION['uname'] = $username;
        echo 1;
    }else{
        echo 0;
    }

}
?>