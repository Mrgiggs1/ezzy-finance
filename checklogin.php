<?php
function check_login()
{
	if(strlen($_SESSION['email'])<=0)
	{	
		echo '<script type="text/javascript"> alert("Log In First") </script>';
		
			
		$_SESSION["email"]="";
		echo '<script>
			window.location.href="login.php";
		</script>
		';						
	}
}
?>