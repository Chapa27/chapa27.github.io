<!doctype html>
<html lang="id">

<head>
  <!-- Wajib meta tag -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="<?= base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/fonts/fontawesome.css'); ?>">

  <title>Program Layanan</title>
</head>
<style>
  .navbar {
    background: #2A7B9B;
    background: linear-gradient(90deg, rgba(42, 123, 155, 1) 0%, rgba(87, 199, 133, 1) 50%, rgba(237, 221, 83, 1) 100%);
  }
</style>

<body class="bg-dark">
  <!-- <div class="container"> -->
  <div class="container-fluid mb-3">
    <div class="row">
      <div class="col">
        <nav class="navbar navbar-expand-lg navbar-light bg-light text-light">
          <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">
              <img src="/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
              Labkesmas Jakarta
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link text-light active" aria-current="page" href="#"><span class="fa-solid fa-home"></span> Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light active" aria-current="page" href="#"><span class="fa-solid fa-book"></span> Buku tamu</a>
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
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><span class="fa-solid fa-book"></span> Buku tamu</h5>
            <hr style="border: 3px solid green;">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card" style="border: 3px solid white;">
          <div class="card-body bg-success">
            <h5 class="card-title text-light"><span class="fa-solid fa-users"></span> Pengunjung Hari Ini</h5>
            <hr style="border: 3px solid yellow;">
            <p class="card-text">
            <h2 class="text-light text-center">20 Orang</h2>
            </p>
            <a href="#" class="btn btn-primary">Lihat</a>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="card" style="border: 3px solid white;">
          <div class="card-body bg-danger">
            <h5 class="card-title text-light"><span class="fa-solid fa-users"></span> Pengunjung Kemarin</h5>
            <hr style="border: 3px solid yellow;">
            <p class="card-text">
            <h2 class="text-light text-center">10 Orang</h2>
            </p>
            <a href="#" class="btn btn-primary">Lihat</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- </div> -->

  <!-- Bootstrap JS -->
  <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?= base_url('assets/js/plugins/fontawesome.v6.3.0.all.js'); ?>"></script>

</body>

</html>