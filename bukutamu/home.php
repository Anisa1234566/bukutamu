<!DOCTYPE html>
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
        
        .bgform .btn-success {
            border: none;
            background-color: #28a745; /* Warna hijau untuk tombol "Buku Tamu" */
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
                <div style="width: 700px;">
                    <hr>
                    <a class="btn btn-success" href="inputbt.php">Buku Tamu</a>&nbsp
                    <a class="btn btn-danger" href="viewbt.php">Tampilkan</a>&nbsp
                    <a class="btn btn-info" href="searchbt.php">Search</a>&nbsp
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

