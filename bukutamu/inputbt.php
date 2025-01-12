<script type="text/javascript">
    function validasi(form) {
        var ceknama = form.nama.value;
        var cekemail = form.email.value;
        var cekkomen = form.komentar.value;
        if (ceknama == 0) {
            alert("Periksa kembali nama anda!");
            form.nama.focus();
            return (false);
        }
        if (cekemail == 0 || cekemail.indexOf("@", 1) == -1) {
            alert("Periksa kembali email anda!");
            form.email.focus();
            return (false);
        }
        if (cekkomen == 0) {
            alert("Periksa kembali komentar anda!");
            form.komentar.focus();
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
        .bgform h3{
            font-size: 60px;
            font-family:Arial, Helvetica, sans-serif;
            text-align: center;
        }
        .form-buttons button,
        .form-buttons a {
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-size: 16px;
            text-align: center;
        }

        .btn-success {
            background-color:#28a745;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
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
                    <div style="width: 700px;" align="left">
                        <form role="form" method="post" onsubmit="return validasi(this)">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Komentar</label>
                                <div class="col-sm-9">
                                    <textarea name="komentar" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                            <input type="submit" class="btn btn-success" name="submit" value="proses">&nbsp
                            <input type="reset" class="btn btn-danger" value="Hapus">&nbsp
                            <a class="btn btn-info" href="home.php">Kembali</a>&nbsp
                        </div>
                        </form>
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

<?php
$submit = @$_POST['submit'];
if (isset($submit)) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $komentar = $_POST['komentar'];
    $conn = mysqli_connect("localhost", "root", "", "bukutamu_anisa") or die("koneksi gagal");
    $sql = "INSERT INTO
    bukutamu (nama,email,komentar) VALUES ('$nama','$email','$komentar')";
    $result = mysqli_query($conn, $sql);
    if ($result == true) {
?><script type="text/javascript">
            Window.location = 'home.php';
        </script><?php
                } else {
                    echo "error";
                }
            }
                    ?>