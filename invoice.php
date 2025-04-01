<?php
include 'koneksi.php'; 

if (!isset($_GET['id'])) {
    die("Transaksi tidak ditemukan.");
}

$id_transaksi = $_GET['id'];

// Ambil data transaksi
$query = "SELECT t.*, b.nama_barang, b.gambar, b.harga 
          FROM transaksi t
          JOIN barang b ON t.id_barang = b.id
          WHERE t.id = '$id_transaksi'";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    die("Transaksi tidak ditemukan.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
    <script>
        function downloadInvoice() {
            const element = document.querySelector('.container');
            document.querySelector('.no-print').style.display = 'none';
            html2pdf(element, {
                margin: 10,
                filename: 'invoice.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            }).then(() => {
                document.querySelector('.no-print').style.display = 'block';
            });
        }
    </script>
</head>
<body>
    <div class="container mt-5 p-4 border rounded shadow-lg" style="max-width: 700px;">
        <div class="text-center mb-4">
            <h2>Invoice</h2>
            <p class="text-muted">Terima kasih atas pembelian Anda!</p>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <h5>Detail Pembelian</h5>
                <p><strong>Nama:</strong> <?= htmlspecialchars($row['nama_pembeli']); ?></p>
                <p><strong>Telepon:</strong> <?= htmlspecialchars($row['telepon']); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($row['email']); ?></p>
                <p><strong>Alamat:</strong> <?= htmlspecialchars($row['alamat']); ?></p>
            </div>
            <div class="col-6 text-end">
                <h5>Invoice #INV<?= $row['id']; ?></h5>
                <p><strong>Tanggal:</strong> <?= date('d M Y', strtotime($row['created_at'])); ?></p>
            </div>
        </div>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= htmlspecialchars($row['nama_barang']); ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td>Rp. <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td>Rp. <?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
        <div class="text-end">
            <h4>Total: <strong>Rp. <?= number_format($row['total_harga'], 0, ',', '.'); ?></strong></h4>
        </div>
        <div class="text-center mt-4 no-print">
            <p class="text-muted">Jika ada pertanyaan, silakan hubungi kami di support@example.com</p>
            <a href="index.php" class="btn btn-secondary">Back to Home</a>
            <button class="btn btn-primary" onclick="downloadInvoice()">Download Invoice</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
