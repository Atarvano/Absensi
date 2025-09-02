<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include '../assets/bootstrap.php';
    session_start();
    ?>
</head>

<body>
    <?php include 'components/header.php';
    require_once '../model/get/dashboard.php';
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../index.php");
        exit();
    } ?>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../model/add/keterlambatan.php" method="POST">
                        <div class="mb-3">
                            <label for="kelas" class="col-form-label">Kelas:</label>
                            <select class="form-select" id="kelas">
                                <option selected>Pilih Kelas</option>
                                <?php
                                $stmt4 = $pdo->prepare("SELECT * FROM Kelas");
                                $stmt4->execute();
                                $kelas2 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($kelas2 as $k):
                                    ?>
                                    <option value="<?= $k['id']; ?>"><?= $k['nama_kelas']; ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="siswa" class="col-form-label">Nama:</label>
                            <select class="form-select" id="siswa" name="siswa">
                                <option selected>Pilih Siswa</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Tanggal:</label>
                            <input type="date" class="form-control" id="recipient-name" name="tanggal">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Alasan Terlambat:</label>
                            <textarea class="form-control" id="message-text" name="alasan"></textarea>
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
            <p>Keterlambatan Siswa</p>
        </div>
        <div class="d-flex my-3">
            <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</a>
            <form action="" class="d-flex ms-2">
                <input type="text" class="form-control me-2" name="nama" placeholder="Cari Nama Siswa"
                    value="<?= isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : '' ?>">
                <button type="submit" class="btn btn-secondary">Search</button>
            </form>
            <a href="pdf.php" class="btn btn-danger ms-2">Download PDF</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Alasan Terlambat</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($keterlambatan as $row) {
                    ?>
                    <tr>
                        <th scope="row"></th>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['nama_kelas']; ?></td>
                        <td><?= $row['tanggal']; ?></td>
                        <td><?= $row['alasan']; ?></td>
                        <td>
                            <a class="btn btn-primary"
                                href="update/dashboard.php?id=<?= htmlspecialchars($row['id']); ?>">Update</a>
                            <a class="btn btn-danger"
                                href="../model/delete/dashboard.php?id=<?= htmlspecialchars($row['id']); ?>">Delete</a>
                        </td>

                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>

<script src="../assets/js/index.js"></script>

</html>