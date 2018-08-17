<?php
	include "koneksi.php";
	
	if(isset($_GET['search'])){
		$string_search = $_GET['search'];
		$array_search = explode(" ", $string_search);
		$string_jumlah_kata = array();
		$var = 1;
		foreach($array_search as $key => $value){
			$result = mysqli_query($connect, "SELECT DISTINCT kata, jumlah, id_artikel FROM jumlah_kata WHERE kata = '$value'");
			while($row = mysqli_fetch_assoc($result)){
				$var_dump = "var".$var;
				$string_jumlah_kata[$var_dump] = array();
				$string_jumlah_kata[$var_dump][] = $row['jumlah'];
				$string_jumlah_kata[$var_dump][] = $row['id_artikel'];
				$var++;
			}
		}
		
		rsort($string_jumlah_kata);
		
		foreach($string_jumlah_kata as $key => $value){
			echo "<article>";
			$vardmp = $string_jumlah_kata[$key][1];
			$result = mysqli_query($connect, "SELECT * FROM artikel WHERE id_artikel = '$vardmp'");
			while($row = mysqli_fetch_assoc($result)){
				$judul = $row['judul_artikel'];
				$isi = $row['isi_artikel'];
			}
			if(strlen($isi) > 500){
				$stringCut = substr($isi, 0, 500);
				
				$isi = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="detail.php?judul='.$judul.'&isi='.$isi.'">Read More</a>';
			}
			echo "<h1>" . $judul . "</h1>";
			echo "<p>" . $isi . "</p>";
			echo "</article>";
		}
		
		print_r($string_jumlah_kata);
	}
?>