<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kamera</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Kamera</h2>
        <!-- Form untuk mengedit kamera -->
        <form action="<?= base_url('kamera/update/' . $kamera->id_kamera) ?>" method="post" enctype="multipart/form-data">
            <!-- Input Nama Kamera -->
            <div class="form-group">
                <label for="nama_kamera">Nama Kamera</label>
                <input type="text" class="form-control" id="nama_kamera" name="nama_kamera" value="<?= $kamera->nama_kamera ?>" required>
            </div>

            <!-- Input Kategori -->
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $kamera->kategori ?>" required>
            </div>

            <!-- Input Harga Sewa per Hari -->
            <div class="form-group">
                <label for="harga_sewa_per_hari">Harga Sewa per Hari</label>
                <input type="number" step="0.01" class="form-control" id="harga_sewa_per_hari" name="harga_sewa_per_hari" value="<?= $kamera->harga_sewa_per_hari ?>" required>
            </div>

            <!-- Input Stok -->
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="<?= $kamera->stok ?>" required>
            </div>

            <!-- Input Deskripsi -->
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $kamera->deskripsi ?></textarea>
            </div>

            <!-- Input Gambar -->
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
                <!-- Menampilkan gambar lama jika ada -->
                <?php if (!empty($kamera->gambar)): ?>
                    <div class="mt-2">
                        <label>Gambar Sebelumnya:</label>
                        <img src="<?= base_url('uploads/kamera/' . $kamera->gambar) ?>" alt="Gambar Kamera" class="img-thumbnail" width="150">
                    </div>
                <?php endif; ?>
            </div>

            <!-- Tombol untuk Update dan Kembali -->
            <button type="submit" class="btn btn-success">Update</button>
            <a href="<?= base_url('kamera') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
