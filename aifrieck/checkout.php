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
    <title>Checkout | Aifrieck Delivery</title>
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

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
						<?php
						$hasil = mysqli_query($connect, "SELECT * FROM cart");
						if(!$hasil){
							die("PERMINTAAN QUERY GAGAL");
						}
						$result   = mysqli_num_rows($hasil);
						if($result==0){
							?>
							<tr>
							<td class="cart_product">
								<p>Cart Kosong</p>
							</td>
							<?php
						}else{
						while($baris = mysqli_fetch_array($hasil)){
							$id_produk = $baris['id_produk'];
							$hasil2 = mysqli_query($connect, "SELECT * FROM produk WHERE id_produk='$id_produk'");
							while($baris2 = mysqli_fetch_array($hasil2)){
								if($baris['jumlah'] == 0){
									$id = $baris['id_cart'];
									$hasil3 =  mysqli_query($connect, "DELETE FROM cart WHERE id_cart='$id'");
								}else{
						?>
						<tr>
							<td class="cart_product">
								<a href="product-details.php?id=<?php echo $baris['id_produk']; ?>"><img src="<?php echo "image/". $baris2['foto'] ?>" alt="" style="width:70px;"></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $baris2['nama_produk']; ?></a></h4>
							</td>
							<td class="cart_price">
								<p><?php echo $baris2['harga']; ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo $baris['jumlah']; ?></p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $baris['total']; ?></p>
							</td>
						</tr>
						<?php
								}
							}
						}

						$total = mysqli_query($connect, "SELECT SUM(total) AS total_akhir FROM cart");
						if(!$total){
							die("PERMINTAAN QUERY GAGAL");
						}
						while($baris3 = mysqli_fetch_array($total)){
							$ppn = $baris3['total_akhir'] * 10 / 100;
							$total_seluruh = $baris3['total_akhir'] + $ppn;
						?>
						<tr>
							<td colspan="3">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Sub Total</td>
										<td><?php echo $baris3['total_akhir']; ?></td>
									</tr>
									<tr>
										<td>PPN 10%</td>
										<td><?php echo $ppn; ?></td>
									</tr>
									<tr class="shipping-cost">
										<td>Ongkos Kirim</td>
										<td>Gratis</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span><?php echo $total_seluruh; ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
						<?php
						}
						}
						?>
					</tbody>
				</table>
			</div>

<!-- 			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div> -->

			<div class="payment-options">
				<div class="row">
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Masukkan Alamat Pengiriman</p>
							<div class="form-one">
								<form id="form-alamat" action="proses_checkout.php" method="post">
									<?php
									$total = mysqli_query($connect, "SELECT SUM(total) AS total_akhir FROM cart");
									if(!$total){
										die("PERMINTAAN QUERY GAGAL");
									}
									while($baris3 = mysqli_fetch_array($total)){
										$ppn = $baris3['total_akhir'] * 10 / 100;
										$total_seluruh = $baris3['total_akhir'] + $ppn;
									?>
									<input type="hidden" name="total_seluruh" value="<?php echo $total_seluruh ?>" style="width:500px;">
									<?php
									}
									?>
									<input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
									<input type="text" name="alamat" placeholder="Alamat" style="width:500px;">
									<input type="text" name="kecamatan" placeholder="Kecamatan" style="width:400px;">
									<input type="text" name="kota" placeholder="Kota / Kabupaten" style="width:300px;">
									<input type="text" name="kodepos" placeholder="Kode Pos" style="width:100px;">
									<textarea name="catatan" form="form-alamat" placeholder="Masukkan catatan jika diperlukan" rows="9" style="width:500px;"></textarea>
									<br><input type="submit" style="width:500px;">
								</form>
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	

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
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>