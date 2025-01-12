<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kamera</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Kamera</h2>

        <!-- Form Tambah Kamera -->
        <form action="<?= site_url('kamera/simpan') ?>" method="post" enctype="multipart/form-data">
            <!-- Input Nama Kamera -->
            <div class="form-group">
                <label for="nama_kamera">Nama Kamera</label>
                <input type="text" class="form-control" id="nama_kamera" name="nama_kamera" placeholder="Masukkan nama kamera" required>
            </div>

            <!-- Input Kategori -->
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan kategori kamera" required>
            </div>

            <!-- Input Harga Sewa per Hari -->
            <div class="form-group">
                <label for="harga_sewa_per_hari">Harga Sewa per Hari</label>
                <input type="number" class="form-control" id="harga_sewa_per_hari" name="harga_sewa_per_hari" step="0.01" placeholder="Masukkan harga sewa per hari" required>
            </div>

            <!-- Input Stok -->
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan jumlah stok kamera" required>
            </div>

            <!-- Input Deskripsi -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi kamera"></textarea>
            </div>

            
            <!-- Input File Gambar -->
            <div class="form-group">
                <label for="gambar">Foto Kamera</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
