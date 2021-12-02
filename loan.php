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
                		<h2>ACTIVE LOANS</h2>
                	</div>
            	</hr>
	<hr>
	<div>
				    <li><button onclick="window.print();" class="btn btn-primary" id="print-btn">Download to Pdf</button></li>
				</div><br>
	 <div class="choose_bg">
         <div class="container">
            <div class="white_bg">
						
            <div class="row">
			<?php
			//loanID	requestID	email	amount	status	date_released	date_created
				$query = $con->prepare("select Distinct(lName),fName,user.email,amount,date_released,date_created from loan_info,user where user.email=loan_info.email AND loan_info.status='approve'");
				$query->execute();
				$result = $query->get_result();
			?>
				<table class="table table-hover table-light table-striped" id="tblData" border="1px;" style="width: 100%;">
				<thead>
				<tr>
					<th>Surname</th>
					<th>First Name</th>
					<th>Email</th>
					<th>Loan Amount</th>
					<th>Approved Date</th>
					<th>Requested Date</th>
					<!--id	email	loan_type	loan_plan	amount	status	date_released	date_created-->
				</tr>
				</thead>
				<tbody>
				<tr>
				
				<?php
				while($play=$result->fetch_assoc())
				{					
				?>
					<tr>
						<td><?= $play['lName']; ?></td>
						<td><?= $play['fName']; ?></td>
						<td><?= $play['email']; ?></td>
						<td><?= $play['amount']; ?></td>
						<td><?= $play['date_released']; ?></td>
						<td><?= $play['date_created']; ?></td>
						
					</tr>
				<?php
				}
				?>
				</tbody>
				</table>
				<div class="col-md-3">
                    <button  onclick="exportTableToExcel('tblData')"><h3>Download Excel</h3></button>
                </div>
				<br>
				<br>
				<br>
				<label>-------------</label>
				<br>
				<hr>
                	<div class="col-md-3" style="text-align: right;" >
                		<!----space--->
                		<h2>REJECTED LOANS</h2>
                	</div>
            	</hr>
            	<br><p>-------------</p>
            </div>
            <div class="row">
                    <?php
        				$quer = $con->prepare("select * from loan_request,user where user.email=loan_request.email AND loan_request.status='reject'");
        				$quer->execute();
        				$result = $quer->get_result();
        			?>
        				<table class="table table-hover table-light table-striped" id="tblDat" border="1px;" style="width: 100%;">
        				<thead>
        				<tr>
        					<th>Surname</th>
        					<th>First Name</th>
        					<th>Email</th>
        					<th>Requested ID</th>
        					<th>Loan Amount</th>
        					<th>Loan Type</th>
        					<th>Loan Period</th>
        					<th>Approved Date</th>
        					<th>Requested Date</th>
        					<!--id	email	loan_type	loan_plan	amount	status	date_released	date_created-->
        				</tr>
        				</thead>
        				<tbody>
        				<tr>
        				
        				<?php
        				while($plays=$result->fetch_assoc())
        				{			
        				    //requestID	paySlip	email	status	income	expense	loanAmt	type	months	interest_perc	penalty_rate	type_name	type_desc	requestDate		
        				?>
        				
        					<tr>
        					    
        						<td><?= $plays['lName']; ?></td>
        						<td><?= $plays['fName']; ?></td>
        						<td><?= $plays['email']; ?></td>
        						<td><?= $plays['requestID']; ?></td>
        						<td><?= $plays['loanAmt']; ?></td>
        						<td><?= $plays['type']; ?></td>
        						<td><?= $plays['months']; ?></td>
        						<td>Not Approved</td>
        						<td><?= $plays['requestDate']; ?></td>
        						
        					</tr>
        				<?php
        				}
        				?>
        				</tbody>
        				</table>
        				<div class="col-md-3">
                    <button  onclick="exportTableToExcel1('tblDat')"><h3>Download Excel</h3></button>
                </div>
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