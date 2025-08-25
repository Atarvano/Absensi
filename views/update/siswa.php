<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Siswa</title>
    <?php include '../../assets/bootstrap.php'; ?>
</head>

<body>
    <?php include '../../model/update/siswa.php';
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../../index.php");
        exit();
    }
    include '../components/header.php'; ?>

    <div class="container mt-5">
        <h2>Update Data Siswa</h2>

        <form action="../../model/update/siswa.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $siswa['id']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $siswa['nama']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select name="kelas" id="kelas" class="form-select" required>
                    <option value="">Pilih Kelas</option>
                    <?php
                    foreach ($kelas as $k): ?>
                        <option value="<?= $k['id']; ?>" <?php if ($k['id'] == $siswa['id_kelas'])
                              echo 'selected'; ?>>
                            <?= $k['nama_kelas']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>