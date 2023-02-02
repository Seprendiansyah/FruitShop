<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row mb-3">
        <div class="col">
            <a class="btn btn-outline-success d-inline-flex align-items-center" href="/keranjang">
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
                        <div class="card border-0" id="cardKeranjangDetail">
                            <img src="/img/barang/<?= $keranjang['gambar']; ?>" class="img img-fluid d-flex" id="img">
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card border-0" id="cardInputLogin">
                            <p class="fw-bold fs-3"><?= $keranjang['nama_buah']; ?></p>
                            <p class="mb-1">Jumlah Pesanan</p>

                            <?php
                            function rupiah($angka)
                            {
                                $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
                                return $hasil_rupiah;
                            }
                            ?>

                            <form class="mb-3" action="/keranjang/update/<?= $keranjang['id']; ?>" method="POST">
                                <select name="pilihan" class="form-select mb-3" id="inputGroupSelect02">
                                    <option value="<?= $keranjang['harga']; ?>">
                                        <?php
                                        echo rupiah($keranjang['harga']);
                                        echo (" Plastik 1 KG");
                                        ?>
                                    </option>
                                    <?php
                                    $harga2 = $keranjang['harga'] * 2;
                                    $harga3 = $keranjang['harga'] * 3;
                                    $harga4 = $keranjang['harga'] * 4;
                                    $harga5 = $keranjang['harga'] * 5;
                                    ?>
                                    <option value="<?= $harga2; ?>">
                                        <?php
                                        echo rupiah($harga2);
                                        echo (" Plastik 2 KG");
                                        ?>
                                    </option>
                                    <option value="<?= $harga3; ?>">
                                        <?php
                                        echo rupiah($harga3);
                                        echo (" Plastik 3 KG");
                                        ?>
                                    </option>
                                    <option value="<?= $harga4; ?>">
                                        <?php
                                        echo rupiah($harga4);
                                        echo (" Plastik 4 KG");
                                        ?>
                                    </option>
                                    <option value="<?= $harga5; ?>">
                                        <?php
                                        echo rupiah($harga5);
                                        echo (" Plastik 5 KG");
                                        ?>
                                    </option>
                                </select>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Catatan" id="floatingTextarea" name="catatan" style="height: 100px"></textarea>
                                    <label for="floatingTextarea">Tambahkan Catatan Jika perlu</label>
                                </div>

                                <button class="btn btn-primary " type="submit">Simpan</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>