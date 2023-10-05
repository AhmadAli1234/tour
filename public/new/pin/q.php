<!DOCTYPE html>
<html>
	<head>
		<title>jQuery Pinlogin - demo</title>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="jquery.pinlogin.min.js"></script>
		<link href="jquery.pinlogin.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	
		<div class="container_pin">
	
			<h1>Login with PIN</h1>
			<div id="loginpin"></div>
			<br />
			<br />
		
			<h1>Register with PIN</h1>

			<div id="registerpin"></div>
			<br />
			<div id="registerpinretype"></div>
		</div>
		
		<script type="text/javascript">
			$(function(){
						
				var loginpin = $('#loginpin').pinlogin({
					fields : 5,
					
					complete : function(pin){
						alert ('Awesome! You entered: ' + pin);
						loginpin.reset();
						loginpin.disable();
						
					},
					
				});	

			});
		</script>
	</body>
</html>