<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Siswa</title>
    <?php include '../../assets/bootstrap.php'; ?>
</head>

<body>
    <?php include '../components/header.php';
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../../index.php");
        exit();
    } ?>

    <div class="container mt-5">
        <h2>Update Data Kelas</h2>
        <?php
        require_once '../../model/update/kelas.php';
        ?>

        <form action="../../model/update/kelas.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $kelas['id']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="kelas"
                    value="<?php echo $kelas['nama_kelas']; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>