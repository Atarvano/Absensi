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

    <div class="container">
        <div class="mt-5">
            <h1>Dashboard</h1>
            <p>Keterlambatan Siswa</p>
        </div>
        <div class="d-flex my-3">
            <a href="" class="btn btn-primary">Tambah</a>
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

                <tr>
                    <th scope="row">1</th>
                    <td>Irvani Heldy Fauzan</td>
                    <td>27-10-2009</td>
                    <td>CUci Baju</td>
                    <td>
                        <a href="">Update</a>
                        <a href="">delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>