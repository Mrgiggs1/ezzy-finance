<?php
session_start();
require('dbconnection.php');
		
		$email = $_GET['id'];		
		
		$image = "SELECT * FROM user WHERE email = '".$email."'";
		$query = mysqli_query($con, $image);
		
		$after = mysqli_fetch_assoc($query);		
		$picName = $after['logo'];
		
		$client = "DELETE FROM user WHERE email='".$email."'";
		
		if(mysqli_query($con, $client))
		{
			unlink($picName);
			echo '<script type="text/javascript"> alert("Admin/Staff deleted the User") </script>';
			echo '<script>
			window.location.href="users.php";
			</script>
			';	
		}
		else
		{
			echo '<script type="text/javascript"> alert("FAILED to DELETE User ") </script>';
			echo '<script>
			window.location.href="users.php";
			</script>
			';
		}
?>