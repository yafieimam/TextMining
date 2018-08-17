<?php 
  include "conn.php";
  session_start();
  session_destroy();
  $hasil = mysqli_query($connect, "DELETE FROM cart");
  echo "Redirecting...";
        echo "<script>
        function kembali()
        {
        alert(\"Berhasil Logout !\");
        location.href='index.php';
        }   
        kembali();
        </script>";
        exit;
?>
