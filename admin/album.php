<?php
session_start();
include '../config/koneksi.php';

if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum login!');
    location.href='../index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="Utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto">
                    <a href="album.php" class="nav-link">Album</a>
                </div>
                <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <!-- Form Tambah Album -->
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">Tambah Album</div>
                    <div class="card-body">
                        <form action="../config/aksi_album.php" method="POST">
                            <label class="form-label">Nama Album</label>
                            <input type="text" name="namaalbum" class="form-control" required>
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>
                            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Data Album -->
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Data Album</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Album</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($data['namaalbum']); ?></td>
                                        <td><?= htmlspecialchars($data['deskripsi']); ?></td>
                                        <td><?= $data['tanggalbuat']; ?></td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['albumid']; ?>">
                                                Edit
                                            </button>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal<?= $data['albumid']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Data Album</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_album.php" method="POST">
                                                                <input type="hidden" name="albumid" value="<?= $data['albumid']; ?>">
                                                                <label class="form-label">Nama Album</label>
                                                                <input type="text" name="namaalbum" value="<?= htmlspecialchars($data['namaalbum']); ?>" class="form-control" required>
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsi" required><?= htmlspecialchars($data['deskripsi']); ?></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Edit -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; UKK RPL 2024 | Nama Peserta</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
