<nav class="navbar navbar-expand-lg bg-body-tertiary px-3">
    <div class="container">
        <a class="navbar-brand" href="#"><?php echo $_SESSION['role'] === 'admin' ? 'Admin' : 'Guru'; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="dashboard.php">Home</a>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <a class="nav-link" aria-current="page" href="siswa.php">Siswa</a>
                    <a class="nav-link" aria-current="page" href="guru.php">guru</a>
                    <a class="nav-link" aria-current="page" href="kelas.php">Kelas</a>
                <?php endif; ?>
                <a class="nav-link" href="../core/logout.php">Logout</a>
            </div>
        </div>
    </div>
</nav>