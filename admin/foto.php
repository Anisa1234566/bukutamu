<?php
session_start();
include '../config/koneksi.php';

// Cek apakah user sudah login
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
                    <a href="foto.php" class="nav-link">Foto</a>
                </div>
                <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <!-- Form Tambah Foto -->
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">Tambah Foto</div>
                    <div class="card-body">
                        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                            <label class="form-label">Judul Foto</label>
                            <input type="text" name="judulfoto" class="form-control" required>
                            <label class="form-label">Album</label>
                            <select class="form-control" name="albumid" required>
                                <?php
                                $sql_album = mysqli_query($koneksi, "SELECT * FROM album");
                                while ($data_album = mysqli_fetch_array($sql_album)) {
                                    echo '<option value="' . $data_album['albumid'] . '">' . htmlspecialchars($data_album['namaalbum']) . '</option>';
                                }
                                ?>
                            </select>
                            <label class="form-label">File</label>
                            <input type="file" class="form-control" name="lokasifile" required>
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>
                            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Data Galeri Foto -->
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Data Galeri Foto</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Judul Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><img src="../asset/img/<?= htmlspecialchars($data['lokasifile']); ?>" width="100"></td>
                                        <td><?= htmlspecialchars($data['judulfoto']); ?></td>
                                        <td><?= htmlspecialchars($data['deskripsifoto']); ?></td>
                                        <td><?= $data['tanggalunggah']; ?></td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['fotoid']; ?>">
                                                Edit
                                            </button>
                                            <!-- Tombol Hapus -->
                                            <a href="../config/aksi_foto.php?fotoid=<?= $data['fotoid']; ?>" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?');" 
                                            class="btn btn-danger">
                                            Hapus
                                            </a>


                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal<?= $data['fotoid']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Data Foto</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="fotoid" value="<?= $data['fotoid']; ?>">
                                                                <label class="form-label">Judul Foto</label>
                                                                <input type="text" name="judulfoto" value="<?= htmlspecialchars($data['judulfoto']); ?>" class="form-control" required>
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsifoto" required><?= htmlspecialchars($data['deskripsifoto']); ?></textarea>
                                                                <label class="form-label">Album</label>
                                                                <select class="form-control" name="albumid">
                                                                    <?php
                                                                    $sql_album = mysqli_query($koneksi, "SELECT * FROM album");
                                                                    while ($data_album = mysqli_fetch_array($sql_album)) { ?>
                                                                        <option value="<?= $data_album['albumid']; ?>" <?= $data_album['albumid'] == $data['albumid'] ? 'selected' : ''; ?>>
                                                                            <?= htmlspecialchars($data_album['namaalbum']); ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                                <label class="form-label">Foto</label>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <img src="../asset/img/<?= htmlspecialchars($data['lokasifile']); ?>" width="100">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <label class="form-label">Ganti File</label>
                                                                        <input type="file" class="form-control" name="lokasifile">
                                                                    </div>
                                                                </div>
                                                                <button type="submit" name="edit" class="btn btn-primary mt-2">Simpan Perubahan</button>
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
