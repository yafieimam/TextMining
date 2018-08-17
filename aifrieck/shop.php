<!DOCTYPE html>
<html lang="en">
<head>
	<?php
    session_start();
    include "cek_session.php";
	include "conn.php";
	?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | Aifrieck Delivery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript">
    	var display_div = false;
    	function showDiv1(divId) {
    		if(!display_div){
	    		for(var i=1; i<100; i++){
	    			if(document.getElementById(divId+''+i)){
	    				var name = divId+''+i;
	    				document.getElementById(name).style.display = "block";
	    			}else{
	    				continue;
	    			}
			   	}
			   	display_div = true;
	  		}else{
	  			for(var i=1; i<100; i++){
	  				if(document.getElementById(divId+''+i)){
	    				var name = divId+''+i;
	    				document.getElementById(name).style.display = "none";
	    			}else{
	    				continue;
	    			}
	  			}
			   	display_div = false;
			}
		}

		// function showDiv2() {
		//    document.getElementById('menupakethemat').style.display = "block";
		// }

		// function hideDiv() {
		// 	document.getElementById('menuhamburger').style.display = "inline";
		// }

		$('.addButton').unbind('click').click(function() {
			document.getElementById('menuhamburger').style.display = "inline";
		});
    </script>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img style="width:130px" src="images/home/logo1.png" alt="" /></a>
						</div>

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php
				                if(isset($_SESSION['username']))
				                {
				                    if($_SESSION['level'] == "admin"){
				                        header('location:admin/index.php');
				                    }else if($_SESSION['level'] == "user"){
				                ?>
								<li><a href="profile.php?id_user=<?php echo $_SESSION['id_user']; ?>"><i class="fa fa-user"></i>Edit Profile (<?php echo $_SESSION['fullname']; ?>)</a></li>
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
								<?php
									}
								}else{
								?>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Order<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Menu Makanan</a></li>
										<?php
						                if(isset($_SESSION['username']))
						                {
						                    if($_SESSION['level'] == "admin"){
						                        header('location:admin/index.php');
						                    }else if($_SESSION['level'] == "user" ){
						                ?>
										<li><a href="checkout.php">Checkout</a></li> 
										<li><a href="cart.php">Cart</a></li> 
										<?php
											}
										}
										?>
                                    </ul>
                                </li> 
                                <?php
						        if(isset($_SESSION['username']))
						        {
						            if($_SESSION['level'] == "admin"){
						                header('location:admin/index.php');
						            }else if($_SESSION['level'] == "user"){
						        ?>
								<li><a href="contact-us.php">Lacak Pesanan</a></li>
								<?php
									}
								}
								?>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
								<form name="form" action="" method="get" >
								 <input type="text" name="pencarian" id="pencarian" placeholder="Search" style="width:250px; background-position:225px; outline:medium none; padding-left:10px;" onkeypress="handle(event)" onfocusout="hideSearch1()"/>
								 <ul id="hasil" style="display:none; background:#F0F0E9; border:medium none;">
									<li><a href="product-details.php?id=21">Paket Kombo Ayam</a></li>
									<li><a href="product-details.php?id=22">Paket Kombo Burger</a></li>
							 		<li><a href="product-details.php?id=23">Paket Panas</a></li>
						         	<li><a href="product-details.php?id=24">Paket Super Besar</a></li>
						         	<li><a href="product-details.php?id=25">Paket Super Family</a></li>
						         	<li><a href="product-details.php?id=26">Paket Superstar</a></li>
								 </ul>
								</form>
								 <script type="text/javascript">

								function handle(e){
									if(e.keyCode === 13){
										e.preventDefault();
										document.getElementById("hasil").style.display = "block";
									}
								}

								// function hideSearch1() {
							 //    	document.getElementById("hasil").style.display = "none";
								// }
						    </script>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Menu Makanan</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php
							$hasil=  mysqli_query($connect, "SELECT * FROM kategori");

							if(!$hasil){
							    die("PERMINTAAN QUERY GAGAL");
							}
				            while($baris=mysqli_fetch_array($hasil))
				            {
				            	$nama = str_replace(" ", "", $baris['nama_kategori']);
				            	$nama2 = str_replace("-", "", $nama);
				            	$nama3 = strtolower($nama2);
							?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" class="addButton" href="<?php echo "#".$nama; ?>" onclick="showDiv1('<?php echo $nama3; ?>');">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<?php
											echo $baris['nama_kategori']; 
											?>
										</a>
									</h4>
								</div>
								<div id="<?php echo $nama; ?>" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<?php
											$hasil2=  mysqli_query($connect, "SELECT * FROM produk");
											while($baris2=mysqli_fetch_array($hasil2)){
												if($baris2['id_kategori'] == $baris['id_kategori']){
											?>
													<li><a href=""><?php echo $baris2['nama_produk']; ?></a></li>
											<?php
												}
											}
											?>
										</ul>
									</div>
								</div>
							</div>
							<?php
							}
							?>
						</div><!--/menu-products-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Produk</h2>
						<?php
							$hasil=  mysqli_query($connect, "SELECT * FROM produk");
							

							if(!$hasil && !$hasil2){
							    die("PERMINTAAN QUERY GAGAL");
							}
							$n=0;
				            while($baris=mysqli_fetch_row($hasil))
				            {

				            	$hasil2=  mysqli_query($connect, "SELECT * FROM kategori");
				            	while($baris2=mysqli_fetch_array($hasil2)){
					            	if($baris[1] == $baris2['id_kategori']){
					            		$nama = str_replace(" ", "", $baris2['nama_kategori']);
					            		$nama2 = str_replace("-", "", $nama);
				            			$nama3 = strtolower($nama2);
					            	}
					            }
					            $n++;
							?>
						<div id="<?php echo $nama3."".$n; ?>" class="col-sm-4" style="display:none;">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="product-details.php?id=<?php echo $baris[0]; ?>"><img src="<?php echo "image/".$baris[3] ?>" alt="" style="width:250px; height:170px;"/></a>
										<h2><?php echo "Rp ". $baris[5].",-"; ?></h2>
										<p><?php echo $baris[2] ?></p>
										<a href="proses_cart.php?id=<?php echo $baris[0] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
							</div>
						</div>
						<?php
								
							}
						?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-widget" >
			<div class="container" >
					<div class="col-sm-2" >
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Us</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
							</ul>
						</div>
					</div>
			</div>
		</div>

		<div class="footer-bottom">
		</div>
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>