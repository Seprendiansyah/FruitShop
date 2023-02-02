<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row mb-3">
        <div class="col">
            <a class="btn btn-outline-success d-inline-flex align-items-center" href="/barang">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-left me-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                </svg>
                Kembali
            </a>

        </div>
    </div>

    <div class="row mb-3">
        <div class="col">

            <div class="row g-0">
                <div class="card-group bg-white" id="cardKrj">
                    <div class="col d-flex">
                        <div class="card border-0 justify-content-center" id="cardKeranjangDetail">
                            <img src="/img/barang/<?= $barang['gambar']; ?>" class="img img-fluid d-flex" id="img">
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card border-0" id="cardInputLogin">
                            <p class="fw-bold fs-3"><?= $barang['nama_barang']; ?></p>
                            <p><?= $barang['deskripsi']; ?></p>
                            <p class="mb-1">Informasi Harga</p>

                            <?php
                            function rupiah($angka)
                            {
                                $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                return $hasil_rupiah;
                            }
                            ?>
                            <p>
                                <?php
                                echo rupiah($barang['harga']);
                                echo (' Per 1 KG');
                                ?>
                            </p>

                            <?php if (logged_in()) : ?>
                                <a type="button" class="btn btn-secondary" href="/keranjang/tambah/<?= $barang['barang_id']; ?>">
                                    <i class="bi bi-cart-plus"></i>
                                    Tambah Ke Keranjang
                                </a>
                            <?php else : ?>
                                <a type="button" class="btn btn-secondary disabled">
                                    <i class="bi bi-cart-plus"></i>
                                    Tambah Ke Keranjang
                                </a>
                                <div class="text-danger d-flex" role="alert">
                                    <?php echo session()->getFlashdata('not_login') ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>