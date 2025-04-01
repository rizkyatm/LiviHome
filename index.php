<?php
include 'koneksi.php';

$query = "SELECT * FROM barang";
$result = $conn->query($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Web-Interior</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- GLightbox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
  </head>
    <body>
        <!-- bagian hero -->
        <div id="heroCarousel" class="carousel slide container mt-4" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="width: 10px; height: 10px; border-radius: 50%;"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2" style="width: 10px; height: 10px; border-radius: 50%;"></button>
            </div>
        
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active shadow-sm" data-bs-interval="4000">
                    <div class="d-flex align-items-center text-white text-start px-5 py-5 position-relative " 
                        style="background: url('furniture/gambar5.jpg') no-repeat bottom center/cover; height: 400px; border-radius: 25px;">
                        <div class="container">
                            <div class="col-lg-6">
                                <h1 class="text-dark display-5 fw-bold mt-4">Marketplace Interior</h1>
                                <p class="lead fw-normal" style="color: #5c6c75;">Jelajahi koleksi interior terbaik untuk rumah Anda dengan desain modern dan elegan yang sesuai dengan gaya hidup Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>
        
                <!-- Slide 2 -->
                <div class="carousel-item shadow-sm" data-bs-interval="4000">
                    <div class="d-flex align-items-center text-white text-start px-5 py-5 position-relative" 
                        style="background: url('furniture/gambar4.jpg') no-repeat bottom center/cover; height: 400px; border-radius: 25px;">
                        <div class="container">
                            <div class="col-lg-6">
                                <h1 class="text-dark display-5 fw-bold mt-4">Transformasi Interior Rumah Anda</h1>
                                <p class="lead fw-normal" style="color: #5c6c75;">Jelajahi koleksi desain interior yang dapat mengubah rumah Anda menjadi tempat yang lebih nyaman dan berkelas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- bagian hero end-->

        <!-- bagian produk -->
        <div class="container py-5">
            <h2 class="fw-bold">Produk Kami</h2>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col">
                        <div class="card border-0 text-center">
                            <img src="<?= $row['gambar']; ?>" class="card-img-top" alt="<?= $row['nama_barang']; ?>">
                            <div class="card-body">
                                <h6 class="card-title"><?= $row['nama_barang']; ?></h6>
                                <p class="fw-bold">Rp. <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                                <button class="btn w-100" style="background-color: #8abde4; color: white;" data-bs-toggle="modal" data-bs-target="#shippingModal<?= $row['id']; ?>">Beli Sekarang</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="shippingModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="shippingModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="shippingModalLabel">Masukan Detail Pemesanan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="backend_transaksi.php" method="POST">
                                    <input type="hidden" name="id_barang" value="<?= $row['id']; ?>">
                                    <input type="hidden" name="harga" value="<?= $row['harga']; ?>">

                                    <div class="modal-body d-flex">
                                        <div class="border-0 text-center" style="width: 80%;"> 
                                            <img src="<?= $row['gambar']; ?>" class="card-img-top" alt="<?= $row['nama_barang']; ?>">
                                            <div>
                                                <h6 class="card-title"><?= $row['nama_barang']; ?></h6>
                                                <p class="fw-bold">Rp. <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                                            </div>
                                        </div>
                                        <div class="w-100 mt-3">
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="nama_pembeli" placeholder="Nama Pembeli" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="telepon" placeholder="Nomor Telepon" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Barang" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="email" class="form-control" name="email" placeholder="Alamat Email" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Rumah" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="kota" placeholder="Kota" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="kecamatan" placeholder="Kecamatan" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="provinsi" placeholder="Provinsi" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn" style="background-color: #8abde4; color: white;">Pesan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <!-- bagian produk end -->
         
         <!-- bagian promosi -->
        <section class="container mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5">
            <div class="row row-cols-1 row-cols-md-3 gy-3 gy-sm-4 gx-2 gx-lg-4 mb-xxl-3">
              <div class="col text-center">
                <svg class="d-block text-dark-emphasis mx-auto mb-3 mb-lg-4" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="currentColor"><path d="M62.189 9.902c0-.604-.604-1.208-1.208-1.208h-6.158-3.14l-1.69.121-1.57.242c-2.174.483-4.226 1.087-6.158 2.174s-3.623 2.294-5.072 3.864h-.121c-3.14 3.019-5.313 7.004-6.038 11.351l-.241 1.57-.121 1.691v3.14 5.796c-.604.845-1.087 1.691-1.57 2.536.121-1.328.121-2.536.241-3.864 0-.966.121-1.811.121-2.777v-1.449l-.121-1.449c-.241-1.811-.845-3.743-1.691-5.434a20.6 20.6 0 0 0-3.26-4.71c-2.657-2.777-6.279-4.709-10.143-5.434L12.8 15.82l-1.449-.121H8.574 3.019c-.604 0-1.208.604-1.208 1.208v5.555 2.777l.121 1.449.242 1.449C2.898 32 4.83 35.502 7.729 38.159c1.449 1.328 3.019 2.415 4.709 3.26s3.623 1.328 5.434 1.691l1.449.121h1.449c.966 0 1.811-.121 2.777-.121 1.57-.121 3.14-.121 4.709-.242-.362.604-.604 1.328-.966 1.932-1.449 3.381-2.294 7.004-2.294 10.506.966-3.502 2.294-6.642 3.985-9.66.966-1.811 2.174-3.623 3.381-5.313h5.675 3.14l1.691-.121 1.57-.242c2.174-.483 4.227-1.087 6.159-2.174s3.623-2.294 5.072-3.864h.121c3.14-3.019 5.313-7.004 6.038-11.351l.242-1.57.121-1.69v-3.14-6.279zM49.63 35.743c-1.691.966-3.623 1.449-5.555 1.811l-1.449.242-1.449.121h-3.019-3.864c.242-.242.483-.604.725-.845 2.174-2.657 4.589-5.192 7.004-7.728l7.366-7.728c-3.019 1.932-5.917 3.985-8.694 6.279-2.657 2.294-5.192 4.709-7.487 7.487v-2.536-3.019l.121-1.449.242-1.449c.362-1.932.845-3.864 1.811-5.555.845-1.691 2.053-3.381 3.381-4.83 1.449-1.328 3.019-2.415 4.709-3.381s3.623-1.449 5.555-1.811l1.449-.241 1.449-.121h3.019 4.951v4.951 3.019l-.121 1.57-.242 1.449c-.362 1.932-.845 3.864-1.811 5.555-.845 1.691-2.053 3.381-3.381 4.83-1.449 1.449-3.019 2.536-4.709 3.381zm-26.083 6.762c-.966 0-1.811-.121-2.777-.121l-1.328-.121-1.328-.242c-3.502-.724-6.641-2.536-9.057-5.072-1.208-1.328-2.174-2.657-3.019-4.226-.725-1.57-1.208-3.26-1.57-4.951l-.242-1.328-.121-1.328V22.34v-4.347h4.347 2.777 1.328l1.328.121c1.691.242 3.381.725 4.951 1.57 1.449 1.087 2.898 2.053 4.106 3.26 2.536 2.415 4.347 5.555 5.072 9.057l.241 1.328.121 1.328c.121.845.121 1.811.121 2.777.121 1.449.121 2.777.241 4.226-.241.483-.483.845-.724 1.328-1.328-.362-2.898-.362-4.468-.483zm-5.434-12.437c-1.449-.966-2.898-1.932-4.589-2.657.966 1.449 2.174 2.777 3.381 3.985 2.415 2.536 4.83 4.709 7.487 7.124 1.328 1.087 2.536 2.294 4.106 3.381-.725-1.691-1.57-3.26-2.657-4.589-2.174-2.898-4.709-5.193-7.728-7.245z"></path></svg>
                <h3 class="h5">Ramah Lingkungan</h3>
                <p class="fs-sm px-5 mb-md-0">Hiasi ruangan Anda dengan furnitur ramah lingkungan yang memiliki kadar VOC rendah, terbuat dari bahan ramah lingkungan, dan dilapisi dengan lapisan yang aman.</p>
              </div>
              <div class="col text-center">
                <svg class="d-block text-dark-emphasis mx-auto mb-3 mb-lg-4" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="currentColor"><path d="M55.526 24.465l-.145-10.159-.094-5.08-.012-.635c-.016-.23-.016-.481-.061-.717-.06-.481-.22-.945-.413-1.384-.407-.875-1.061-1.625-1.868-2.136a4.99 4.99 0 0 0-2.699-.769l-2.548.061-15.238.437 15.238.437 2.532.069a3.93 3.93 0 0 1 2.088.71c.601.431 1.085 1.017 1.365 1.692.131.339.242.688.27 1.051.029.181.017.356.026.548l-.012.635-.094 5.08-.119 8.281c-3.476-.415-6.952-.651-10.428-.808-3.769-.185-7.537-.235-11.306-.255-3.769.023-7.537.073-11.306.258-3.471.158-6.941.392-10.412.803l-.131-9.156-.085-5.05c.009-1.448.949-2.849 2.313-3.435.691-.318 1.391-.355 2.28-.357l2.54-.066 15.239-.439-17.778-.505c-.425-.009-.83-.032-1.325-.006-.472.048-.941.145-1.388.317-1.798.674-3.123 2.475-3.216 4.432l-.105 5.109-.145 10.159-.111 10.159-.046 5.714c.011.242.006.518.048.774.054.523.214 1.031.415 1.516.421.967 1.122 1.802 1.996 2.394a5.52 5.52 0 0 0 2.985.937l1.885.008a219.85 219.85 0 0 0-2.615 7.372l-1.399 4.349-.166.552a2.42 2.42 0 0 0-.062 1.062c.109.703.567 1.362 1.196 1.705a2.42 2.42 0 0 0 2.973-.484c.144-.164.17-.207.235-.287l.177-.224c3.518-4.56 6.926-9.206 10.121-14.015l5.451.014 6.309-.017c3.205 4.808 6.615 9.457 10.14 14.017l.177.224c.065.081.092.123.235.287.753.837 2.009 1.035 2.971.484.629-.343 1.086-1.001 1.195-1.704a2.42 2.42 0 0 0-.062-1.061l-.166-.552-1.403-4.349a228.34 228.34 0 0 0-2.625-7.375l1.007-.003c.425-.003.814.01 1.383-.037.524-.067 1.042-.192 1.53-.396 1.966-.798 3.353-2.796 3.404-4.903l-.03-5.126-.112-10.159zM14.167 57.718l-.293.386c-.011.016-.023.027-.04.035-.035.018-.081.021-.114.004-.043-.018-.066-.046-.08-.095a.18.18 0 0 1-.002-.069l.153-.545 1.157-4.419c.65-2.627 1.271-5.264 1.822-7.92l7.761.02c-3.608 4.082-7.037 8.303-10.363 12.603zm34.91-4.704l1.155 4.42.153.544a.19.19 0 0 1-.002.07c-.014.049-.037.077-.081.096-.034.018-.08.015-.115-.004-.018-.008-.029-.019-.041-.035l-.294-.386c-3.321-4.302-6.749-8.521-10.35-12.607l7.309-.02.452-.001c.549 2.657 1.17 5.293 1.814 7.922zm4.528-18.39l-.05 5.033c-.051 1.297-.928 2.501-2.124 2.963-.626.251-1.14.252-2.08.235l-17.778-.047c-25.374.066 7.11-.017-17.761.043a3.42 3.42 0 0 1-1.802-.541 3.43 3.43 0 0 1-1.238-1.434c-.123-.294-.234-.599-.268-.92-.032-.162-.025-.312-.04-.492l-.046-5.714-.112-10.159-.011-.8c3.47.411 6.94.645 10.409.803 3.769.186 7.537.235 11.306.258 3.769-.02 7.537-.07 11.306-.255 3.475-.157 6.95-.393 10.425-.808l-.024 1.677-.112 10.159zm-14.693-23.94c-3.673-1.557-10.14-1.544-13.805 0 3.66 1.542 10.125 1.559 13.805 0zM25.107 28.829c3.647 1.537 10.114 1.564 13.805 0-3.697-1.567-10.167-1.533-13.805 0z"></path></svg>
                <h3 class="h5">Kualitas Tak Tertandingi</h3>
                <p class="fs-sm px-5 mb-md-0">Kami memilih bahan baku dari produsen terbaik, sehingga furnitur dan dekorasi kami memiliki kualitas tertinggi dengan harga terbaik.</p>
              </div>
              <div class="col text-center">
                <svg class="d-block text-dark-emphasis mx-auto mb-3 mb-lg-4" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="currentColor"><path d="M5.36 29.423c.111 0 2.111 1 6.333 2.667l-.222 10.222c-.111 3.667-.111 7.334-.111 11a1.07 1.07 0 0 0 .778 1c.333.111 10 2.778 9.889 2.667.111 0 10 2.667 9.889 2.667h.111.111.111.111.111l9.889-2.667c.111 0 10-2.778 9.889-2.667a1.07 1.07 0 0 0 .778-1c-.111-3.667-.111-7.334-.111-11l-.222-10.222 6.222-2.667c.111 0 .111-.111.222-.111.222-.222.333-.667 0-.889l-7.111-7.556 5.556 7.667c-3.111 1-6.111 2-9.111 3.111l-9.111 3.333-5.333-6.334c6.222-2.556 12-5.111 18.112-7.889-6-2.778-11.889-5.333-18-7.889l5.333-6.333 9.111 3.333c3 1.111 6.111 2.111 9.111 3.111l-5.556 7.667c2.333-2.333 4.778-4.889 7.111-7.556 0 0 .111-.111.111-.222.111-.333 0-.667-.333-.889-3.222-1.444-6.445-2.778-9.778-4l-9.778-3.889c-.444-.222-.889 0-1.222.333l-5.778 7.111c-1.889-2.445-3.889-4.778-5.778-7.111-.333-.333-.778-.556-1.222-.333-3.222 1.222-6.556 2.556-9.778 3.889-3.778 1.444-7 2.778-10.222 4.222-.111 0-.222.111-.222.111-.222.222-.333.667 0 .889 2.111 2.333 4.333 4.667 6.334 6.778-.444.444-.444 1.222 0 1.556-2.111 2.111-4.222 4.444-6.334 6.778-.444.444-.222 1 .111 1.111zm6.556-7.556l9.889 3.556 3.778 1.333 4.778 2-5.333 6.334-9.111-3.333c-3-1.111-6.111-2.111-9.111-3.111 1.667-2.222 3.222-4.444 4.889-6.778 0-.111.111 0 .222 0zm1.445 30.667c0-3.111-.111-9.556-.445-19.889.778.333 1.445.667 2.222.889l9.778 3.889c.444.222.889 0 1.222-.333 1.778-2.111 3.556-4.333 5.222-6.444-.111 1.778-.111 3.556-.111 5.333l-.222 7.556-.222 13.778-8.556-2.333-8.889-2.444zm37.334 0l-9.111 2.444-8.556 2.333c0-5.778-.111-7.222-.222-13.778l-.222-7.556c-.111-1.778-.111-3.556-.111-5.333 1.778 2.111 3.445 4.333 5.222 6.444.333.333.778.556 1.222.333 3.222-1.222 6.556-2.556 9.778-3.889.778-.333 1.444-.556 2.222-.889l-.222 19.889zm.889-31.667c-5.334 1.556-9.111 2.778-13.556 4.333-2 .667-4 1.222-6 1.889l-9.556-3.667-7-2.556 7-2.556 9.556-3.667c1.889.667 3.778 1.222 5.667 1.889l14 4.445c0-.111-.111-.111-.111-.111zm-44.89-7.667l9.222-3.222 9.111-3.333 5.333 6.333c-1.556.667-3.111 1.222-4.667 1.889l-3.889 1.333-9.889 3.556c-.111 0-.222.111-.222.111l-5-6.667z"></path></svg>
                <h3 class="h5">Pengiriman ke Pintu Anda</h3>
                <p class="fs-sm px-5 mb-md-0"> Kami akan mengirimkan pesanan ke pintu Anda di mana pun di dunia. Jika Anda tidak 100% puas, beri tahu kami dalam 30 hari, dan kami akan menyelesaikan masalahnya.</p>
              </div>
            </div>
        </section>
         <!-- bagian promosi end -->
        
         <!-- bagian best deal -->
        <section class="container">
            <div class="row row-cols-1 row-cols-md-2 g-0 overflow-hidden rounded-5">
                <!-- Video -->
                <div class="col position-relative">
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-body-secondary"></div>
                    <img src="furniture/featured-product.png" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover z-1" alt="Image">
                    <div class="position-absolute start-0 bottom-0 d-flex align-items-end w-100 h-100 z-2 p-4">
                    <a class="btn btn-lg btn-light rounded-pill m-md-2" href="https://www.youtube.com/watch?v=Z1xX1Kt9NkU" data-glightbox="" data-gallery="video">
                        Play
                    </a>
                    </div>
                </div>
        
                <!-- Featured product -->
                <div class="col d-flex align-items-center justify-content-center py-5 px-4 px-md-5 text-white" data-bs-theme="dark" style="background: url('furniture/bg1.jpg') no-repeat center center; background-size: cover;">
                    <div class="text-center py-md-2 py-lg-3 py-xl-4" style="max-width: 400px">
                        <div class="fs-xs fw-medium text-uppercase text-dark mb-3">Best deal</div>
                        <h2 class="h4 pb-lg-2 pb-xl-0 mb-4 mb-xl-5 text-dark">Kursi Bantalan Kaki Kayu 60x100 cm</h2>
                        <div class="d-inline-flex pb-lg-2 pb-xl-0 mb-4 mb-xl-5">
                            <img src="furniture/featured-product-thumbnail.jpg" class="rounded" width="192" alt="Product">
                        </div>
                        <div class="h3 pb-2 pb-md-3 text-dark">Rp. 675.000</div>
                        <button class="btn btn-lg btn-outline-dark rounded-pill"  data-bs-toggle="modal" data-bs-target="#shippingModal">Beli Sekarang</button>
                    </div>
                </div>
                <div class="modal fade" id="shippingModal" tabindex="-1" aria-labelledby="shippingModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="shippingModalLabel">Masukan Detail Pemesanan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="backend_transaksi.php" method="POST">
                                    <input type="hidden" name="id_barang" value="1">
                                    <input type="hidden" name="harga" value="675000">

                                    <div class="modal-body d-flex">
                                        <div class="border-0 text-center" > 
                                            <img src="furniture/01.png" style="width: 80%;">
                                            <div>
                                                <h6 class="card-title">Kursi Bantalan Kaki Kayu</h6>
                                                <p class="fw-bold">Rp. 675.000</p>
                                            </div>
                                        </div>
                                        <div class="w-100 mt-3">
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="nama_pembeli" placeholder="Nama Pembeli" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="telepon" placeholder="Nomor Telepon" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="number" class="form-control" name="jumlah" placeholder="Jumlah Barang" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="email" class="form-control" name="email" placeholder="Alamat Email" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Rumah" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="kota" placeholder="Kota" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="kecamatan" placeholder="Kecamatan" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control" name="provinsi" placeholder="Provinsi" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn" style="background-color: #8abde4; color: white;">Pesan</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>             
            </div>
        </section>
         <!-- bagian best deal end-->
        
        <!-- Footer -->
        <footer class="text-white text-center py-4 mt-5" style="background-color: #738EA7;">
            <div class="container">
                <p class="mb-1">&copy; 2025 kelompok --</p>
            </div>
        </footer>
        <!-- Footer end-->

        <!--Bootstrap Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- GLightbox JS -->
        <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const lightbox = GLightbox({ selector: '[data-glightbox]' });
            });
        </script>

    </body>
</html>