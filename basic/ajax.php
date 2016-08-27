

<?php
    include "koneksi.php";
    $idBO    = $_GET['id_barang_order'];
    $idO     = $_GET['id_order'];
    $idB     = $_GET['id_barang'];
    $idJB     = $_GET['jumlah_barang'];
    $input = mysql_query ("INSERT INTO `barang_order` (`no`, `id_barang_order`, `id_order`, `id_barang`, `jumlah_barang`) VALUES (NULL, '$idBO', '$idO', '$idB', '$idJB')");
    
        if ($input) {
            echo 'successfully';
        } else {
            echo 'NOT successfully';
        }
?>