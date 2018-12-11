<?php
include "connection.php";
if(isset($_SESSION["uid"]))
{
	$location=$_SESSION['redirection'];
		header("Location: $location");
}
$phoneError="";
$emailError="";
$registered=0;
if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["zip"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["phone"]) && isset($_POST["address"]) && isset($_POST["state"]) && isset($_POST["city"]))
{
	
	$fname=mysqli_real_escape_string($con,$_POST["fname"]);
	$lname=mysqli_real_escape_string($con,$_POST["lname"]);
	$email=mysqli_real_escape_string($con,$_POST["email"]);
	$password=$_POST["password"];
	$phone=mysqli_real_escape_string($con,$_POST["phone"]);
	$address=mysqli_real_escape_string($con,$_POST["address"]);
	$state=mysqli_real_escape_string($con,$_POST["state"]);
	$city=mysqli_real_escape_string($con,$_POST["city"]);
	$zip=mysqli_real_escape_string($con,$_POST["zip"]);
	//check email registered or not
	$q=mysqli_query($con,"select * from users where email='$email'");
	if($qq=mysqli_fetch_assoc($q))
	{
		$emailError="Email already registered!";
	}
	//check mobile registered or not
	$q=mysqli_query($con,"select * from users where phone='$phone'");
	if($qq=mysqli_fetch_assoc($q))
	{
		$phoneError="Phone/Mobile already registered!";
	}
	if($emailError=="" && $phoneError=="")
	{
		
		//allowed to register
		$password=hash("sha256",$password);
		$q=mysqli_query($con,"insert into users (fname,lname,email,password,phone,address,city,state,zip) values ('$fname','$lname','$email','$password','$phone','$address','$city','$state','$zip')");
		if($q)
		{
			
			$registered=1;
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<!--  FONT AWESOME
<script src="https://use.fontawesome.com/d11aab5b9b.js"></script>
-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BoltNow - Online Super Market System</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
	
	<!-- MY CSS -->
    <link href="css/mycss.css" rel="stylesheet">
	
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Droid+Serif|Ruslan+Display|Slabo+27px" rel="stylesheet">
	<!--
	font-family: 'Ruslan Display', cursive;
	font-family: 'Baloo Bhai', cursive;
	font-family: 'Droid Serif', serif;
	font-family: 'Slabo 27px', serif;
	-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<script>
var r=<?php echo $registered; ?>;
if(r)
{
	alert("Successfully Registered!");
	window.location="login.php";
}
</script>
<body style="font-family: 'Slabo 27px', serif;">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="color:white;" class="navbar-brand" href="index.php"><img src="pics/logo.jpg"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
						<a style="color:white;"><span class="glyphicon glyphicon-earphone"></span> (+91) 9768 418 262 </a>
					</li>
                    <li>
                        <a style="color:white;" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart (<?php if(isset($_SESSION["pid"])) echo count($_SESSION["pid"]); else echo "0"; ?>)</a>
                    </li>
                    
					<li  class="dropdown">
						<a style="color:white;" class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo isset($_SESSION["fname"]) ? $_SESSION["fname"].' '.$_SESSION["lname"] : 'My Account'; ?>
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
						  <li><a href="profile.php">Profile</a></li>
						  <li><a href="orders.php">Orders</a></li>
						  <li class="divider"></li>
						  <li><a href="<?php echo isset($_SESSION["fname"]) ? 'logOut.php':'login.php'; ?>"><?php echo isset($_SESSION["fname"]) ? 'LogOut' : 'LogIn'; ?></a></li> 
						</ul>
					  </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12">
				<h1 style="font-family: 'Ruslan Display', cursive;" align="center">Registration!</h1>
			</div>
            <div class="col-md-3">
                <p class="lead">Why BoltNow?:</p>
                <div style="color:green;" class="list-group">
				
				  <a style="text-decoration:none;color:green;"><span class="glyphicon glyphicon-ok"></span> Easy Registration</a><br>
				  <a style="text-decoration:none;color:green;"><span class="glyphicon glyphicon-ok"></span> Track your orders</a><br>
				  <a style="text-decoration:none;color:green;"><span class="glyphicon glyphicon-ok"></span> Earn credits on shopping</a><br><hr>
				  Already Registered?
				  <a href="login.php" style="text-decoration:none;"><button type="button"  class="btn btn-info btn-block">Login</button></a>
                </div>
            </div>

            <div class="col-md-9">
				
                

                <div class="row">
					<div class="col-lg-8">
					
					<form action="register.php" method="post">
					  <div class="form-group">
						<label for="fname">First Name:</label>
						<input type="text" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>" class="form-control" required placeholder="First Name" name="fname" id="fname">
					  </div>
					  <div class="form-group">
						<label for="lname">Last Name:</label>
						<input type="text" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>" class="form-control" required placeholder="Last Name" name="lname" id="lname">
					  </div>
					  <div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" class="form-control" required placeholder="Email" name="email" id="email">
						<font color="red"><?php echo $emailError; ?></font>
					  </div>
					  
					  <div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" required placeholder="Password" name="password" id="password">
					  </div>
					  <div class="form-group">
						<label for="phone">Phone/Mobile:</label>
						<input type="text" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>" class="form-control" required placeholder="Phone/Mobile" name="phone" id="phone">
						<font color="red"><?php echo $phoneError; ?></font>
					  </div>
					  
					  <div class="form-group">
						  <label for="address">Address:</label>
						  <textarea class="form-control" rows="5" required placeholder="Address" name="address" id="address"><?php echo isset($_POST['address']) ? $_POST['address'] : '' ?></textarea>
						</div>
					  
					  <div class="form-group">
						<label for="state">State:</label>
						<input type="text" value="<?php echo isset($_POST['state']) ? $_POST['state'] : '' ?>" class="form-control" required placeholder="State" name="state" id="state">
					  </div>
					  <div class="form-group">
						<label for="city">City:</label>
						<input type="text" value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>" class="form-control" required placeholder="City" name="city" id="city">
					  </div>
					  <div class="form-group">
						<label for="zip">Zip:</label>
						<input type="text" value="<?php echo isset($_POST['zip']) ? $_POST['zip'] : '' ?>" class="form-control" required placeholder="Zip" name="zip" id="zip">
					  </div>
					  
					  <button type="submit" class="btn btn-success">Submit</button>
					</form>
					</div>
					<!-- DEMO PRODUCT TILE -->
					<!--
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
							
                            <img class="img-responsive" style="height:200px; width:auto;" src="pics/cheeze1.jpg" alt="" />
                            <div class="caption">
                                <h4 class="pull-right">&#x20B9;24.99</h4>
                                <h4><a style="text-decoration:none;">First Product</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            <div class="ratings">
								
								<div style="padding-bottom:10px;padding-top:5px;" class="input-group">
									  <span class="input-group-btn">
										  <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
											  <span class="glyphicon glyphicon-minus "></span>
										  </button>
									  </span>
									  <input type="text" name="quant[1]" class="form-control input-number" value="5" min="5" max="10">
									  <span class="input-group-btn ">
										  <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
											  <span class="glyphicon glyphicon-plus"></span>
										  </button>
									  </span>
								  </div>
                                <p class="pull-right ">
								
								<button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
								</p>
                                <p>
                                    20+ Available
                                </p>
                            </div>
                        </div>
                    </div>
					-->


                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                     <p>Copyright &copy; BoltNow <?php echo date("Y",time()); ?></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- My JS -->
	<script src="js/myjs.js"></script>

</body>

</html>
