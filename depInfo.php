<?php
// session_start();
// if (!isset($_SESSION['uname'])) {
//     header("location: log.php");

// }
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                /* background-image:url(white.jpg) ; */
                background-color:rgb(236, 198, 198);
            }
            h1{
                color: rgb(77, 25, 25);

            }
            div,pre{
                font-size: 23px;
                color: rgb(77, 25, 25);

            }
           
            a{
                color: rgb(201, 47, 149);
            }
            button{
             background-color:black;
             color:white;
             font-size:25px;
             margin-top:115px;
         }
            </style>
            </head>
            <body>
        <center>
        <h1>Department information </h1>
    </center><br>

<pre><h3>  List Of Things That You Can Request: </h3></pre>     
<pre>     Show all departments, and their managers. <a href="test.php">Try it</a></pre>
<pre>     Show departments names with the amount of employees’ salaries who work on each. <a href="show2ab.php">Try it</a></pre>
<pre>     Search for a department and show the employees-names who belong to it. <a href="search2c.php">Try it</a></pre>
<pre>     Insert a record for a new department. <a href="insert.php">Try it</a></pre>
         
<button onclick="location.href = 'mainpage.php';">Main Page</button>
        
            </body>
            </html>