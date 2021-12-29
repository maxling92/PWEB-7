<?php

include("config.php");

// if register is successful
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    
    // query to insert new data
    $sql = "INSERT INTO siswa (nama, alamat, kelamin, agama, sekolah_asal) VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah')";
    $query = mysqli_query($db, $sql);
    // if success
    if( $query ) {
        //redirect to index.php with status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // if fail, redirect with status gagal
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>