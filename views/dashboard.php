<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include '../assets/bootstrap.php'; ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary px-3">
        <div class="container">
            <a class="navbar-brand" href="#">Guru</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Logout</a>
                </div>
            </div>
        </div>
    </nav>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Tanggal:</label>
                            <input type="date" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Alasan Terlambat:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="mt-5">
            <h1>Dashboard</h1>
            <p>Keterlambatan Siswa</p>
        </div>
        <div class="d-flex my-3">
            <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Alasan Terlambat</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../model/dashboard.php';
                foreach ($keterlambatan as $row) {
                    ?>
                    <tr>
                        <th scope="row"><?= $row['id']; ?></th>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td><?= $row['alasan']; ?></td>
                        <td>
                            <a href="update.php?id=<?= htmlspecialchars($row['id']); ?>">Update</a>
                            <a href="delete.php?id=<?= htmlspecialchars($row['id']); ?>">Delete</a>
                        </td>

                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>