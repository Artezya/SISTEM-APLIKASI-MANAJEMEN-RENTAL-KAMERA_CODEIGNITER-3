<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Transaksi</h2>
        <form method="post" action="<?= site_url('transaksi/update/' . $transaksi->id_transaksi) ?>">
            <div class="form-group">
                <label for="id_kamera">Kamera</label>
                <select class="form-control" name="id_kamera" required>
                    <?php foreach ($kamera as $k): ?>
                        <option value="<?= $k->id_kamera ?>" <?= $k->id_kamera == $transaksi->id_kamera ? 'selected' : '' ?>>
                            <?= htmlspecialchars($k->nama_kamera) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_pelanggan">Pelanggan</label>
                <select class="form-control" name="id_pelanggan" required>
                    <?php foreach ($pelanggan as $p): ?>
                        <option value="<?= $p->id_pelanggan ?>" <?= $p->id_pelanggan == $transaksi->id_pelanggan ? 'selected' : '' ?>>
                            <?= htmlspecialchars($p->nama_pelanggan) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_sewa">Tanggal Sewa</label>
                <input type="date" class="form-control" name="tanggal_sewa" value="<?= $transaksi->tanggal_sewa ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="date" class="form-control" name="tanggal_kembali" value="<?= $transaksi->tanggal_kembali ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" required>
                    <option value="dipinjam" <?= $transaksi->status == 'dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                    <option value="dikembalikan" <?= $transaksi->status == 'dikembalikan' ? 'selected' : '' ?>>Dikembalikan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="total_harga">Total Harga</label>
                <input type="number" class="form-control" name="total_harga" value="<?= $transaksi->total_harga ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="<?= site_url('transaksi') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
