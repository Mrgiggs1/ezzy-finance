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
        		<h2>Payment</h2>
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
							<figure><img class="img-fluid profile-picture" style="width:300px; height:300px" id="uploadPreview" src="images/deposit.jpg"/></figure>
							
        			        
						</div>
        			    
        			</div>
        			
        			<?php
									
    					$email = $_SESSION['email'];
    					$query = "SELECT * FROM user where email= '".$email."'";
    					$result = mysqli_query($con,$query);
    					$rows = mysqli_fetch_assoc($result)
				    ?>
				    
        			        
        			        
        			        <table class="table-hover table-light table-striped" id="table-data" border="0px;" style="width: 100%;">
            				<thead>
        			        <tr>
        			        <p>Ezzy Loan Management Allows you to make payment at Banks <br>
        			            <label>Provide the proof of payment</label>
        			            <label>it will take about Two(2) working days for verification and to appear on your payment portal</label>
        			            <label>NB: please note that reference need to be correct ID number or email corresponding to Loan Holder</label></p>
        			        <p>-------------------------------------------------------------------------- </p>
        			        <p>-------------------------------------------------------------------------- </p>
            				    <th>ABSA BANK(Main Account for Loan Payment)</th>
        			        </tr>
        			        </thead>
        			        <tr>
        			            <td>Account Holder: </td>
        			            <td>Ezzy-Finance Management</td>
        			        </tr>
        			        <tr>
        			            <td>Account Number</td>
        			            <td>04 001 002 8</td>
        			        </tr>
        			        <tr>
        			            <td>Type of account</td>
        			            <td>Cheque or Current Account</td>
        			        </tr>
        			        <tr>
        			            <td>Branch Code</td>
        			            <td>632005</td>
        			        </tr>
        			        <tr>
        			            <td>Reference</td>
        			            <td>ID number</td>
        			        </tr>
                            </table><br><br>
                            <p>-------------------------------------------------------------------------- </p>
                            <table class="table-hover table-light table-striped" id="table-data" border="0px;" style="width: 100%;">
            				<thead>
        			        <tr>
            				    <th>STANDARD BANK(Main Account for Loan Payment)</th>
        			        </tr>
        			        </thead>
        			        <tr>
        			            <td>Account Holder: </td>
        			            <td>Ezzy-Finance Management</td>
        			        </tr>
        			        <tr>
        			            <td>Account Number</td>
        			            <td>409 432 343</td>
        			        </tr>
        			        <tr>
        			            <td>Type of account</td>
        			            <td>Cheque or Current Account</td>
        			        </tr>
        			        <tr>
        			            <td>Branch Code</td>
        			            <td>010345</td>
        			        </tr>
        			        <tr>
        			            <td>Reference</td>
        			            <td>ID number</td>
        			        </tr>
                            </table>
                            <p>-------------------------------------------------------------------------- </p>
                            <?php
            					$qu = "SELECT * FROM payment where email= '".$email."'";
            					$res = mysqli_query($con,$qu);
            					$line = mysqli_fetch_assoc($res)
        				    ?>
        				    <br><br>
                             </div>
                                    <table class="table-hover table-light table-striped" id="table-data" border="0px;" style="width: 100%;">
                                        <tr>
                                            <th>Loan Amount</th>
                                            <th>Balance Amount</th>
                                            <th>Previous Payment</th>
                                            <th>Penalty Amount</th>
                                            <th>OverDue Amount</th>
                                            <th>Last payment</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $line['amount']; ?></td>
                                            <td><?php echo $line['balance']; ?></td>
                                            <td><?php echo $line['paymentAmt']; ?></td>
                                            <td><?php echo $line['penalty_amt']; ?></td>
                                            <td><?php echo $line['overdue']; ?></td>
                                            <td><?php echo $line['created_Date']; ?></td>
                                        </tr>
                                    </table>
                                    <br>
                                     <p>-------------------------------------------------------------------------- </p>
                                    <br>
                				    
                                <div class="row">
                                    <form method="post" enctype="multipart/form-data">
                                            <label>Upload Payment Slip</label><br>
                                            <label>pdf only</label><br>
                                            <input required type="file" accept=".pdf" name="payment" size="50" /><br>
                                            <input class="btn btn-info mt-2" action="currentLoan.php" type="submit" name="submit" value="Submit"><br>
                                    </form>
                                </div>
                    </div>
            </div>
         </div>
       </div>
      </div>
     <?php
        if(isset($_POST['submit']))
		{
		    $email = $_SESSION['email'];
		    $sel = "select * from loan_request where status = 'approve' and email= '".$email."'";
		    $ans = mysqli_query($con,$sel);
		    $row = mysqli_fetch_assoc($ans);
		    
            
            
            $select = "select * from payment,loan_info where loan_info.email= '".$email."'";
		    $answer = mysqli_query($con,$select);
		    $rows = mysqli_fetch_assoc($answer);
		    
           
            
            if($row['status']=="approve")
            {
                
                                 
                    $img_name =$_FILES['payment']['name'];
					$img_size =$_FILES['payment']['size'];
					$img_tmp =$_FILES['payment']['tmp_name'];

					$directory = "payment/";
					$target_file = $directory.$img_name;
                
                    if(file_exists($target_file))
					{
						echo '<script type="text/javascript"> alert("Payment Proof already exists.. try Rename/New file") </script>';
					}
                    else
                    {
                            
                            $updateProof = "UPDATE payment set proof ='".$target_file."'
												where email ='".$email."'";
							$run = mysqli_query($con, $updateProof);
                            if($run)
							{
							    echo '<script type="text/javascript"> alert("Payment Proof is submitted, Updates will occurs") </script>';
							    move_uploaded_file($img_tmp,$target_file);
							}
							else
							{
							    echo '<script type="text/javascript"> alert("Failed to Upload Payment Slip") </script>';
							    unlink($target_file);
							}
                    }
            }
            else
            {
                echo '<script type="text/javascript"> alert("Loan is not yet approved, wait for approval") </script>';
            }
		}//end of if-submit
            
    ?>
            
            
            
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