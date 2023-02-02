<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h2 class="mb-3 text-center">Keranjang Saya</h2>
        </div>
    </div>

    <?php

    use PhpParser\Node\Stmt\Echo_;

    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
    ?>

    <div class="row">
        <div class="col">
            <div class="card border-0 mb-4" id="cardKeranjang">
                <div class="col table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga Dipilih</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($keranjang as $k) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="/img/barang/<?= $k['gambar']; ?>" class="sampul img-fluid"></td>
                                    <td><?= $k['nama_buah']; ?></td>
                                    <td>
                                        <?php
                                        if ($k['harga_dipilih'] == 0) {
                                            echo ("Anda belum memilih harga, silahkan pilih melalui detail");
                                        } else
                                            echo rupiah($k['harga_dipilih']);
                                        ?>
                                    </td>
                                    <td>
                                        <a href="/keranjang/detail/<?= $k['id']; ?>" class="btn btn-success mb-2">Detail</a>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#yakinHapus">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="yakinHapus" tabindex="-1" aria-labelledby="yakinHapusLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content border-warning border-2">
                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title" id="yakinHapusLabel">Peringatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin?
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                        <form action="/keranjang/<?= $k['id']; ?>" method="POST" class="d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-warning">Iya, hapus!</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <th scope="row"></th>
                            <td colspan="2" class="fw-bold">Total harga</td>
                            <td>
                                <?php
                                for ($x = 0; $x < count($keranjang); $x++) {
                                    $hargaTotal += $keranjang[$x]['harga_dipilih'];
                                }
                                echo rupiah($hargaTotal);
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($keranjang == null) {
                                    echo ('keranjang kosong');
                                } else {
                                    echo ('<a href="/pesanan/pesanan" class="btn btn-primary text-nowrap">lanjut Pesanan</a>');
                                }
                                ?>

                            </td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>