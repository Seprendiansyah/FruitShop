<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <div class="row mb-3">
        <div class="col">

            <div class="row g-0">
                <div class="card-group bg-white" id="cardKrj">
                    <div class="col d-flex">
                        <div class="card border-0" id="cardKeranjangDetail">
                            <img src="/img/Frame_66.jpg" class="img img-fluid" style="max-width: 400px;">
                        </div>
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card border-0" id="cardInputLogin">
                            <h4 class="fw-bold fs-3">Hubungi Kami</h4>
                            <p>Anda dapat menghubungi kami melalui whatsapp ataupun datang langsung ke kantor kami</p>
                            <h5>Whatsapp</h5>
                            <p>
                                <i class="bi bi-whatsapp"></i>
                                081254789654
                            </p>
                            <h5>Kantor</h5>
                            <p>
                                <i class="bi bi-geo-alt-fill"></i>
                                JL. Kranji Ujung No.1
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>