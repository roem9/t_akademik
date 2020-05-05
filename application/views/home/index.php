<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $title?></h1>
      </div>

      <!-- Content Row -->

        <div class="row">
            
            <div class="col-8">
                <div class="card mb-4 ml-2">
                    <!-- <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                    </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                            <thead>
                            <th>No</th>
                            <th>Periode</th>
                            <!-- <th><center>R</center></th>
                            <th><center>PK</center></th>
                            <th><center>PL</center></th> -->
                            <th><center>Reguler</center></th>
                            <th><center>Pv Khusus</center></th>
                            <th><center>Pv Luar</center></th>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 0;
                                    foreach ($kbm as $i => $kbm) :?>
                                    <tr>
                                        <td width="5%"><center><?= ++$no?></center></td>
                                        <td><?= $kbm['periode']?></td>
                                        <td width="15%"><center><?= $kbm['kelas_reguler']."(".$kbm['peserta_reguler'].")"?></center></td>
                                        <td width="15%"><center><?= $kbm['kelas_pv_khusus']?></center></td>
                                        <td width="15%"><center><?= $kbm['kelas_pv_luar']?></center></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
              <div class="col-12">
                <h2><?= $judul?></h2>
              </div>  
              <div class="col-12 mb-4">
                <div class="card border-left-primary h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Reguler</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $peserta_reguler?> Peserta</div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-user fa-2x text-info-300"></i>
                        </div>
                    </div>
                    </div>
                </div>
              </div>

              <div class="col-12 mb-4">
                <div class="card border-left-success h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Private Khusus</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$jadwal_pv_khusus?> Kelas</div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-building fa-2x text-info-300"></i>
                        </div>
                    </div>
                    </div>
                </div>
              </div>

              <div class="col-12 mb-4">
                <div class="card border-left-info h-100 py-2">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Private Luar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$jadwal_pv_luar?> Kelas</div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-car fa-2x text-info-300"></i>
                        </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>
            
        </div>
      <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
</div>

<script>
    $("#home").addClass("active");
</script>
