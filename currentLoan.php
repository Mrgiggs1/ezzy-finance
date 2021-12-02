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
			  <a class="navbar-brand" href="client.php"><?php echo $row['lName'];   ?></a>

			  <!-- Toggler/collapsibe Button -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			  </button>

			  <!-- Navbar links -->
			  <div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav">
				  <li class="nav-item">
					<a class="nav-link" href="client.php">PROFILE</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="applyLoan.php">APPLY LOAN</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="currentLoan.php">CURRENT LOAN</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="paymentInfo.php">LOAN PAYMENT</a>
				  </li>
					
				</ul>
			  </div>
			</nav>
	</div>
    	<hr>
        	<div style="text-align: center;" >
        		<!----space--->
        		<h2>Loan Status</h2>
        	</div>
        </hr>
	
	 <div class="choose_bg">
         <div class="container">
            <div class="white_bg">
			     <div class="col-md-12">			
                    <div class="row" style="align:left;">
        			<!---content here-->
        			<div>
        			    <div>
							<figure><img class="img-fluid profile-picture" style="width:300px; height:300px" id="uploadPreview" src="images/loan-status-png-hi.jpg"/></figure>
						</div>
        			    
        			</div>
        			
        			<?php
									
    					$email = $_SESSION['email'];
    					$query = "SELECT * FROM loan_request where email = '".$email."'";
    					$result = mysqli_query($con,$query);
    					$rows = mysqli_fetch_assoc($result);
    					
    					/*$plan = $rows['plan'];
    					$sel = "select interest_perc,penalty_rate from loan_plan where months= '".$plan."'";
    					$result1 = mysqli_query($con,$sel);
    					$row = mysqli_fetch_assoc($result1);*/
				    ?>
				    <form method="post" enctype="multipart/form-data">
				        <?php
				            if($rows['status'] =='Inactive')
				            {//proof	email	status	income	expense	loanAmt	type	months	interest_perc	penalty_rate	type_name	type_desc	requestDate
				               $tot = $rows['loanAmt'] + $rows['loanAmt']*(1*$rows['interest_perc']);
				                $tot1 = $tot/$rows['months'] + (($tot/$rows['months']) *$rows['penalty_rate']);
				                $monthly = $tot/$rows['months'];
				                echo '
				                    <h1>NB: <label>Loan Is not Yet Approved</label></h1>
        			                <div style="text-align:left;" class="col-xl-10 col-lg-6 col-md-12 col-sm-6">
        			                <label>Estimation Amount(s)</label>
        			                <label>Type of Loan</label>
        			                <label>Loan Amount</label><input class="form-control"  readOnly type="text" name="type" value="'.$rows['type']; echo '">
        			                <p> <h3>Interest Rate: '.$rows['interest_perc']*100; echo '%</h3></p>
        			                <p> <h3>Loan Period : '.$rows['months']; echo ' months</h3></p>
                                     <label>Loan Amount</label><input class="form-control"  readOnly type="text" name="loanAmt" value="R'.$rows['loanAmt']; echo '">
                                     <label>Total Loan Payment</label>
                                     <input class="form-control" readOnly type="text" name="expense" value="R'.round($tot,2); echo '">
                                    
                                     
                                     
                            
                               
                            </div>
				                ';
				            }
				            else if($rows['status'] =='approve')
				            {					
                				
				                $tot = $rows['loanAmt'] + $rows['loanAmt']*(1*$rows['interest_perc']);
				                $tot1 = $tot/$rows['months'] + (($tot/$rows['months']) *$rows['penalty_rate']);
				                $monthly = $tot/$rows['months'];
				                echo '
				                    <h1>NB: <label>Loan Is Approved</label></h1>
        			                <div style="text-align:left;" class="col-xl-10 col-lg-6 col-md-12 col-sm-6">
        			                <label>Estimation Amount(s)</label>
        			                <label>Loan Type</label><input class="form-control"  readOnly type="text" name="loanAmt" value="'.$rows['type']; echo '">
                                     <label>Loan Amount</label><input class="form-control"  readOnly type="text" name="loanAmt" value="R'.$rows['loanAmt']; echo '">
                                    <p> <h3>Interest Rate: '.$rows['interest_perc']*100; echo '%</h3></p>
        			                <p> <h3>Loan Period : '.$rows['months']; echo ' months</h3></p>
                                     <label>Total Loan Payment</label>
                                     <input class="form-control" readOnly type="text" name="expense" value="R'.round($tot,2); echo '">
                                     <label>Penalties of over 3 months(incl)</label>
                                     <input class="form-control" readOnly type="text" name="expense" value="R'.round($tot1,2); echo '">
                                     <label>Monthly Payment(No Penalties Incl)</label>
                                     <input class="form-control" readOnly type="text" name="expense" value="R'.round($monthly,2); echo '">
                                     
                                     
                                    <br>
                                    <br>
                                
                            </div>
				                ';
				            }
				            else if($rows['status'] =='reject')
				            {
				                    echo '<h1>Ezzy Finance Rejected Your Loan Request, Contact Admin</h1>';
				            
						       
						  
				            }
				            else
				            {
				                 echo '<h1>No loan request/Data lost</h1>';
				            }
				        
				        
				        
				        ?>
				        
                </div>
            </div>
         </div>
       </div>
      </div>
            
            
            
        <hr>
        	<div class="form-inline pt-1">
        		<!----space--->
        	</div>
        <hr>
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