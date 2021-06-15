
<!DOCTYPE html>
<html>
    <head>
        <title> Employee Information </title>
        <style>
            body{
                /* background-image: url(BGround.webp); */
                background-color:rgb(236, 198, 198);
                font-family: italic, Helvetica, sans-serif;

            }
            p , #title,pre{
                font-size:23px;
                font-family: italic, Helvetica, sans-serif;
                color:rgb(77, 25, 25);

            }
            h1{
                font-family:Arial;  
                color: rgb(77, 25, 25);
            }
         a{
             color:black;
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
        <h1>Employees Information </h1>
        </center>
        <br>
<pre id="title"><b><i>       List Of Things That You Can Request: </i> </b>  </pre>
<pre>              Show all employees names associated with their titles, departments and salaries. <a href="show1a.php">Try it</a></pre>
<pre>              search for an employee based on:1- First-Name or Last-Name or both. <a href="search1b.php">Try it</a></pre>
<pre>                                                                     2- Department-Name </pre>
<pre>                                                                     3- specific title. </pre>
<pre>                                                                     4-salary range </pre>
<pre>              Insert a record for a new employee.  <a href="insert1f.php">Try it</a></pre>
            

    <button onclick="location.href = 'mainpage.php';">Main Page</button>
        



     
            </body>
            </html>