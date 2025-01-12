<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .table th, .table td {
            vertical-align: middle;
        }
        .table-hover tbody tr:hover {
            background-color:rgb(162, 241, 240);
        }
        .container {
            max-width: 90%;
            margin-top: 30px;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-sm {
            font-size: 0.9rem;
        }
        .navbar-brand {
            font-weight: bold;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Laporan Transaksi</h2>

        <!-- Tombol Kembali ke Menu -->
        <div class="mb-4">
            <a href="<?= base_url('') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Menu
            </a>
        </div>

        <!-- Form Filter -->
        <div class="mb-4">
            <form method="get" action="<?= base_url('transaksi/laporan') ?>">
                <div class="form-row">
                    <div class="col">
                        <label for="id_pelanggan">Pelanggan</label>
                        <select class="form-control" name="id_pelanggan">
                            <option value="">Semua Pelanggan</option>
                            <?php foreach ($pelanggan as $p) : ?>
                                <option value="<?= $p->id_pelanggan ?>" <?= isset($_GET['id_pelanggan']) && $_GET['id_pelanggan'] == $p->id_pelanggan ? 'selected' : '' ?>>
                                    <?= $p->nama_pelanggan ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option value="">Semua Status</option>
                            <option value="dipinjam" <?= isset($_GET['status']) && $_GET['status'] == 'dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                            <option value="dikembalikan" <?= isset($_GET['status']) && $_GET['status'] == 'dikembalikan' ? 'selected' : '' ?>>Dikembalikan</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </form>
        </div>

        <!-- Tabel Laporan -->
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kamera</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($transaksi as $t) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $t->nama_kamera ?></td>
                                <td><?= $t->nama_pelanggan ?></td>
                                <td><?= $t->tanggal_sewa ?></td>
                                <td><?= $t->tanggal_kembali ?></td>
                                <td>Rp<?= number_format($t->total_harga, 2) ?></td>
                                <td><?= ucfirst($t->status) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
