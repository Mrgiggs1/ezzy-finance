<?php
	SESSION_START();
	require("header.php");
	require("dbconnection.php");
	require("checklogin.php");
	
	check_login();
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
      <!-- site metas -->
      <title>Sign Up</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
	  
	  
			<script type="text/javascript">
				function PreviewImage() {
					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("logo").files[0]);

					oFReader.onload = function (oFREvent) {
						document.getElementById("uploadPreview").src = oFREvent.target.result;
					};
				};
				
				function myFunction() {
				  var x = document.getElementById("myInput");
				  if (x.type === "password") {
					x.type = "text";
				  } else {
					x.type = "password";
				  }
				}
			</script>
			
			
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
				<div class="text-center" id="user_info">
						<h1>Add Staff Member</h1>
					</div>
			</div>
    </div>
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <form METHOD="POST" enctype = "multipart/form-data">
                        <div class="row">
								<div><label>Profile Picture</label>
									<div>
										<figure><img class="img-fluid profile-picture" style="width:300px; height:300px" id="uploadPreview" src="images/unset.png"/></figure>
										<input type="file"  id="logo" name="logo" accept=".jpg,.jpeg,.png" class="file" data-browse-on-zone-click="true" onchange="PreviewImage();">
									</div>
								</div>	
                            
							<div style="text-align:right;" class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
                                <input class="form-control" required placeholder="Last name" type="text" name="lName">						
                                <input class="form-control" required placeholder="First Name" type="text" name="fName">
                                <input class="form-control" required placeholder="Email" type="email" name="email">
								<input type="checkbox" onclick="myFunction()"> Show Password
                                <input class="form-control" required placeholder="Password" id="myInput" type="password" name="password">
								
                                <input class="form-control" required placeholder="Phone Number" type="number" name="phone">
                                <input class="form-control" required placeholder="ID number" type="text" name="ID">
								
								
								<div class=" col-md-12">
								<input class="btn btn-info mt-2" type="submit" name="submit" value="Add Staff"><br>
								</div>
                            </div>
							
                            
                        </div>
						
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
		if(isset($_POST['submit']))
		{	
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			{
				if(preg_match("/^[a-zA-z]*$/", $_POST["lName"]) || preg_match("/^[a-zA-z]*$/", $_POST["fName"])) 
				{	
				    if(preg_match( "/^(\+27|0)[6-8][0-9]{8}$/",$_POST["phone"] ))
					{
        				    $lName = $_POST["lName"];
        					$fName = $_POST["fName"];
        					$email = $_POST["email"];
        					$password = $_POST["password"];
        					$address = $_POST["address"];
        					$role = "Admin";
        					$ID = $_POST["ID"];
        					$phone = $_POST["phone"];
        					$created_date = date("Y-m-d");
        					
        					$sel = "select * from user where email='".$email."' || phoneNo='".$phone."'";
        					$query = mysqli_query($con,$sel);
        					
        					
        					$img_name =$_FILES['logo']['name'];
        					$img_size =$_FILES['logo']['size'];
        					$img_tmp =$_FILES['logo']['tmp_name'];
        
        					$directory = 'img/';
        					$target_file = $directory.$img_name;
        					move_uploaded_file($img_tmp,$target_file);
        					
        					
        					if(mysqli_num_rows($query))
        					{
        						echo '<script type="text/javascript"> alert("The user email/phone Number exist") </script>';				
        					}
        					else
        					{
        						$reg = "INSERT into user values('$target_file','$lName','$fName','$email','$password','$phone','$role','$ID','$created_date')";
        						$que = mysqli_query($con,$reg);
        						
        						$random = rand(1,11);
        						$name = substr($fName,0,1);
        						$lname = substr($lName,0,1);
        						$adminOfficeNum = "Admin-".''.$name.''.$lname.'#'.$random;
        						if($que)
        						{
        							echo '<script type="text/javascript"> alert("Admin is Added") </script>';
        							
        							$member = "insert into admin values('$email','$adminOfficeNum')";
								    $que = mysqli_query($con,$member);
								    
        							echo '<script>
        									window.location.href="admin_staff.php";
        									</script>
        									';	
        						}
        						else{
        							echo '<script type="text/javascript"> alert("Admin is unsuccessfully Registered") </script>';
        						}				
        						
        					}
				        }
				        else
				        {
				            echo '<script type="text/javascript"> alert("Enter Cellphone Numbers") </script>';
				        }
				}
				else
				{
				    echo '<script type="text/javascript"> alert("Only allows letters and white spaces") </script>';
				}
			}
			else
			{
				echo '<script type="text/javascript"> alert("Invalid Email") </script>';
			}
		}
	?>
      <!---footer-->
	<?php
	require("footer.php");
	?>
      <!-- end footer -->
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
         
      </script> 
   </body>
</html>