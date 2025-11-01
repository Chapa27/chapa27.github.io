<?= $this->include('Frontend/Layout/_top'); ?>
<div class="containter">
    <div class="content">
        <div class="row mb-2">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light text-light">
                    <div class="container-fluid">
                        <a class="navbar-brand text-light" href="#">
                            <img src="<?= base_url('img/bblkm-jakarta.png'); ?>" alt="" width="120" height="35" class="d-inline-block align-text-top">
                            Labkesmas Jakarta
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link text-light active" aria-current="page" href="<?= base_url('program-layanan'); ?>"><span class="fa-solid fa-home"></span> Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light active" aria-current="page" href="<?= base_url('buku-tamu'); ?>"><span class="fa-solid fa-book"></span> Buku tamu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url('img/slide-1.png'); ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url('img/slide-2.png'); ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <?= $this->renderSection('content'); ?>
    </div>
</div>
<?= $this->include('Frontend/Layout/_bottom'); ?>