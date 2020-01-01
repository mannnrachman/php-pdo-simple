<?php
include 'conn.php';

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM karyawan WHERE idKaryawan = :id");
$query->bindParam(":id", $_GET['id']);
$query->execute();
$data = $query->fetch();

if (isset($_POST['submit'])) {
    $idKaryawan = $_POST['idKaryawan'];
    $nmKaryawan = $_POST['nmKaryawan'];
    $tglLahir = $_POST['tglLahir'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE karyawan SET nmKaryawan=:nmKaryawan, tglLahir=:tglLahir, telp=:telp, alamat=:alamat WHERE idKaryawan=:idKaryawan";

    $update = $conn->prepare($sql);

    $update->bindParam(":idKaryawan", $idKaryawan);
    $update->bindParam(":nmKaryawan", $nmKaryawan);
    $update->bindParam(":tglLahir", $tglLahir);
    $update->bindParam(":telp", $telp);
    $update->bindParam(":alamat", $alamat);
    $update->execute();
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CRUD PDO</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 style="text-align: left; font-weight: bold;">Form Edit</h4>
                <form action="" method="post">
                    <input type="hidden" name="idKaryawan" value="<?= $data['idKaryawan'] ?>">
                    <div class="form-group">
                        <label for=""><b>Nama Karyawan</b></label>
                        <input type="text" name="nmKaryawan" class="form-control" value="<?= $data['nmKaryawan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Tanggal Lahir</b></label>
                        <input type="date" name="tglLahir" class="form-control" value="<?= $data['tglLahir'] ?>">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Telepon</b></label>
                        <input type="number" name="telp" class="form-control" value="<?= $data['telp'] ?>">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Alamat</b></label>
                        <input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-info">Edit</button>
                        <button type="reset" name="reset" class="btn btn-danger">Clear</button>
                        <a href="index.php" class="btn btn-warning">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>