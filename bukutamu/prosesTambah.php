<html>
    <head>
        <title>Simpan Buku Tamu</title>
</head>
<body>
    <h1>Simpan Buku Tamu MYSQL</h1>
    <?php
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $komentar = $_POST["komentar"];
    $conn=mysqli_connect
    ("localhost","root","","bukutamu_anisa") or die ("koneksigagal");
    echo "Nama : $nama <br>";
    echo "Email : $email <br>";
    echo "komentar : $komentar <br>";
    $sqlstr="insert into bukutamu (nama,email,komentar) values ('$nama','$email','$komentar')";
    $result=mysqli_query($conn,$sqlstr);
    echo "Simpan buku tamu berhasil dilakukan";
    ?>
    </body>
    <html>