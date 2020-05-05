
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
            
          <div class="card shadow mb-4 ml-2" style="max-width: 900px">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Laporan</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm table-hover cus-font" id="dataTable" cellspacing="0">
                    <thead>
                      <th>No</th>
                      <th>Periode</th>
                      <th>Rekap Peserta</th>
                      <th>Rekap Pengajaran</th>
                      <th>Rekap KBM</th>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 0;
                            foreach ($laporan as $laporan) :?>
                            <?php 
                                foreach ($laporan['bulan'] as $bulan) :?>
                                <tr>
                                    <td><center><?= ++$no?></center></td>
                                    <td><?= $month[$bulan['bulan']] ." ". $laporan['tahun']?></td>
                                    <td><a target="_blank" href="<?= base_url()?>laporan/exportrekappeserta/<?=$bulan['bulan']?>/<?= $laporan['tahun']?>">rekap peserta <?=$bulan['bulan']?>-<?= $laporan['tahun']?>.xls</a></td>
                                    <td><a target="_blank" href="<?= base_url()?>laporan/exportrekappengajaran/<?=$bulan['bulan']?>/<?= $laporan['tahun']?>">rekap pengajaran <?=$bulan['bulan']?>-<?= $laporan['tahun']?>.xls</a></td>
                                    <td><a target="_blank" href="<?= base_url()?>laporan/export_rekap_kbm/<?=$bulan['bulan']?>/<?= $laporan['tahun']?>">rekap kbm <?=$bulan['bulan']?>-<?= $laporan['tahun']?>.xls</a></td>
                                </tr>
                            <?php endforeach;?>
                        <?php endforeach;?>
                    </tbody>
                  </table>
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
    <!-- End of Content Wrapper -->
    <script>
        $("#laporan").addClass("active");
    </script>