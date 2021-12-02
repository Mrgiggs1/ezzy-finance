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
	<?php
									
		$email = $_SESSION['email'];
		$query = "SELECT * FROM user where email= '".$email."'";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($result);
		
	?>
		<!--<div class="brand_color">-->
		<!--	<div class="container">-->
		<!--		<div class="text-right" id="user_info">-->
		<!--			<a href="logout.php"> Logout <i class="fa fa-sign-out"></i>-->
		<!--				<img style="width:30px; height: 30px;" src="<?php echo $row['profilePicture']; ?>">-->
		<!--			</a>-->
					
		<!--		</div>-->
		<!--	</div>-->
		<!--</div>-->
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
        		<h2>Apply Loan</h2>
        	</div>
        </hr>
	
	 <div class="choose_bg">
         <div class="container">
            <div class="white_bg">
			     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">			
                    <div class="row" style="align:left;">
        			<!---content here-->
        			<div>
      <!--  			    <div>-->
						<!--	<figure><img class="img-fluid profile-picture" style="width:350px; height:200px" id="uploadPreview" src="images/loan_approved.jpg"/></figure>-->
						<!--</div>-->
					<form method="post" enctype="multipart/form-data">	
						<div style="text-align:left;" class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
						    <span class="text-danger" id="mortgage6"></span><span class="text-danger" id="errAmt"></span><br>
						    <span>Loan Amount</span>
                             <input class="form-control" type="text" name="loan" placeholder="R0,00" value="<?php if(isset($_POST['loan'])){ echo $_POST['loan']; }?>">
                             
                             <span>Loan interest Rate</span>
                             <span class="text-primary" id="rate"></span>
                             <br>
                             <span class="text-danger" id="type"></span><br>
                            <input type="radio" required name="loan_type" value = "business">Business&emsp;
							<input type="radio" required name="loan_type" value = "mortgage">Mortgage&emsp;
							<input type="radio" required name="loan_type" value = "personal">Personal&emsp;
    					    <br>
    					    <span class="text-danger" id="plan"></span><br>
							<input type="radio" required name="loan_plan" value = "6">6 month&emsp;
							<input type="radio" required name="loan_plan" value = "12">12 month&emsp;
							<input type="radio" required name="loan_plan" value = "24">24 month&emsp;
                            <br><br>
                            <span>Total Amount to Pay</span>
                            <span class="text-primary" id="tot"></span>
                            <br>
                            <span>Monthly Amount to Pay</span>
                            <span class="text-primary" id="monthly"></span>
                            <br>
                            <span>Penalties after 3 Months</span>
                            <span class="text-primary" id="penalities"></span>
                            
                        </div>
                        <input class="btn btn-info mt-2" type="submit" name="submitCalculate" value="Calculate"><br>
        			</form>   
        			<?php
                            if(isset($_POST['submitCalculate']))
                    		{
                    		    $amt = $_POST['loan'];
                    		    if($amt>=500 && !$amt=="")
                    		    {
                        		    $plan = $_POST['loan_plan'];
                        		    $type = $_POST['loan_type'];
                        		    
                        		    if($plan == 6)
                        		    {
                        		        if($type == 'business')
                        		        {
                        		            $rate = 0.42;
                        		            $penalty = 0.15;
                        		            $tot = round($amt*$rate + $amt,2);
                        		            $monthly = round($tot/6,2);
                        		            $rates = $rate*100;
                        		            $penalties = round($monthly*$penalty,2);
                        		            echo '<script type="text/javascript"> document.getElementById("type").innerHTML ="Business Loan" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("plan").innerHTML ="Six Months" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("rate").innerHTML ="'.$rates.'%" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("tot").innerHTML =": R'.$tot.'" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("monthly").innerHTML =": R'.$monthly.' "</script>';
                        		            echo '<script type="text/javascript"> document.getElementById("penalities").innerHTML =": R'.$penalties.' "</script>';
                        		        }else if($type == 'mortgage')
                        		        {
                        		            echo '<script type="text/javascript"> document.getElementById("type").innerHTML ="Mortgage Loan" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("plan").innerHTML ="Six Months" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("mortgage6").innerHTML ="* Mortgage Loan starts from 12 months"</script>';
                        		        }else if($type == 'personal')
                        		        {
                        		            $rate = 0.25;
                        		            $penalty = 0.09;
                        		            $tot = round($amt*$rate + $amt,2);
                        		            $monthly = round($tot/6,2);
                        		            $rates = $rate*100;
                        		            $penalties = round($monthly*$penalty,2);
                        		            echo '<script type="text/javascript"> document.getElementById("type").innerHTML ="Personal Loan" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("plan").innerHTML ="Six Months" </script>';
                        		            
                        		            echo '<script type="text/javascript"> document.getElementById("rate").innerHTML ="'.$rates.'%" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("tot").innerHTML =": R'.$tot.'" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("monthly").innerHTML =": R'.$monthly.' "</script>';
                        		            echo '<script type="text/javascript"> document.getElementById("penalities").innerHTML =": R'.$penalties.' "</script>';
                        		        }
                        		        
                        		    }
                        		    else if($plan == 12)
                        		    {
                        		       
                                         if($type == 'business')
                        		        {
                        		            $rate = 0.42;
                        		            $penalty = 0.15;
                        		            $tot = round($amt*$rate + $amt,2);
                        		            $monthly = round($tot/12,2);
                        		            $rates = $rate*100;
                        		            $penalties = round($monthly*$penalty,2);
                        		            echo '<script type="text/javascript"> document.getElementById("type").innerHTML ="Business Loan" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("plan").innerHTML ="Twelve Months" </script>';
                        		            
                        		            echo '<script type="text/javascript"> document.getElementById("rate").innerHTML ="'.$rates.'%" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("tot").innerHTML =": R'.$tot.'" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("monthly").innerHTML =": R'.$monthly.' "</script>';
                        		            echo '<script type="text/javascript"> document.getElementById("penalities").innerHTML =": R'.$penalties.' "</script>';
                        		        }else if($type == 'mortgage')
                        		        {
                        		            $rate = 0.35;
                        		            $penalty = 0.12;
                        		            $tot = round($amt*$rate + $amt,2);
                        		            $monthly = round($tot/12,2);
                        		            $rates = $rate*100;
                        		            $penalties = round($monthly*$penalty,2);
                        		            echo '<script type="text/javascript"> document.getElementById("type").innerHTML ="Mortgage Loan" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("plan").innerHTML ="Twelve Months" </script>';
                        		            
                        		            echo '<script type="text/javascript"> document.getElementById("rate").innerHTML ="'.$rates.'%" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("tot").innerHTML =": R'.$tot.'" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("monthly").innerHTML =": R'.$monthly.' "</script>';
                        		            echo '<script type="text/javascript"> document.getElementById("penalities").innerHTML =": R'.$penalties.' "</script>';
                        		        }else if($type == 'personal')
                        		        {
                        		            $rate = 0.25;
                        		            $penalty = 0.09;
                        		            $tot = round($amt*$rate + $amt,2);
                        		            $monthly = round($tot/12,2);
                        		            $rates = $rate*100;
                        		            $penalties = round($monthly*$penalty,2);
                        		            echo '<script type="text/javascript"> document.getElementById("type").innerHTML ="Personal Loan" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("plan").innerHTML ="Twelve Months" </script>';
                        		            
                        		            echo '<script type="text/javascript"> document.getElementById("rate").innerHTML ="'.$rates.'%" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("tot").innerHTML =": R'.$tot.'" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("monthly").innerHTML =": R'.$monthly.' "</script>';
                        		            echo '<script type="text/javascript"> document.getElementById("penalities").innerHTML =": R'.$penalties.' "</script>';
                        		        }
                        		    }
                        		    else if($plan == 24)
                        		    {
                        		        if($type == 'business')
                        		        {
                        		            $rate = 0.42;
                        		            $penalty = 0.15;
                        		            $tot = round($amt*$rate + $amt,2);
                        		            $monthly = round($tot/12,2);
                        		            $rates = $rate*100;
                        		            $penalties = round($monthly*$penalty,2);
                        		            echo '<script type="text/javascript"> document.getElementById("type").innerHTML ="Business Loan" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("plan").innerHTML ="Twenty-Four Months" </script>';
                        		            
                        		            echo '<script type="text/javascript"> document.getElementById("rate").innerHTML ="'.$rates.'%" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("tot").innerHTML =": R'.$tot.'" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("monthly").innerHTML =": R'.$monthly.' "</script>';
                        		            echo '<script type="text/javascript"> document.getElementById("penalities").innerHTML =": R'.$penalties.' "</script>';
                        		        }else if($type == 'mortgage')
                        		        {
                        		            $rate = 0.35;
                        		            $penalty = 0.12;
                        		            $tot = round($amt*$rate + $amt,2);
                        		            $monthly = round($tot/12,2);
                        		            $rates = $rate*100;
                        		            $penalties = round($monthly*$penalty,2);
                        		            echo '<script type="text/javascript"> document.getElementById("type").innerHTML ="Mortgage Loan" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("plan").innerHTML ="Twenty-Four Months" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("rate").innerHTML ="'.$rates.'%" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("tot").innerHTML =": R'.$tot.'" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("monthly").innerHTML =": R'.$monthly.' "</script>';
                        		            echo '<script type="text/javascript"> document.getElementById("penalities").innerHTML =": R'.$penalties.' "</script>';
                        		        }else if($type == 'personal')
                        		        {
                        		            $rate = 0.25;
                        		            $penalty = 0.09;
                        		            $tot = round($amt*$rate + $amt,2);
                        		            $monthly = round($tot/12,2);
                        		            $rates = $rate*100;
                        		            $penalties = round($monthly*$penalty,2);
                        		            echo '<script type="text/javascript"> document.getElementById("type").innerHTML ="Personal Loan" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("plan").innerHTML ="Twenty-Four Months" </script>';
                        		            
                        		            echo '<script type="text/javascript"> document.getElementById("rate").innerHTML ="'.$rates.'%" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("tot").innerHTML =": R'.$tot.'" </script>';
                        		            echo '<script type="text/javascript"> document.getElementById("monthly").innerHTML =": R'.$monthly.' "</script>';
                        		            echo '<script type="text/javascript"> document.getElementById("penalities").innerHTML =": R'.$penalties.' "</script>';
                        		        }
                        		    }
                    		    }else
                    		    {
                    		        echo '<script type="text/javascript"> document.getElementById("errAmt").innerHTML ="Calculate From R500" </script>';
                    		    }
                    		}
                        ?>
        			</div>
        			
        			<?php
									
    					$email = $_SESSION['email'];
    					$query = "SELECT * FROM user where email= '".$email."'";
    					$result = mysqli_query($con,$query);
    					$rows = mysqli_fetch_assoc($result)
				    ?>
				    <form method="post" enctype="multipart/form-data">
        			    <div style="text-align:left;" class="col-xl-12 col-lg-6 col-md-12 col-sm-6">
                             <input class="form-control" readonly type="text" name="lName" value="<?php echo $rows['lName'];   ?>">						
                             <input class="form-control" readonly type="text" name="fName" value="<?php echo $rows['fName'];   ?>">
                             <span class="text-danger" id="income"></span>
                            <input class="form-control" required placeholder="Monthly Income" type="number" name="income" value="<?php if(isset($_POST['income'])){ echo $_POST['income']; }?>">
                            <span class="text-danger" id="expense"></span>
                            <input class="form-control" required placeholder="Monthly Expenses" type="number" name="expense" value="<?php if(isset($_POST['expense'])){ echo $_POST['expense']; }?>">
                            <span class="text-danger" id="loan"></span>
                            <input class="form-control" required placeholder="Loan Amount" type="number" name="loanAmt" value="<?php if(isset($_POST['loanAmt'])){ echo $_POST['loanAmt']; }?>">
                            <div style="text-align: left;" >
							    <label>LOAN TYPE</label>
							 </div>
                            <input type="radio" name="loan_type" value = "business">&emsp;Small Business Loan<br>
							<input type="radio" name="loan_type" value = "mortgage">&emsp;Mortgage Loan<br>
							<input type="radio" name="loan_type" value = "personal">&emsp;Personal Loan<br><br>
    							<div style="text-align: left;" >
    							    <label>LOAN PLAN</label>
    							 </div>
							<input type="radio" name="loan_plan" value = "6">&emsp;6 months<br>
							<input type="radio" name="loan_plan" value = "12">&emsp;12 months<br>
							<input type="radio" name="loan_plan" value = "24">&emsp;24 months<br><br>
                            
                            <label>Upload Payslip/Bank Statement</label>
                            <label>pdf only</label>
                            <input required type="file" accept=".pdf" name="proof" size="80" /><br>
                            <input class="btn btn-info mt-2" action="currentLoan.php" type="submit" name="submit" value="Apply"><br>
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
		    $email = $_SESSION['email'];
		    $sel = "select * from loan_request where email = '".$email."'";
		    $ans = mysqli_query($con,$sel);
		    $row = mysqli_fetch_assoc($ans);
		    
		    $income = $_POST["income"];
            $expense = $_POST["expense"];
            $loanAmt = $_POST["loanAmt"];
            $plan = $_POST["loan_plan"];
            $type = $_POST["loan_type"];
            $date = date("Y-m-d");
            $status ="Inactive";
            if($loanAmt >=0)
            {
                if($expense >=0)
                {
                    if($income >=0)
                    {
                        if($_POST['loan_type'] == "business")
                        {
                            $type_name = "Small Business";
                            $type_desc = "Funding of small business that needs to run or grow, to help entrepreneurs to meet their goals";
                            
                                if($_POST['loan_plan'] == 6)
                                {
                                    $Int_rate = '0.42';
                                    $penality = '0.15';
                                    $months = '6';
                                }else if($_POST['loan_plan'] == 12)
                                {
                                    $Int_rate = '0.42';
                                    $penality = '0.15';
                                    $months = '12';
                                }else if($_POST['loan_plan'] == 24)
                                {
                                    $Int_rate = '0.42';
                                    $penality = '0.15';
                                    $months = '24';
                                }
                        }else if($_POST['loan_type'] == "mortgage")
                        {
                            $type_name = "Mortgage Loan";
                            $type_desc = "Loan that the borrower uses to purchase or maintain a home or other form of real estate and agrees to pay back over time";
                            if($_POST['loan_plan'] == 6)
                            {
                                $Int_rate = '0.35';
                                $penality = '0.12';
                                $months = '6';
                            }else if($_POST['loan_plan'] == 12)
                            {
                               $Int_rate = '0.35';
                                $penality = '0.12';
                                $months = '12';
                            }else if($_POST['loan_plan'] == 24)
                            {
                                $Int_rate = '0.35';
                                $penality = '0.12';
                                $months = '24';
                            }
                        }else if($_POST['loan_type'] == "personal")
                        {
                            $type_name = "Personal Loan";
                            $type_desc = "Lump sum of money borrowed from a financial institution that can be used for almost any purpose";
                                if($_POST['loan_plan'] == 6)
                                {
                                    $Int_rate = '0.25';
                                    $penality = '0.09';
                                    $months = '6';
                                }else if($_POST['loan_plan'] == 12)
                                {
                                    $Int_rate = '0.25';
                                    $penality = '0.09';
                                    $months = '12';
                                }else if($_POST['loan_plan'] == 24)
                                {
                                    $Int_rate = '0.25';
                                    $penality = '0.09';
                                    $months = '24';
                                }
                        }
                        
                        
                        
                        if(!mysqli_num_rows($ans)>0)
                        {
                             if($_POST['income']>$_POST['expense'])
                             {
                                     if($type =="mortgage" && $loanAmt < 10000)
                                     {
                                         echo '<script type="text/javascript"> alert("Mortgage Loan offers loan amount from R10 000, choose Personal/Business Loan") </script>';
                                     }
                                     else
                                     {
                                        if($income >= 5000)
                                        {
                                             //$targetfolder = "upload/";
                                             //$targetfolder = $targetfolder.basename( $_FILES['file']['name']);
                                            
                                             //$ok=1;
                                             
                                                $img_name =$_FILES['proof']['name'];
                								$img_size =$_FILES['proof']['size'];
                								$img_tmp =$_FILES['proof']['tmp_name'];
                
                								$directory = "proof/";
                								$target_file = $directory.$img_name;
                                            
                                                if(file_exists($target_file))
            									{
            										echo '<script type="text/javascript"> alert("Proof file already exists.. try Rename/New file") </script>';
            									}
                                                else
                                                {
                                                     
                                                        $first = substr($type,0,3);
                            							$random = rand(100,10000);
                            							$requestID = $first.''.$random;
                            							//requestID	paySlip	email	status	income	expense	loanAmt	type	months	interest_perc	penalty_rate	type_name	type_desc	requestDate
                                                        
                                                        $request = "insert into loan_request values('$requestID','$target_file','$email','$status','$income','$expense','$loanAmt','$type','$months','$Int_rate','$penality','$type_name','$type_desc','$date')";
                                                        $run_req = mysqli_query($con,$request);
                                                        if($run_req)
                										{
                										    echo '<script type="text/javascript"> alert("Loan is requested, click current loan tab") </script>';
                										    move_uploaded_file($img_tmp,$target_file);
                										    $loanApplied ="Yes";
                										    $updateClient = "UPDATE client set loanApplied ='".$loanApplied."'													
                												                            	where email ='".$email."'";
                										    $run = mysqli_query($con, $updateClient);
                										}
                										else
                										{
                										    echo '<script type="text/javascript"> alert("Failed to Request Loan") </script>';
                										    unlink($target_file);
                										}
                                                }
                                        }//income 5k +
                                        else
                                        {
                                             echo '<script type="text/javascript"> alert("Earn at least R5 000 to qualify for a loan") </script>';
                                        }
                                     }//mortgage n 10k+
                                 }
                                 else
                                        {
                                             echo '<script type="text/javascript"> alert("Expenses cannot be Equal to or more than Income") </script>';
                                        }
                             }
                             else
                             {
                                 echo '<script type="text/javascript"> alert("User already have a loan request or loan is rejected, check with Admin") </script>';
                             }//income>expense
                        }else
                        {
                            echo '<script type="text/javascript"> document.getElementById("income").innerHTML ="Incorrect Income Value"</script>';
                        }
		            }else
                    {
                        echo '<script type="text/javascript"> document.getElementById("expense").innerHTML ="Incorrect Expense Value"</script>';
                    }
                }else
                {
                    echo '<script type="text/javascript"> document.getElementById("loan").innerHTML ="Incorrect Loan Amount Value"</script>';
                }
                
            
		}
            
    ?>
            
            
            
        <hr>
        	<div class="form-inline pt-1">
        		<!----space--->
        	</div>
        <hr>
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
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
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