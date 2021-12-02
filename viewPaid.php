<?php
	SESSION_START();
	require("header.php");
	require("dbconnection.php");
	require("checklogin.php");
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
					<a href="logout.php"> Logout <i class="fa fa-sign-out"></i>
						<img style="width:30px; height: 30px;" src="<?php echo $row['profilePicture']; ?>">
					</a>
					
				</div>
			</div>
		</div>
       

    </div>
    <div class="contact">
	<!---Navbar--->
				<nav class="navbar navbar-expand-md bg-dark navbar-dark">
			  <!-- Brand -->
			  <a class="navbar-brand" href="admin_staff.php"><?php echo $row['lName'];   ?></a>

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
					<a class="nav-link" href="loan_request.php">LOAN REQUEST</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="loan.php">ACTIVE LOAN</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="viewPaid.php">LOAN PAYMENTS</a>
				  </li>
				  
					
					
				</ul>
			  </div>
			</nav>
	</div>
	<hr>
	<hr>
                	<div style="text-align: center;" >
                		<!----space--->
                		<h2>LOAN PAYMENT</h2>
                	</div>
            	</hr>
	<hr>
	
	 <div class="choose_bg">
         <div class="container">
            <div class="white_bg">
		<form METHOD="POST">			
            <div class="row">
			<?php
				$select = "select * from payment,user,loan_info where user.email = payment.email and loan_info.email = user.email AND balance > 0";
				$query= mysqli_query($con,$select);
				$num = 0;
			?>
				<table class="col-md-12" border="1px;" style="width: 100%; text-align: center;">
				<thead>
				<tr>
				    <th>#</th>
				    <th>Surname</th>
				    <th>Name</th>
				    <th>Owe Amount</th>
				    <th>Last Payment</th>
					<th>Payment Date</th>
					<th>Penalties</th>
					<!--<th>Payment</th>-->
					<th class="col-md-2">ENTER PAID AMOUNT</th>
					
				</tr>
				</thead>
				<tbody>
				
				<?php
				while($play = mysqli_fetch_assoc($query))
				{$num++;				
				?>
					<tr>
					    <input hidden class="form-control" type="email" name="email" value="<?= $play['email']; ?>">
					    <input hidden class="form-control" type="number" name="balance" value="<?= $play['balance']; ?>">
					    <td><?= $num; ?></td>
					    <td><?= $play['lName']; ?></td>
					    <td><?= $play['fName']; ?></td>
						<td><?= $play['balance']; ?></td>
						<td><?= $play['paymentAmt']; ?></td>
						<td><?= $play['created_date']; ?></td>
						<td><?= $play['penalty_amt']; ?></td>
						<!--<td>-->
						<!--    <a href="<?= $play['proof']; ?>">Payment Slip</a>-->
						<!--</td>-->
						<!--<td><input class="form-control"  type="text" name="payment"></td>-->
						<!--<td style="border: 0px"><span class="text-danger" id="currency"></span></td>-->
						
						<!--<td><input  type="submit" name="submit" value="Allow Payment"></td>-->
						<td><a href="makePayment.php?id=<?php  echo urlencode(base64_encode($play['email'])); ?>"><i class="material-icons">keyboard</i>
						    </a></td>
						  
					</tr>
					
				<?php
				}
				?>
				</tbody>
				</table>
			</form>
				
            </div>
         </div>
       </div>
      </div>
      
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