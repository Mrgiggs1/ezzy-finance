<?php
session_start();
require('dbconnection.php');
		
		$id_del = $_GET['id'];		
		
		
		$client = "DELETE FROM user WHERE id='".$id_del."'";
		$del = mysqli_query($con, $client);
		
		if($del)
		{
			echo '<script type="text/javascript"> alert("Admin DELETED Loan Request") </script>';
			echo '<script>
			window.location.href="loan_request.php";
			</script>
			';
		}
		else
		{
			echo '<script type="text/javascript"> alert("FAILED to DELETE Loan_Request ") </script>';
			echo '<script>
			window.location.href="loan_request.php";
			</script>
			';
		}
?>