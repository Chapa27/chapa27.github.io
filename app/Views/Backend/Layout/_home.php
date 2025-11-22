<?= $this->extend('Backend/Layout/_main'); ?>
<?= $this->section('content'); ?>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><badge class="badge badge-primary">Sample Page</badge></li>
                </ul>
                </div>
                <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">Sample Page</h2>
                </div>
                </div>
            </div>
            </div>
        </div>
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5>Hello card</h5>
            </div>
            <div class="card-body">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere, accusantium. Eos, nostrum consequatur modi cumque ut beatae nihil sint alias odit ducimus reiciendis ex, saepe omnis labore quis, voluptates minus.
            </div>
          </div>
        </div>
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
</div>

<?= $this->endSection(); ?>
