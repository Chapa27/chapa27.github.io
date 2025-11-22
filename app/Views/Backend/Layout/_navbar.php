<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header bg-teal-100">
      <a href="#" class="b-brand text-primary">
        <img src="<?= base_url('assets/images/logo-bblabkes-jkt.png'); ?>" class="img-fluid" alt="logo" style="height: 50px;">
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item">
          <a href="<?= base_url('home/dashboard'); ?>" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#dashboard"></use>
              </svg>
            </span>
            <span class="pc-mtext">Home</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label data-i18n="Widget">Modul Pelayanan Sampel</label>
          <i class="pc-micon">
            <svg class="pc-icon">
              <use xlink:href="#line-chart"></use>
            </svg>
          </i>
        </li>
        <li class="pc-item">
          <a href="<?= base_url('pelayanan-sampel/permintaan'); ?>" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#font-size"></use>
              </svg>
            </span>
            <span class="pc-mtext">Permintaan</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="<?= base_url('pelayanan-sampel/penawaran'); ?>" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#bg-colors"></use>
              </svg>
            </span>
            <span class="pc-mtext">Penawaran</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="<?= base_url('pelayanan-sampel/biaya-pengujian-sampel'); ?>" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#highlight"></use>
              </svg>
            </span>
            <span class="pc-mtext">Biaya pengujian sampel</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="<?= base_url('pelayanan-sampel/pengantar-lhu'); ?>" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#lock"></use>
              </svg>
            </span>
            <span class="pc-mtext">Pengantar LHU</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label data-i18n="Widget">Master Data</label>
          <i class="pc-micon">
            <svg class="pc-icon">
              <use xlink:href="#line-chart"></use>
            </svg>
          </i>
        </li>
        <li class="pc-item">
          <a href="<?= base_url('master-data/pelanggan'); ?>" class="pc-link">
            <span class="pc-micon">
              <svg class="pc-icon">
                <use xlink:href="#chrome"></use>
              </svg>
            </span>
            <span class="pc-mtext" data-i18n="Sample Page">Pelanggan</span>
          </a>
        </li>
      </ul>
      <div class="card text-center">
      </div>
    </div>
  </div>
</nav>