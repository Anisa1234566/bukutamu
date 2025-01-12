<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <title>Buku Tamu</title>
    <style>
        .center-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    body {
            background-color: rgb(140, 202, 240); /* Warna latar belakang biru muda */
            height: 100vh; /* Tinggi layar penuh */
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 1000px; /* Batas lebar maksimal */
            width: 100%; /* Lebar penuh */
            text-align: center;
        }

        table {
            width: 100%; /* Tabel mengikuti lebar kontainer */
            border-collapse: collapse; /* Menghapus celah antar border */
        }

        .bgform h3 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .bgform .btn {
            margin: 10px; /* Tambahkan margin antar tombol */
            padding: 10px 20px; /* Ukuran padding tombol */
            font-size: 18px; /* Ukuran teks tombol */
            border-radius: 5px; /* Membuat tombol melengkung */
            font-weight: bold;
        }

        .bgform .btn-success {
            background-color: #28a745; /* Warna hijau untuk tombol "Buku Tamu" */
            border: none;
            color: white;
        }

        .bgform .btn-danger {
            background-color: #dc3545; /* Warna merah untuk tombol "Tampilkan" */
            border: none;
            color: white;
        }

        .bgform .btn-info {
            background-color: #17a2b8; /* Warna biru untuk tombol "Search" */
            border: none;
            color: white;
        }

        .bgform .btn:hover {
            opacity: 0.9; /* Efek hover untuk semua tombol */
        }
        th{
            text-align: center;
        }
        
</style>
</head>

<body>
<div class="center-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6"></div>
            <div class="bgform" align="center">
                <h3><b>BUKU TAMU</b></h3>
                <div style="width: 900px;">
                    <hr>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Komentar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "bukutamu_anisa");
                            $hasil = $conn->query("select* from bukutamu ");
                            if (mysqli_num_rows($hasil) > 0) {
                                $no = 0;
                                while ($row = mysqli_fetch_array($hasil)) {
                                    $no++;
                                    echo 
                                    '<tr>
                                    <td>' . $no . '</td>
                                    <td>' . $row['nama'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['komentar'] . '</td>
                                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <a class="btn btn into" href="home.php">Kembali</a>&nbsp
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
    </div>
    </div>
</body>

</html>