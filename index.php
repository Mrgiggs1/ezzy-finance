<?php 
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
      <!-- site metas -->
      <title>HOME</title>
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
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader --> 
     
      <!-- end header -->
      <section class="slider_section">
         <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">

            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" style="width: 100%; height:500px" src="images/slide_1.jpg" alt="First slide">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <h1><br> <strong class="yellow_bold">KASI LOAN</strong>
                           <strong class="yellow_bold">SYSTEM</strong></h1><br>
                        <p style="color: white"><br>System that helps disadvantaged <br>members of community who <br>can't be helped by the <br>government</p>
                       
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class='fa fa-angle-right'></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class='fa fa-angle-left'></i>
            </a>
            
         </div>

      </section>



<!-- CHOOSE  -->
      <div class="whyschose">
         <div class="container">

            <div class="row">
               <div class="col-md-7 offset-md-3">
                  <div class="title">
                     <h2>Clients <strong class="black">Safety First</strong></h2>
                     <span>Have a look at the below rates before you commit</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="choose_bg">
         <div class="container">
            <div class="white_bg">
            <div class="row">
                
				<table style="width: 100%; text-align: center;" border=1px;>
                               <section id="Before_you">Be sure Before you commit</section><br>
                        <tr>
                            <th>Loan Type</th>
                            <th>Interest Rate %</th>
                            <th>Over 3 Months %</th>
                        </tr>
                        
                        
                        <tr>
                            <td>Personal Loan</td>
                            <td>25%</td>
                            <td>9% of Loan Amount</td>
            			</tr>
            			 <tr>
                            <td>Mortagage</td>
                            <td>35%</td>
                            <td>12% of Loan Amount</td>
            			</tr>
            			 <tr>
                            <td>Small Business</td>
                            <td>42%</td>
                            <td>15% of Loan Amount</td>
            			</tr>
				</table>
				<p></p>
				<!--<form Method="POST">
                        R<input  required placeholder="Loan Amount" type="number" name="loan"><br>
						 *<input required type="radio" name="loan_plan" value = "6">&emsp;6 months<br>
					 	 *<input required type="radio" name="loan_plan" value = "12">&emsp;12 months<br>
						 *<input required type="radio" name="loan_plan" value = "24">&emsp;24 months<br><br>
						 
						<div class=" col-md-12">
						<input class="btn btn-info mt-2" href="#home_section" type="submit" name="submit" value="Calculate"><br>
						</div>
                </form>-->
                
            </div>
         </div>
       </div>
      </div><br>
<!-- end CHOOSE -->
                
        <?php
            if(isset($_POST['submit']))
    		{
    		    $plan = $_POST['loan_plan'];
    		    $amt = $_POST['loan'];
    		    if($plan == 6)
    		    {
    		         $tot =$amt*0.055*6 + $amt;
    		         $pen = $amt*0.1;
    		         $totPen = $tot + $pen;
                     echo '<script type="text/javascript"> alert("interest Rate: 5.5%, Penalities: 10%....Scroll Down To see your Estimation amounts") </script>';
                     echo '<h2>Amount: '.$amt.'</h2>';
                     echo '<h2> Total Loan is '.$tot.'</h2>';
                     echo '<h3> Penalities of 3 Months: '.$totPen.'</h3>';
    		        
    		    }
    		    else if($plan == 12)
    		    {
    		       
                     $tot = $amt*0.075*12 + $amt;
                     $pen = $amt*0.12;
    		         $totPen = $tot + $pen;
                     echo '<script type="text/javascript"> alert("interest Rate: 7.5%, Penalities: 12%....Scroll Down To see your Estimation amounts") </script>';
                     echo '<h2>Amount: '.$amt.'</h2>';
                     echo '<h2> Total Loan is '.$tot.'</h2>';
                     echo '<h3> Penalities of 3 Months: '.$totPen.'</h3>';
    		    }
    		    else if($plan == 24)
    		    {
    		        $tot =  $amt*0.082*24 + $amt;
    		        $pen = $amt*0.08;
    		         $totPen = $tot + $pen;
                     echo '<script type="text/javascript"> alert("interest Rate: 8.2%, Penalities: 8%....Scroll Down To see your Estimation amounts") </script>';
                     echo '<h2>Amount: '.$amt.'</h2>';
                     echo '<h2> Total Loan is '.$tot.'</h2>';
                     echo '<h3> Penalities of 3 Months: '.$totPen.'</h3>';
    		    }
    		    
    		}
        ?>
         <div class="container">
            <div class="yellow_bg">
            <div class="row">
               <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                  <div class="yellow-box">
                     <h3>Request A Loan<i><img src="icon/calll.png"/></i></h3>
                     
                     <p>No more beating for payments</p>
                  </div>
               </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                  <div class="yellow-box">
                     <a href="contact.php">Contact Now</a>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </div>

      <!-- end our product -->
      <!-- map -->
      <div class="container-fluid padi">
         <div class="map">
            <img style="width: 100%; height:400px" src="images/mapping.jpg" alt="img"/>
         </div>
      </div>
      <!-- end map --> 
      <!--  footer --> 
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