<?php
    if(!isset($_SESSION['username']))
    {
        echo "Redirecting...";
        echo "<script>
        function kembali()
        {
        alert(\"Maaf, Anda Harus Login Dahulu !\");
        location.href='index.php';
        }   
        kembali();
        </script>";
        exit;
    }
?>
