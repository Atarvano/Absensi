<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <?php include '../assets/bootstrap.php';
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        } ?>
    </head>
</head>

<body>
    <?php include 'components/header.php'; ?>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../model/add/kelas.php" method="POST">

                        <div class="mb-3">
                            <label for="recipient-name" name="nama" class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" id="recipient-name" name="nama_kelas">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="mt-5">
            <h1>Dashboard</h1>
            <p>Kelas</p>
        </div>
        <div class="d-flex my-3">
            <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../model/get/kelas.php';
                $no = 1;
                foreach ($kelas as $row) {
                    ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $row['nama_kelas']; ?></td>
                        <td>
                            <a class="btn btn-primary"
                                href="update/kelas.php?id=<?= htmlspecialchars($row['id']); ?>">Update</a>
                            <a class="btn btn-danger"
                                href="../model/delete/siswa.php?id=<?= htmlspecialchars($row['id']); ?>">Delete</a>
                        </td>

                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>