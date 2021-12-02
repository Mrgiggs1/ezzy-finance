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
      <title>Client Profile</title>
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
      
      
      <!---delete icon-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	
	<!---print-->	
	<link rel="stylesheet" type="text/css" href="print.css" media="print">
	  
	  
	  <!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

			<!-- Popper JS -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

			<!-- Latest compiled JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


	  
	  
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
	<?php
									
		$email = $_SESSION['email'];
		$query = "SELECT * FROM user where email= '".$email."'";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($result);
		
	?>
		<div class="brand_color">
			<div class="container">
				<div class="text-right" id="user_info">
					<a href="logout.php">Logout<i class="fa fa-sign-out"></i>
						<img style="width:30px; height: 30px;" src="<?php echo $row['logo']; ?>">-||-
					</a>
					
				</div>
			</div>
		</div>
       

    </div>
    <div class="contact">
	<!---Navbar--->
				<nav class="navbar navbar-expand-md bg-dark navbar-dark">
			  <!-- Brand -->
			  <a class="navbar-brand" href="users.php"><?php echo $row['lName'];   ?></a>

			  <!-- Toggler/collapsibe Button -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			  </button>

			  <!-- Navbar links -->
			  <div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
				  <li class="nav-item">
					<a class="nav-link" href="admin_staff.php">PROFILE</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="users.php">USERS</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="loan.php">ACTIVE LOAN</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="loan_request.php">LOAN REQUEST</a>
				  </li>
					
					
				</ul>
			  </div>
					<div class="text-right" id="user_info">
						<input class="btn btn-info mt-2" type="submit" name="add" value="Add Staff Member">
					</div>
			</nav>
	</div>
	<hr>
	<div class="form-inline pt-2">
		<label for="search" class="font-weight-bold lead text-dark"></label>&nbsp;
		<input type="text" name="search_text" id="search_text" class="form-control form-control-lg rounded-0 border-primary pb-2"
			 placeholder="search...">
	</div>
	<hr>
	
	 <div class="choose_bg">
         <div class="container">
            <div class="white_bg">
						
            <div class="row">
                <div class="col-md-12">
				<?php
									
					$email = $_GET['id'];
					$query = "SELECT * FROM user where email= '".$email."'";
					$result = mysqli_query($con,$query);
					$rows = mysqli_fetch_assoc($result)
				?>
                    <form METHOD="POST" enctype = "multipart/form-data">
                        <div class="row">
								<div><label>Profile Picture</label>
									<div>
										<figure><img class="img-fluid profile-picture" style="width:300px; height:300px" id="uploadPreview" src="<?php echo $rows['logo']; ?>"/></figure>
										<input type="file" id="logo" name="logo" accept=".jpg,.jpeg,.png" class="file" data-browse-on-zone-click="true" onchange="PreviewImage();">
									</div>
								</div>	
                            
							<div style="text-align:left;" class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
							<div class="titlepage">
								<h2> Client <?php echo $rows['fName'].' '.$rows['lName'];  ?></h2>
							</div>
                                <input class="form-control"  type="text" name="lName" value="<?php echo $rows['lName'];   ?>">						
                                <input class="form-control"  type="text" name="fName" value="<?php echo $rows['fName'];   ?>">
                                <input class="form-control"  type="email" readOnly name="email" value="<?php echo $rows['email'];   ?>">
								<li><input type="checkbox" onclick="myFunction()"> Show Password </li>
                                <input class="form-control" required  id="myInput" type="password" name="password" value="<?php echo $rows['password'];   ?>">
								
                                <input class="form-control" required  type="text" name="phone" value="0<?php echo $rows['phoneNo'];   ?>">
                                <input class="form-control" required  type="number" readOnly name="age" value="<?php echo $rows['age'];   ?>">
                                <input class="form-control" required  type="text" name="address" value="<?php echo $rows['address'];   ?>">
								
								
								<div class=" col-md-12">
								<input class="btn btn-info mt-2" type="submit" name="submit" value="Update"><br><br>
								</div>
                            </div>
							
                            
                        </div>
						
                    </form>
                </div>
            </div>
         </div>
       </div>
      </div>
      <?php
		if(isset($_POST['submit']))
		{
					$lName = $_POST["lName"];
					$fName = $_POST["fName"];
					$email = $_POST["email"];
					$password = $_POST["password"];
					$address = $_POST["address"];
					$role = "client";
					$age = $_POST["age"];
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
					
					$updateClient = "UPDATE user set logo ='".$target_file."',
													fName ='".$fName."',
													lName ='".$lName."',
													password ='".$password."',
													phoneNo = '".$phone."',
													address = '".$address."'													
													where email ='".$email."'";
					$run = mysqli_query($con, $updateClient);
					if($run)
					{
						echo '<script type="text/javascript"> alert("Client is Successfully Updated") </script>';
						echo '<script>
							window.location.href="users.php";
							</script>
							';
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error Updating a Client") </script>';
					}
		}
	?>
	<script type="text/javascript">
	
		$(document).ready(function()
		{
			$("#search_text").keypress(function(){
				var search = $(this).val();
				$.ajax({
					url: 'action.php',
					method: 'post',
					data:{name:$("#search"}.val(),
				},
				success: function(data)
				{
					#("#table-data").html(data);
				}
				});
			});
		});
    </script>
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