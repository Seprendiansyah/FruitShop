<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <div class="row">
        <div class="col">
            <div class="card border-0 mb-4" id="cardKeranjang">
                <h2 class="mb-4 text-center">Form Ubah Data Barang</h2>
                <form action="/admin/barangupdate/<?= $barang['barang_id']; ?>" method="POST" class="row g-3" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="gambarLama" value="<?= $barang['gambar']; ?>">
                    <div class="col-md-12">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" id="nama" value="<?= (old('nama_barang')) ? old('nama_barang') : $barang['nama_barang']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="Deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="Deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi baru disini..."></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('deskripsi'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="deslama" class="fw-bold">Deskripsi lama</label>
                        <p id="deslama">
                            <?= $barang['deskripsi']; ?>
                        </p>
                    </div>
                    <div class="hargaBarang col-12">
                        <label for="Harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="Harga" name="harga" value="<?= (old('harga')) ? old('harga') : $barang['harga']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="sampul" class="d-flex form-label">Sampul</label>
                        <img src="/img/barang/<?= $barang['gambar']; ?>" class="sampul img-fluid img-thumbnail img-preview">
                    </div>
                    <div class="col-md-8">
                        <label for="gambar" class="form-label">Upload Gambar</label>
                        <input class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" type="file" id="gambarLabel" name="gambar" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('gambar'); ?>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="d-grid col-4 mx-auto">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>