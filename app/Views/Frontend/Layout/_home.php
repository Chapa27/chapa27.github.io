<?= $this->extend('Frontend/Layout/_main'); ?>

<?= $this->section('content'); ?>
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
<?= $this->endSection(); ?>