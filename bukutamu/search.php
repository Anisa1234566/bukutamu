<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Database</title>
</head>
<body>
    <h1>Searching Buku Tamu untuk Database MySQL</h1>
    <form action="hasilsearch.php" method="post">
        <label for="kolom">Pilih Kolom:</label>
        <select name="kolom" id="kolom" required>
            <option value="nama">Nama</option>
            <option value="email">Email</option>
        </select>
        <br><br>
        <label for="cari">Masukkan Kata yang Anda Cari:</label>
        <input type="text" name="cari" id="cari" required>
        <br><br>
        <input type="submit" value="Cari">
    </form>
</body>
</html>
