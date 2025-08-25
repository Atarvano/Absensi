<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Siswa</title>
    <?php include '../../assets/bootstrap.php';
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../../index.php");
        exit();
    }
    ?>
</head>

<body>
    <?php include '../components/header.php'; ?>

    <div class="container mt-5">
        <h2>Update Data Keterlambatan</h2>
        <?php
        require_once '../../model/update/dashboard.php';
        ?>

        <form action="../../model/update/dashboard.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $keterlambatan['id']; ?>">
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal"
                    value="<?php echo $keterlambatan['tanggal']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="alasan" class="form-label">Alasan</label>
                <textarea class="form-control" id="alasan" name="alasan"
                    required><?php echo $keterlambatan['alasan']; ?></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>