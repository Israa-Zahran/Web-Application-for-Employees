<!DOCTYPE html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>
<div class="container">

    <div id="div_login">
        <h1>Login</h1>
        <div id="message"></div>
        <div>
            <input type="text"  id="username" name="username" placeholder="Username" />
        </div>
        <div>
            <input type="password" id="txt_pwd" name="txt_pwd" placeholder="Password"/>
        </div>
        <div>
            <input type="button" value="Submit" name="submit" id="submit" />
        </div>
    </div>

</div>
<script>
    $(document).ready(function(){
    $("#submit").click(function(){
        var username = $("#username").val().trim();
        var password = $("#txt_pwd").val().trim();

        if( username != "" && password != "" ){
            $.ajax({
                url:'ajax.php',
                type:'post',
                data:{username:username,password:password},
                success:function(response){
                    var msg = "";
                    if(response == 1){
                        window.location = "mainpage.php";
                    
                    }else{
                        msg = "Invalid username or password!";
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});
</script>
    </body>