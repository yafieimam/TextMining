<?php
	include "koneksi.php";
	
	if(isset($_GET['search'])){
		$string_search = $_GET['search'];
		$array_search = explode(" ", $string_search);
		$string_jumlah_kata = array();
		$var = 1;
		foreach($array_search as $key => $value){
			$result = mysqli_query($connect, "SELECT DISTINCT kata, jumlah, id_artikel FROM jumlah_kata WHERE kata = '$value'");
			if (mysqli_num_rows($result)==0){
				echo "Penelusuran Anda - " . $string_search . " - tidak cocok dengan dokumen apa pun.";
			}
			while($row = mysqli_fetch_assoc($result)){
				$var_dump = "var".$var;
				$string_jumlah_kata[$var_dump] = array();
				$string_jumlah_kata[$var_dump][] = $row['jumlah'];
				$string_jumlah_kata[$var_dump][] = $row['id_artikel'];
				$var++;
			}
		}
		
		rsort($string_jumlah_kata);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo "Search About : ".$string_search; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Google Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,500' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Theme Style -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div id="fh5co-main">
		<div class="fh5co-intro text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<form action='hasil.php' method='GET'>
							<h1 class="intro-lead">Search Engine About Cars</h1>
							<input class="intro-lead" type="text" name="search" size="20" value="<?php echo $string_search; ?>">
							<br><br>
							<input class="intro-lead" type="submit" name="submit" value="Search">
						</form>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-portfolio">
			<?php
			$counter = "";
			foreach($string_jumlah_kata as $key => $value){
				$counter +=1;
				$vardmp = $string_jumlah_kata[$key][1];
				$result = mysqli_query($connect, "SELECT * FROM artikel WHERE id_artikel = '$vardmp'");
				while($row = mysqli_fetch_assoc($result)){
					$judul = $row['judul_artikel'];
					$isi = $row['isi_artikel'];
				}
				if(strlen($isi) > 100){
					$stringCut = substr($isi, 0, 100);
					$isi = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <p><a href="detail.php?judul='.$judul.'&isi='.$isi.'" class="btn btn-primary">Read More</a></p>';
				}
				
				if($counter == 1){
			?>
			<div class="fh5co-portfolio-item ">
				<div class="fh5co-portfolio-figure animate-box" style="background-image: url(images/work_1.jpg);"></div>
				<div class="fh5co-portfolio-description">
					<h2><?php echo $judul; ?></h2>
					<p><?php echo $isi; ?></p>
				</div>
			</div>
			<?php
			} elseif($counter == 2){
			?>
			<div class="fh5co-portfolio-item fh5co-img-right">
				<div class="fh5co-portfolio-figure animate-box" style="background-image: url(images/work_2.jpg);"></div>
				<div class="fh5co-portfolio-description">
					<h2><?php echo $judul; ?></h2>
					<p><?php echo $isi; ?></p>
				</div>
			</div>
			<?php
			$counter = 0;
			}
			}
			}
			?>
		</div>
	<footer id="fh5co-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<p>&copy; Yaff Website. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</footer>


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>

	
	</body>
</html>
