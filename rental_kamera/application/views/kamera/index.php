<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kamera</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table {
            border-collapse: collapse;
        }
        .img-thumbnail {
            max-width: 150px;
            height: auto;
        }
        .action-btn {
            display: flex;
            gap: 5px;
        }
        .page-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .page-header .btn {
            align-self: flex-start;
            margin-top: 10px;
        }
        .table-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(179, 17, 17, 0.1);
            padding: 20px;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color:rgb(251, 249, 249);
        }
        .table-hover tbody tr:hover {
            background-color:rgb(162, 241, 240);
        }
        .page-header h2 {
            font-size: 28px;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="page-header">
            <h2 class="text-center">Daftar Kamera</h2>
            <a href="<?= site_url('kamera/tambah') ?>" class="btn btn-primary btn-custom">
                <i class="fas fa-camera"></i> Tambah Kamera
            </a>
        </div>
        <div class="table-container">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Kamera</th>
                        <th>Kategori</th>
                        <th>Harga Sewa</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($kamera as $k): ?> 
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $k->nama_kamera ?></td>
                            <td><?= $k->kategori ?></td>
                            <td class="text-right">Rp<?= number_format($k->harga_sewa_per_hari, 2) ?></td>
                            <td class="text-center"><?= $k->stok ?></td>
                            <td><?= $k->deskripsi ?></td>
                            <td class="text-center">
                                <?php if (!empty($k->gambar)): ?>
                                    <img src="<?= base_url('uploads/kamera/' . $k->gambar) ?>" alt="<?= $k->nama_kamera ?>" class="img-thumbnail">
                                <?php else: ?>
                                    <span>Gambar tidak tersedia</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="action-btn">
                                    <a href="<?= site_url('kamera/edit/' . $k->id_kamera) ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= site_url('kamera/hapus/' . $k->id_kamera) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kamera ini?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
