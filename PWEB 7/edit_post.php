<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    // query update
    $sql = "UPDATE siswa SET nama='$nama', alamat='$alamat', kelamin='$jk', agama='$agama', sekolah_asal='$sekolah' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // if success
    if( $query ) {
       
        header('Location: listregister.php');
    } else {
        // if failed
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>