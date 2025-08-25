<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Siswa</title>
    <?php include '../../assets/bootstrap.php';
    session_start(); ?>

</head>

<body>
    <?php include '../components/header.php';
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../../index.php");
        exit();
    } ?>

    <div class="container mt-5">
        <h2>Update Data Guru</h2>
        <?php
        require_once '../../model/update/guru.php';
        ?>

        <form action="../../model/update/guru.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $guru['id']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $guru['nama']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="<?php echo $guru['username']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>