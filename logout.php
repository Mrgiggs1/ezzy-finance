<?php
session_start();
$_SESSION['email']="";
session_unset();


if(strlen($_SESSION['email']) == 0)
{
	
	echo'<script language="javascript">
document.location="index.php";
</script>';
}
else
{
	echo '<script type="text/javascript"> alert("Failed to logged out..") </script>';
}
?>



