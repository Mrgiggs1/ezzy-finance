<?php
	SESSION_START();
	require("dbconnection.php");
	require("header.php");
	
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- site metas -->
      <title>LOGIN</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/style2.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
       <div class="brand_color">
			
		   <div class="container">
    			<div class="card-header text-center">
                  Send Reset Password Link
                </div>
			</div>
		</div>
		<div class="container" style="text-align:left;">
            <div class="card-body">
              <form method="post">
                <div class="form-group">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
                          <label for="name">Name</label>
                          <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp"><br>
                          
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary">
              </form>
            </div>
      </div>
            <?php
               if(isset($_POST['submit']))
    			{
    			    $email = $_POST['email'];
    			    $name = $_POST['name'];
    			    $random = rand(100,1000);
    			    
    			    $sel = "select * from user where email='".$email."'";
					$query = mysqli_query($con,$sel);
					$line = mysqli_fetch_assoc($query);
					
					if($line)
					{
					   
        			    $first_letter = strtoupper($email[0]);
        			    $last_letter = strtoupper($email[strlen($email)-1]);
        			    $subject = "Password Reset";
        			    $password = $first_letter.''.$last_letter.''.$random;
                        // the message
                        $body ="Name: \t\t".$name."\r\n";
        				$body .="Email: \t\t".$email."  \r\n";
        				$body .="New Password: \t".$password."\r\n";
                        
                        // use wordwrap() if lines are longer than 70 characters
                         $msg .=wordwrap($body,80);
                         $sent_from = "password@ezzy-finance.co.za";
                         
                            $headers="from: ".$sent_from."\n". //creating headers
                            "reply-to: ".$sent_from."\n". //creating headers
                            "X-Priority: 1\n". //headers for priority
                            "Priority: Urgent\n". //headers for priority
                            "Importance: high"; //set importance
                          
                          if(mail($email,$subject,$msg,$headers)) 
                          {  // sending the email
                             echo "<script>alert('Mail sent!');</script>"; // Show success alert
                             echo "<script>alert('Note that it might take time to reflect!');</script>";
                            $updateClient = "UPDATE user set password ='".$password."'													
													where email ='".$email."'";
    					    $run = mysqli_query($con, $updateClient);
                          }
                          else {
                             echo "<script>alert('Mail was not sent. Please try again later');</script>"; // Show error 
                         };
    				}
    				else
    				{
    				    echo '<script type="text/javascript"> alert("The user Email does not exist") </script>';
    				}
    			}
            ?>

	<!---footer-->
	<?php
	require("footer.php");
	?>
      <!-- Javascript files--> 
      <script src="js/jquery.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.bundle.min.js"></script> 
      <script src="js/jquery-3.0.0.min.js"></script> 
      <script src="js/plugin.js"></script> 
      <!-- sidebar --> 
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
		 <!--show password-->
				 function myFunction() {
				  var x = document.getElementById("myInput");
				  if (x.type === "password") {
					x.type = "text";
				  } else {
					x.type = "password";
				  }
				}
      </script> 
   </body>
</html>