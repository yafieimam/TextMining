<?php
	include "koneksi.php";
	$i = 1;
	while($i <= 100){
		$ambildata_artikel = file_get_contents("artikel/artikel$i.txt");
		$ambiljudul_artikel = file_get_contents("judulartikel/judul_artikel$i.txt");
		$strToken = strtok($ambildata_artikel," ");
		$array_token = array();
		while($strToken){
			$hasil = $strToken."\r\n"; 
			$strToken = strtok(" ");
			array_push($array_token, $hasil);
		}
		
		$strToken2 = strtok($ambiljudul_artikel," ");
		$array_judul = array();
		while($strToken2){
			$hasil2 = $strToken2."\r\n"; 
			$strToken2 = strtok(" ");
			array_push($array_judul, $hasil2);
		}
		
		$array_token = preg_replace("/[^a-zA-Z0-9\-]+/", "", $array_token);		
		$array_token = array_map('strtolower', $array_token);
		
		$array_judul = preg_replace("/[^a-zA-Z0-9\-]+/", "", $array_judul);
		$array_judul = array_map('strtolower', $array_judul);
		
		$string_artikel = implode(" ", $array_token);
		$string_judul = implode(" ", $array_judul);
		//print_r($array_token);
		
		$result = mysqli_query($connect, "INSERT INTO artikel(id_artikel, isi_artikel, judul_artikel) VALUES('$i', '$string_artikel', '$string_judul')");
		
		if($result == true){
			echo $i.".) save berhasil";
		}else{
			echo $i.".)save gagal";
		}
		$i++;
	}
?>	