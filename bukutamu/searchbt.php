<script type="text/javascript">
    function validasi(form) {
        var cekcari = form.cari.value;
        if (cekcari == 0) {
            alert("Masukan kata kunci!");
            form.cari.focus();
            return (false);
        }
        return (true);
    }
</script>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>Buku Tamu</title>
<style>
    .center-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        body {
            background-color:rgb(140, 202, 240); /* Warna latar belakang biru muda */
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
        .bgform h3{
            font-size: 60px;
            font-family:Arial, Helvetica, sans-serif;
            text-align: center;
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
                    <form role="form" method="post" onsubmit="return validasi(this)">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kolom</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="kolom">
                                    <option value="nama">Nama</option>
                                    <option value="email">Email</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kata kunci</label>
                            <div class="col-sm-9">
                                <input type="text" name="cari" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="submit" class="btn btn-success" name="submit" value="proses">&nbsp
                            <input type="reset" class="btn btn-danger" value="Hapus">&nbsp
                            <a class="btn btn-info" href="home.php">Kembali</a>&nbsp
                        </div>
                    </form>
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
                            $kolom = isset($_POST['kolom']) ? $_POST['kolom'] : '';
                            $cari = isset($_POST['cari']) ? $_POST['cari'] : '';
                            $conn = mysqli_connect("localhost", "root", "", "bukutamu_anisa");
                            if (!empty($kolom) && !empty($cari)) {
                                $hasil = $conn->query("SELECT * FROM bukutamu WHERE $kolom LIKE '%$cari%'");
                            }                            if ($cari == "") {
                                echo "";
                            } else {
                                $jumlah = mysqli_num_rows($hasil);
                                echo "Ditemukan : $jumlah";
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
                            }
                            ?>
                        </tbody>
                    </table>
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