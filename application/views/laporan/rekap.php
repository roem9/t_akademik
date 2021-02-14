<?php
    $bul = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
?>
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

          <!-- DataTales Example -->
          <div class="card shadow mb-4" style="max-width: 900px">
            <!-- <div class="card-header py-3"> -->
              <!-- <form action="<?= base_url()?>laporan/rekap" method="post">
                <div class="row">
                  <div class="col-sm-2 p-0">
                    <select name="bulan" id="bulan" class="form-control form-control-sm">
                      <option value="">bulan</option>
                      <option value="1" <?php if($bulan == '1'){echo "selected";}?>>Jan</option>
                      <option value="2" <?php if($bulan == '2'){echo "selected";}?>>Feb</option>
                      <option value="3" <?php if($bulan == '3'){echo "selected";}?>>Mar</option>
                      <option value="4" <?php if($bulan == '4'){echo "selected";}?>>Apr</option>
                      <option value="5" <?php if($bulan == '5'){echo "selected";}?>>Mei</option>
                      <option value="6" <?php if($bulan == '6'){echo "selected";}?>>Jun</option>
                      <option value="7" <?php if($bulan == '7'){echo "selected";}?>>Jul</option>
                      <option value="8" <?php if($bulan == '8'){echo "selected";}?>>Agu</option>
                      <option value="9" <?php if($bulan == '9'){echo "selected";}?>>Sep</option>
                      <option value="10" <?php if($bulan == '10'){echo "selected";}?>>Okt</option>
                      <option value="11" <?php if($bulan == '11'){echo "selected";}?>>Nov</option>
                      <option value="12" <?php if($bulan == '12'){echo "selected";}?>>Des</option>
                    </select>
                  </div>
                  <div class="col-sm-2 p-0">
                    <select name="tahun" id="tahun" class="form-control form-control-sm">
                      <option value="">tahun</option>
                      <option value="2019" <?php if($tahun == '2019'){echo "selected";}?>>2019</option>
                      <option value="2020" <?php if($tahun == '2020'){echo "selected";}?>>2020</option>
                    </select>
                  </div>
                  <div class="col-sm-1 p-0">
                    <input type="submit" value="go" class="btn btn-sm btn-primary">
                  </div>
                  <div class="col-sm-3 p-0 ml-3">
                    <a href="<?= base_url()?>laporan/export_rekap_kbm/<?=$bulan.'/'.$tahun?>" class="btn btn-success btn-sm">Cetak Rekap <?=$bul[$bulan-1]."-".$tahun?></a>
                  </div>
                </div>
              </form> -->
              <!-- <h6 class="m-0 font-weight-bold text-primary">Data KBM</h6>
            </div> -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                  <thead>
                    <th>No</th>
                    <th>Nama KPQ</th>
                    <?php if(date("m") == $bulan && date("Y") == $tahun) :?>
                      <th>Kelas</th>
                      <th>Jadwal</th>
                    <?php endif;?>
                    <th>KBM</th>
                    <th>Badal</th>
                    <th>Dibadal</th>
                    <th>Blm Rekap Badal</th>
                    <th>Rekap</th>
                    <th>WA</th>
                  </thead>
                  <tbody>
                    <?php 
                        $i = 0;
                        foreach ($kbm as $j => $kbm) :?>
                        <tr>
                            <td><?= ++$i?></td>
                            <td><?= $kbm['kpq']?></td>
                            <?php if(date("m") == $bulan && date("Y") == $tahun) :?>
                              <td><center><?= $kbm['kelas']?></center></td>
                              <td><center><?= $kbm['jadwal']?></center></td>
                            <?php endif;?>
                            <td><center><?= $kbm['kbm']?></center></td>
                            <td><center><?= $kbm['badal']?></center></td>
                            <td><center><?= $kbm['dibadal']?></center></td>
                            <td><center><?= $kbm['no_rekap']?></center></td>
                            <!-- <td>-</td> -->
                            <td><center><a href="<?= base_url()?>laporan/rekapkpq/<?=$kbm['nip'].'/'.$bulan.'/'.$tahun?>" target="_blank"><i class="fas fa-book-open"></i></a></center></td>
                            <td><a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= substr($kbm['no_hp'], 1)?>&text=<?= str_replace(' ', '%20', $kbm['text'])?>" class="btn btn-sm btn-success"><i class="fa fa-phone"></i></a></td>
                        </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<script>
    $("#laporan").addClass("active");
</script>
