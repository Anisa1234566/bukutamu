<?php
// Cek apakah data dikirimkan melalui metode POST
if (isset($_POST['kolom']) && isset($_POST['cari'])) {
    // Ambil data dari form
    $kolom = $_POST['kolom'];
    $cari = $_POST['cari'];

    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "bukutamu_anisa");

    // Periksa apakah koneksi berhasil
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Lindungi query dari SQL Injection
    $kolom = mysqli_real_escape_string($conn, $kolom);
    $cari = mysqli_real_escape_string($conn, $cari);

    // Jalankan query
    $query = "SELECT * FROM bukutamu WHERE $kolom LIKE '%$cari%'";
    $hasil = $conn->query($query);

    // Periksa apakah query berhasil
    if (!$hasil) {
        die("Query gagal: " . $conn->error);
    }

    // Hitung jumlah hasil
    $jumlah = mysqli_num_rows($hasil);

    if ($jumlah > 0) {
        echo "<br>";
        echo "Ditemukan : $jumlah hasil<br><br>";

        // Tampilkan data
        while ($baris = mysqli_fetch_array($hasil)) {
            echo "Nama : " . $baris['nama'] . "<br>";
            echo "Email : " . $baris['email'] . "<br>";
            echo "Komentar : " . $baris['komentar'] . "<br><br>";
        }
    } else {
        echo "Tidak ada data yang cocok dengan pencarian Anda.";
    }

    // Menutup koneksi
    mysqli_close($conn);
} else {
    echo "Data tidak ditemukan. Pastikan form telah dikirimkan.";
}
?>
