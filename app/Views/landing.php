<?=$this->extend('layouts/index')?>

<?= $this->section('styles') ?>
    <style type="text/css">
        @media (max-width: 767px) {
            .card {
                margin-bottom: 1rem;
            }
        }
    </style>
<?= $this->endSection() ?>

<?=$this->section('content')?>

<div class="container pt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Products</h3>
    </div>
    <div class="row mb-5">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <div class="card">
                <img src="/images/paket-advance.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h5 class="card-title">Rp 2.750.000</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <div class="card">
                <img src="/images/paket-advance.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h5 class="card-title">Rp 2.750.000</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <div class="card">
                <img src="/images/paket-advance.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h5 class="card-title">Rp 2.750.000</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <div class="card">
                <img src="/images/paket-advance.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h5 class="card-title">Rp 2.750.000</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection()?>