<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Transaksi</h2>
        <?= form_open('transaksi/simpan') ?>
            <div class="form-group">
                <label for="id_kamera">Nama Kamera</label>
                <select class="form-control" name="id_kamera" required>
                    <option value="">Pilih Kamera</option>
                    <?php foreach ($kamera as $k): ?>
                        <option value="<?= $k->id_kamera ?>"><?= $k->nama_kamera ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_pelanggan">Nama Pelanggan</label>
                <select class="form-control" name="id_pelanggan" required>
                    <option value="">Pilih Pelanggan</option>
                    <?php foreach ($pelanggan as $p): ?>
                        <option value="<?= $p->id_pelanggan ?>"><?= $p->nama_pelanggan ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_sewa">Tanggal Sewa</label>
                <input type="date" class="form-control" name="tanggal_sewa" required>
            </div>
            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="date" class="form-control" name="tanggal_kembali">
            </div>
            <div class="form-group">
                <label for="total_harga">Total Harga</label>
                <input type="number" class="form-control" name="total_harga" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="dipinjam">Dipinjam</option>
                    <option value="dikembalikan">Dikembalikan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        <?= form_close() ?>
    </div>
</body>
</html>
