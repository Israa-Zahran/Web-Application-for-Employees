<!DOCTYPE html>
<html lang="en">
<head>
	<title>SIGN IN PAGE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="main.css">

</head>
<body>	
	
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title">
						SIGN IN
					</span>

						<input type="text" class="input100" id="username" name="username" placeholder="Username" required>

					<br>

					<input type="password" class="input100" id="txt_pwd" name="txt_pwd" placeholder="Password" required>
					
		
					<br>
					<div id="message"></div>
					<br>
						<button class="login100-form-btn" id="submit-btn">

							Sign in !
						</button>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="sign.php" class="txt3">
							Sign up now
						</a>
					</div>
</div>
			</div>
		</div>
	
	
	<script>
    $(document).ready(function(){
    $("#submit-btn").click(function(){
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
</html>