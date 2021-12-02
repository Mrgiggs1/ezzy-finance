<?php
	SESSION_START();
	require("header.php");
	require("dbconnection.php");
	require("checklogin.php");
	$email = base64_decode(urldecode($_GET['id']));
	
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
      <title>Loan Request/Payment</title>
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
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!-- CSS only -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <!--<div class="loader_bg">-->
      <!--   <div class="loader"><img src="images/loading.gif" alt="#" /></div>-->
      <!--</div>-->
      <!-- end loader -->
       <div class="brand_color">
			
		   <div class="container">
				<div class="text-center" id="user_info">
						<h1>Loan Request/Payment</h1>
					</div>
			</div>
		</div>
	<?php
            $check = "select * from loan_request where email= '".$email."'";
        	$queryStatus= mysqli_query($con,$check);
        	$status = mysqli_fetch_assoc($queryStatus);
    
?>
		<div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <form METHOD="POST">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
								<figure><img style="width:80%; height:400px" alt="  No User Profile Picture" src="<?php echo $line['profilePicture']; ?>"/>  </figure>
							</div>
							<div style="text-align:left;" class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
								<br><span class="text-secondary" >Loan Request Status: <strong><?php echo $status['status']; ?></strong></span><span class="text-danger" id="slip"></span>
								<?php
								
								if($status['status']=="approve")
								{
								        echo '
								            <div class="col-xl-6">
								                <div class="brand_color">
                                				<div class="text-left" id="user_info">
                                					<a href="viewPaid.php"><i class="fa fa-arrow-left" aria-hidden="true"> Back</i>
                                					</a>
                                					
                                				</div>
                                			</div>
                                		</div>';
								        $select = "select * from payment,user,loan_info where user.email = payment.email and loan_info.email = user.email AND payment.email= '".$email."'";
                                    	$query= mysqli_query($con,$select);
                                    	$line = mysqli_fetch_assoc($query);
								    	if($line['proof'] == ""){
                                    	    echo '<br><script type="text/javascript"> document.getElementById("slip").innerHTML = "  But No Payment Slip as Yet" </script><br>';
                                    	}else
                                    	{
                                    	        $balance = $line['balance'];  
                                    	        
                        					   
                                    	        echo '<div style="text-align:left;" class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
        								    	
        								    	<form METHOD="POST">
        								    	<table>
            								            <tr>
            								    	        <th>Surname</th>
            								    	        <td> :'.$line['lName'].'</td>
            								    	   </tr>
            								    	   <tr>
            								    	        <th>Name</th>
            								    	        <td> :'.$line['fName'].'</td>
            								    	   </tr>
            								    	   <tr>
            								    	        <th>Date Applied</th>
            								    	        <td> :'.$line['date_created'].'</td>
            								    	   </tr>
            								    	   <tr>
            								    	        <th>Date Aproved</th>
            								    	        <td> :'.$line['date_released'].'</td>
            								    	   </tr>
            								    	    <tr>
            								    	        <th>Loan Amount</th>
            								    	        <td> :R '.$line['amount'].'</td>
            								    	   </tr>
            								    	    <tr>
            								    	        <th>Last Payment</th>
            								    	        <td> :R '.$line['paymentAmt'].'</td>
            								    	   </tr>
            								    	   <tr>
            								    	        <th>Loan Balance </th>
            								    	        <td> :R '.$line['balance'].'</td>
            								    	   </tr>
            								    	   <tr>
            								    	        <th>Payment Slip</th>
            								    	        <td>
                                    						    : <a href="'.$line['proof'].'"> View Slip</a>
                                    						</td>
            								    	   </tr>
            								    	</tbody>
        								    	
        								    	</table>
        								    	<span class="text-danger" id="currency"></span>
        								    	<input class="form-control" required placeholder="R0,00" type="text" name="pay">
        								    	<input class="btn btn-info mt-2" type="submit" name="submit" value="Payment"><br>
        								    </form>
        								    	
        								    </div><br>';
                                    	}
								    
								}else if($status['status']=="Inactive")
								{
								        echo '<div class="col-xl-6">
								                <div class="brand_color">
                                				<div class="text-left" id="user_info">
                                					<a href="loan_request.php"><i class="fa fa-arrow-left" aria-hidden="true"> Back</i>
                                					</a>
                                					
                                				</div>
                                			</div>
                                		</div>';
                        				$select1 = "select * from loan_request, user where user.email = loan_request.email AND status like '%Inactive%' AND loan_request.email= '".$email."'";
                        				$query1= mysqli_query($con,$select1);
                        				$row = mysqli_fetch_assoc($query1);
                        				
                        				 echo '<div style="text-align:left;" class="col-xl-6 col-lg-6 col-md-12 col-sm-6">
        								    	
        								    	<form METHOD="POST">
        								    	<table>
            								            <tr>
            								    	        <th>Surname</th>
            								    	        <td> :'.$row['lName'].'</td>
            								    	   </tr>
            								    	   <tr>
            								    	        <th>Name</th>
            								    	        <td> :'.$row['fName'].'</td>
            								    	   </tr>
            								    	   <tr>
            								    	        <th>Date Applied</th>
            								    	        <td> :'.$row['requestDate'].'</td>
            								    	   </tr>
            								    	   <tr>
            								    	        <th>Loan Type</th>
            								    	        <td> :'.$row['type_name'].'</td>
            								    	   </tr>
            								    	    <tr>
            								    	        <th>Loan Amount</th>
            								    	        <td> :R '.$row['loanAmt'].'</td>
            								    	   </tr>
            								    	    <tr>
            								    	        <th>Income</th>
            								    	        <td> :R '.$row['income'].'</td>
            								    	   </tr>
            								    	   <tr>
            								    	        <th>Expenses </th>
            								    	        <td> :R '.$row['expense'].'</td>
            								    	   </tr>
            								    	   <tr>
            								    	        <th>Loan Period </th>
            								    	        <td> :'.$row['months'].' Months</td>
            								    	   </tr>
            								    	   <tr>
            								    	        <th>Income Statement</th>
            								    	        <td>
                                    						    : <a href="'.$row['paySlip'].'"> Open</a>
                                    						</td>
            								    	   </tr>
            								    	</tbody>
        								    	
        								    	</table>
        								    	<span class="text-danger" id="currency"></span>
        								    	<span class="text-success">Approve/Reject</span>
        								    	<select required id="spec" name="status" ><optgroup required>
                        						    <option value="Inactive"></option>
                        							<option value="approve">Approve</option>
                        							<option value="reject">Reject</option>
                        							</optgroup>
                        							</select>
                        							</label>
                        						</select><br>
        								    	<input class="btn btn-info mt-2" type="submit" name="loanSubmit" value="Send"><br>
        								    	
        								    </form>
        								    	
        								    </div><br>';
								}
								
								
								?>
							
								
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
					    $pay = $_POST['pay'];
					        
					    $payment = floatval($pay);
					    
					    $payment = round($payment, 2);
					    $balance = $line['balance'];
					    
					    echo $payment.' - '.$balance.' - '.$tot;
					    if($payment >= $balance)
					    {
					        echo '<script type="text/javascript"> alert("Enter Amount below or equal to outstanding balance.") </script>';
					    }
					    else
					    {
					        if($payment>=0 && !$payment=="")
					        {
        					        
        					        $date = date("Y-m-d");
        					        $updatePayment = "UPDATE payment set paymentAmt ='".$payment."',
        					                                            balance = '".$tot."',
        					                                            created_Date = '".$date."'
        												where email ='".$email."'";
        							$run = mysqli_query($con, $updatePayment);
        							
        							if($run)
        							{
        							    echo '<script>
                                			window.location.href="viewPaid.php";
                                			</script>
                                			';
        							}
        							else
        							{
        							    echo '<script type="text/javascript"> document.getElementById("payErr").innerHTML = "*Error Processing Payment" </script>';
        							}
        							
    		                }else
    		                {
    		                    echo '<script type="text/javascript"> document.getElementById("currency").innerHTML = "*Enter valid Currency" </script>';
    		                }
    		                
					    }	
					}else if(isset($_POST['loanSubmit']))
					{
					    
					    $sele = "select * from loan_request where email= '".$email."'";
					    $query = mysqli_query($con,$sele);
					    $run = mysqli_fetch_assoc($query);
					    
                        $amount = $run['loanAmt'];
                        $status = $_POST['status'];
                        
                        $date_released = date("Y-m-d");
                        $date_created = $run['requestDate'];
                        
       
                        $requestID = $run['requestID'];
                        
					    if($status == 'approve')
					    {
							$first = strtoupper($row_email[0]);
							$second = strtoupper($row_email[3]);
        			        
							//loanID	email	loan_type	loan_plan	amount	status	date_released	date_created
							
							$random = rand(100,10000);
							$loanID = "loan".'-'.$first.''.$second.''.$random;
							
							//loanID	requestID	email	amount	status	date_released	date_created
							$loan = "insert into loan_info values('$loanID','$requestID','$email','$amount','$status','$date_released','$date_created')";
							
							//proof	email	amount	paymentAmt	balance	penalty_amt	overdue	created_Date
							$proof = "";
							$paymentAmt = 0.0;
						
							$penalty_amt = 0.0;
							$overdue = 0;
							$created_Date = "0/0/0";
							
                            $paymentID = "pay-".''.$first.''.$second.''.$random;
                            $tot = $run['loanAmt'] + $run['loanAmt']*(1*$run['interest_perc']);
                            $totLoan = round($tot,2);
                            $balance = $totLoan;
							$pay = "insert into payment values('$paymentID','$proof','$email','$totLoan','$paymentAmt','$balance','$penalty_amt','$overdue','$created_Date')";
							$run_pay = mysqli_query($con,$pay);
							
                            $run_loan = mysqli_query($con,$loan);
                            if($run_loan)
							{
							    echo '<script type="text/javascript"> alert("Loan is now Active, click ACTIVE LOAN tab") </script>';
        						$updateStatus = "UPDATE loan_request set status ='".$status."'													
												where email ='".$email."'";
							    $run = mysqli_query($con, $updateStatus);
							    	echo '<script>
        							window.location.href="loan_request.php";
        							</script>
        							';
							}
							else
							{
							    echo '<script type="text/javascript"> alert("Error Loan Confirmation") </script>';
							}
					    }
					    else if($status == 'reject')
					    {
					        
    					    $updateStatus = "UPDATE loan_request set status ='".$status."'													
    													where email ='".$email."'";
    						$run = mysqli_query($con, $updateStatus);
    						 echo '<script type="text/javascript"> alert("Admin Rejected the Loan") </script>';
    						if($run)
        					{
        						echo '<script>
        							window.location.href="loan_request.php";
        							</script>
        							';
        					}
					    }else if($status == 'Inactive')
					    {
					        
    					    $updateStatus = "UPDATE loan_request set status ='".$status."'													
    													where email ='".$email."'";
    						$run = mysqli_query($con, $updateStatus);
    						if($run)
        					{
        						echo '<script>
        							window.location.href="loan_request.php";
        							</script>
        							';
        					}
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