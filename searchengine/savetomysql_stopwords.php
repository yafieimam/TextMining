<?php
	include "koneksi.php";
	
	$bacafile_stopword = fopen("stopword 1300.txt", 'r'); 
	if($bacafile_stopword) {
	   $array_stopword = explode("\n", fread($bacafile_stopword, filesize("stopword 1300.txt")));
	}
	
	//menghilangkan simbol-simbol pada array stop word
	$array_stopword = preg_replace("/[^a-zA-Z0-9\-]+/", " ", $array_stopword);
	$array_stopword = array_map('strtolower', $array_stopword);
		
	foreach($array_stopword as $key => $value){
		$key++;
		$result = mysqli_query($connect, "INSERT INTO stopwords(id_stopwords, stopwords) VALUES('$key', '$value')");
		if($result == true){
			echo $key.".) save berhasil";
		}else{
			echo $key.".)save gagal";
		}
		echo "<br>";
	}
?>	