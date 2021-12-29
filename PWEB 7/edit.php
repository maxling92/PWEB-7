<!DOCTYPE html>
<html lang="en">
<head>
    <?php

    include("config.php");

    // if error
    if (!isset($_GET['id'])) {
        header('Location: list-siswa.php');
    }

    // get id from query
    $id = $_GET['id'];

    // select query to get data from id 
    $sql = "SELECT * FROM siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);
    $siswa = mysqli_fetch_assoc($query);

    // if not found
    if (mysqli_num_rows($query) < 1) {
        die("data tidak ditemukan...");
    }

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>index</title>
</head>
<body class="min-vh-100  d-flex flex-column">
   <div class="container-fluid content flex-grow-1 d-flex flex-column justify-content-center">
        <div class="m-auto justify-content-center">
        <h1>Form Edit</h1>
        
        <div class="jumbotron m-auto p-4 justify-content-center">
        <form action="edit_post.php" method="POST" class="form-group">
                <div class="form-group mt-3 mx-2">
                    <input class="a" type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
                    <label for="nama">Nama: </label><br>
                    <input class="a" type="text" name="nama" placeholder="nama lengkap" size="55" value="<?php echo $siswa['nama'] ?>" />
                </div>
                <div class="form-group mt-3 mx-2">
                    <p>
                        <label for="alamat">Alamat: </label><br>
                        <textarea name="alamat"><?php echo $siswa['alamat'] ?></textarea>
                    </p>
                </div>
                <div class="form-group mt-3 mx-2">
                    <p>
                        <label for="kelamin">Jenis Kelamin: </label>
                        <?php $jk = $siswa['kelamin']; ?>
                        <br>
                        <label><input type="radio" name="kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?>> Laki-laki</label>
                        <label><input type="radio" name="kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>> Perempuan</label>
                    </p>
                </div>
                <div class="form-group mt-3 mx-2">
                    <p>
                        <label for="agama">Agama: </label><br>
                        <?php $agama = $siswa['agama']; ?>
                        <select name="agama">
                            <option <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
                            <option <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                            <option <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                            <option <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
                        </select>
                    </p>
                </div>

                <div class="form-group mt-3 mx-2 my-4">
                    <p>
                        <label for="sekolah_asal">Sekolah Asal: </label><br>
                        <input class="a" size="55" type="text" name="sekolah_asal" placeholder="nama sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" />
                    </p>
                </div>

                <div class="form-group mt-3 mx-2 my-4">
                    <input class="a btn btn-dark" type="submit" value="Simpan" name="simpan" />
                </div>

            </form>
        </div>
        </div>
   </div>
    
</body>
</html>