<?php
	include "stemming.php";
	include "koneksi.php";
	
	//mengambil data artikel dan dimasukkan ke array
	$result = mysqli_query($connect, "SELECT * FROM artikel");
	$string_artikel = array();
	$array_token = array();
	while($row = mysqli_fetch_assoc($result)){
		$string_artikel[] = $row['isi_artikel'];
	}
	
	foreach($string_artikel as $key => $value){
		$array_token[] = explode(" ", $value);
	}
	
	/*
	$ambildata_artikel = file_get_contents("artikel1.txt");
	$strToken = strtok($ambildata_artikel," ");
	$array_token = array();
	$array_token2 = array();
	while($strToken){
		$hasil = $strToken."\r\n"; 
		$strToken = strtok(" ");
		//$file = fopen("hasiltoken.txt","a");
		//fwrite($file,$hasil);
		//fclose($file);
		array_push($array_token, $hasil);
		array_push($array_token2, $hasil);
	}
	*/
	
	//menghilangkan simbol-simbol pada array artikel
	/*
	$array_token = preg_replace("/[^a-zA-Z0-9\-]+/", " ", $array_token);
	$array_token = array_map('strtolower', $array_token);
	$array_token2 = preg_replace("/[^a-zA-Z0-9\-]+/", " ", $array_token2);
	$array_token2 = array_map('strtolower', $array_token2);
	*/
	
	//mengambil data stop word dan dimasukkan ke array
	$result = mysqli_query($connect, "SELECT * FROM stopwords");
	$array_stopword = array();
	
	while($row = mysqli_fetch_assoc($result)){
		$array_stopword[] = trim($row['stopwords']);
	}

	/*
	$bacafile_stopword = fopen("stopword 1300.txt", 'r'); 
	if($bacafile_stopword) {
	   $array_stopword = explode("\n", fread($bacafile_stopword, filesize("stopword 1300.txt")));
	}
	*/
	
	//menghilangkan simbol-simbol pada array stop word
	/*
	$array_stopword = preg_replace("/[^a-zA-Z0-9\-]+/", " ", $array_stopword);
	$array_stopword = array_map('strtolower', $array_stopword);
	*/
	
	//proses filtering dengan stopword
	$array_hasil_filter = array();
	foreach($array_token as $key => $value){
		$array_hasil_filter[] = array_values(array_udiff($array_token[$key], $array_stopword,'strcasecmp'));
	}
	
	//proses stemming dan tagging
	$array_stem = array();
	$count = count($array_hasil_filter);
	$var = 23399;
	for($i=95; $i<100; $i++){
		$array_stem[$i] = array();
		foreach($array_hasil_filter[$i] as $key2 => $kata2){
			$array_stem[$i][] = hapusakhiran(hapusawalan2(hapusawalan1(hapuspp(hapuspartikel($kata2)))));
		}
		
		foreach($array_stem[$i] as $key => $kata){
			$array_stem[$i][$kata] = array();
			$var_dump = count(array_keys($array_token[$i], $kata));
			$array_stem[$i][$kata][] = $var_dump;
			$var++;
			$tes = $i+1;
			$result = mysqli_query($connect, "INSERT INTO jumlah_kata(id_jumlah_kata, id_artikel, kata, jumlah) VALUES('$var','$tes', '$kata', '$var_dump')");
			if($result == true){
				echo $i.".".$key.".) save berhasil";
			}else{
				echo $i.".".$key.".) save gagal";
			}
			echo "<br>";
		}
	}

	//print_r($array_stem);
?>