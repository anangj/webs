<!-- Breadcrumbs-->
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Data Keuangan Pribadi   <strong><?= $namaUser->nama;?></strong>.</li>
          </ol>

          <!-- Icon Cards-->
         
          <!-- Total Warga -->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <div class="mr-5">
                   Total  Siswa <br>
                    <strong><h3>
                  <?php
                    $query = $conn->query("SELECT COUNT(*) AS siswa FROM user");
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    echo $result->siswa  ;
                  ?></h3></strong> 
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">Siswa Yang Memakai Aplikasi.</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <!-- Akhir Total Warga -->

          <!-- Tabungan Sekarang -->
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                  </div>
                  <div class="mr-5">
                  Tabungan Sekarang
                    <h3>
                    <?php
                       $result = $conn->query("SELECT ROUND ( SUM(IF(status = 'Pemasukan', jumlah, 0))-(SUM(IF( status = 'Pengeluaran', jumlah, 0))) ) AS subtotal FROM keuangan WHERE kodeUser = '$userLogin' ");
                      $data = $result->fetch(PDO::FETCH_OBJ);
                      $jumlah =  $data->subtotal;
                      echo $resultJumlah = number_format($jumlah,2,',','.');
                    ?>
                    </h3>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left"> Sisa Uang Yang Tersedia.</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <!-- Akhir Tabungan Sekarang -->

            <!-- Total Pemasukan -->
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                  </div>
                  <div class="mr-5">
                    Total Pemasukan
                    <h3>
                    <?php
                       $result = $conn->query("SELECT  SUM(jumlah) AS pemasukan FROM keuangan WHERE status = 'Pemasukan' AND kodeUser = '$userLogin' ");
                      $data = $result->fetch(PDO::FETCH_OBJ);
                      $jumlah =  $data->pemasukan;
                      echo $resultJumlah = number_format($jumlah,2,',','.');
                    ?>
                    </h3>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?page=keuangan">
                  <span class="float-left">Lihat Detail</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <!-- Akhir Total Pemasukan -->

            <!-- Total Pengeluaran -->
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                  </div>
                  <div class="mr-5">
                  Total Pengeluaran
                    <h3>
                    <?php
                       $result = $conn->query("SELECT  SUM(jumlah) AS pengeluaran FROM keuangan WHERE status = 'Pengeluaran' AND kodeUser = '$userLogin' ");
                      $data = $result->fetch(PDO::FETCH_OBJ);
                      $jumlah =  $data->pengeluaran;
                      echo $resultJumlah = number_format($jumlah,2,',','.');
                    ?>
                    </h3>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?page=keuangan&action=pengeluaran">
                  <span class="float-left">Lihat Detail</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <div class="mr-5">
                  SMK Negeri 3 Jakarta Pusat
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?page=smk3">
                  <span class="float-left">Lihat Website</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <div class="mr-5">
                  SMK Negeri 14
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?page=smk14">
                  <span class="float-left">Lihat Website</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <div class="mr-5">
                  SMA Negeri 1
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?page=sma1">
                  <span class="float-left">Lihat Website</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <div class="mr-5">
                  SMA Negeri 4
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?page=sma4">
                  <span class="float-left">Lihat Website</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <div class="mr-5">
                  SMA Negeri 5
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?page=sma5">
                  <span class="float-left">Lihat Website</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <div class="mr-5">
                  SMA Negeri 7
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?page=sma7">
                  <span class="float-left">Lihat Website</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <div class="mr-5">
                  SMAN 45 Jakarta
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?page=sma45">
                  <span class="float-left">Lihat Website</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <div class="mr-5">
                  SMK Negeri 54 Jakarta
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?page=smk54">
                  <span class="float-left">Lihat Website</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <div class="mr-5">
                  SMK Negeri 1
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?page=smk1">
                  <span class="float-left">Lihat Website</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <div class="mr-5">
                  SMK Negeri 2
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="?page=smk2">
                  <span class="float-left">Lihat Website</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

          </div>
          <!-- Akhir Total Pengeluaran -->

