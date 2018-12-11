<?php
include "connection.php";
$type="all";
$_SESSION["redirection"]="index.php";
if(isset($_GET["type"]) && !empty($_GET["type"]))
	{
		$type=mysqli_real_escape_string($con,$_GET["type"]);
		
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
				<h1 style="font-family: 'Ruslan Display', cursive;" align="center">Welcome to BoltNow! We have great offers!</h1>
			</div>
            <div class="col-md-3">
                <p class="lead">Categories</p>
                <div class="list-group">
                    <a href="index.php" class="list-group-item <?php if($type=='all') echo 'myActive';?>">All</a>
                    <a href="?type=dairy" class=" list-group-item <?php if($type=='dairy') echo 'myActive';?>">Skin</a>
                    <a href="?type=vegetables" class=" list-group-item <?php if($type=='vegetables') echo 'myActive';?>">Hair</a>
                    <a href="?type=pulses" class="list-group-item <?php if($type=='pulses') echo 'myActive';?>">Lips</a>
                    <a href="?type=rice" class="list-group-item <?php if($type=='rice') echo 'myActive';?>">Body</a>
                    <a href="?type=others" class="list-group-item <?php if($type=='others') echo 'myActive';?>">Others</a>
                </div>
            </div>

            <div class="col-md-9">
				
                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="pics/ban2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="pics/ban1.png" alt="">
                                </div>
                                
                                                                <div class="item">
                                    <img class="slide-image" src="pics/ban3.png" alt="">
                                </div>
                                
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
					<?php
					if(isset($_GET["type"]) && !empty($_GET["type"]))
					{
						$type=mysqli_real_escape_string($con,$_GET["type"]);
						$p=mysqli_query($con,"select * from products where availability>0 and type='$type' order by sold desc");
						if(!$pp=mysqli_fetch_assoc($p))
							$p=mysqli_query($con,"select * from products where availability>0 order by sold desc limit 6");
					}
					else
					$p=mysqli_query($con,"select * from products where availability>0 order by sold desc limit 6");
					$i=0;
					while($product=mysqli_fetch_assoc($p))
					{
						echo  '<div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">';
						$present=0;
						if(isset($_SESSION["pid"]) && !empty($_SESSION["pid"]))
						{
							$pid=$product["pid"];
							$index=array_search($pid,$_SESSION["pid"]);
							if(in_array($pid,$_SESSION["pid"]))
							{
								echo '<div class="circle">'.$_SESSION["quantity"][$index].'</div>';
								$present=1;
							}
						}
						echo '
							
                            <img class="img-responsive" style="height:200px; width:auto;padding: 10px 10px 10px 10px;" src="'.$product["image"].'" alt="" />
                            <div class="caption">
                                <h4 class="pull-right">&#x20B9;'.$product["price"].'</h4>
                                <h4><a style="text-decoration:none;">'.$product["name"].'</a>
                                </h4>
                                <p>'.$product["description"].'</p>
                            </div>
                            <div class="ratings">
								
								<div style="padding-bottom:10px;padding-top:5px;" class="input-group">
									  <span class="input-group-btn">
										  <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="q'.$product["pid"].'">
											  <span class="glyphicon glyphicon-minus "></span>
										  </button>
									  </span>
									  <input type="text" name="q'.$product["pid"].'" id="q'.$product["pid"].'" class="form-control input-number" value="1" min="1" max="'.$product["availability"].'">
									  <span class="input-group-btn ">
										  <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="q'.$product["pid"].'">
											  <span class="glyphicon glyphicon-plus"></span>
										  </button>
									  </span>
								  </div>
                                <p class="pull-right ">
								'; 
								if($present)
									echo '<button type="button" id="'.$product["pid"].'" class="btn btn-danger btn-xs removeFromCart"><span class="glyphicon glyphicon-remove"></span> Remove</button>';
								echo '
								
								<button type="button" id="'.$product["pid"].'" class="btn btn-info btn-xs addToCart"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
								</p>
                                <p>
                                    ';
									if($product["availability"]>20)
										echo '20+ Available';
									else if($product["availability"]>10)
										echo '10+ Available';
									else
										echo $product["availability"].' Available';
									echo '
                                </p>
                            </div>
                        </div>
                    </div>';
					$i++;
					}
					if($i==0)
						echo '<h1 align="center">Sorry No products available</h1>';
					?>
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
