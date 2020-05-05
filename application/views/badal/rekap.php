<div class="modal fade" id="modalCatatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title capitalize" id="modalCatatanTitle">Catatan KBM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body cus-font">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $title?></h1>
        </div>
        
        <!-- berhasil memindahkan peserta -->
        <?php if( $this->session->flashdata('pesan') ) : ?>
            <div class="row">
                <div class="col-6">
                    <?= $this->session->flashdata('pesan');?>
                    </div>
            </div>
        <?php endif; ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4 w-100">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link <?php if($tabs == 'jadwal') echo 'active'?>" href="<?= base_url()?>badal/jadwal">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($tabs == 'konfirmasi') echo 'active'?>" href="<?= base_url()?>badal/konfirmasi">Konfirmasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($tabs == 'badal') echo 'active'?>" href="<?= base_url()?>badal/rekap">Rekap</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <form action="controllers/badal/konfirmasi.php" method="POST">
            <div class="table-responsive">
                <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                    <thead>
                        <th width=3%>No</th>
                        <th width=10%>Program</th>
                        <th width=10%>Tipe</th>
                        <th>Koor</th>
                        <th>Waktu</th>
                        <th>Pengajar</th>
                        <th>Badal</th>
                        <th width=7%>Catatan</th>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach ($jadwal as $jadwal) :?>
                            <tr>
                                <td><?= ++$no?></td>
                                <td><?= $jadwal['program_kbm']?></td>
                                <td><?= $jadwal['tipe_kelas']?></td>
                                <td><?= $jadwal['peserta']?></td>
                                <td><?= $jadwal['hari']?>, <?= date("d-M-Y", strtotime($jadwal['tgl']))?> (<?= $jadwal['jam']?>)</td>
                                <td><?= $jadwal['kpq']?></td>
                                <td><?= $jadwal['kpq_badal']?></td>
                                <td><center><a href="#modalCatatan" class="modal-catatan" data-id="<?= $jadwal['id_kbm']?>" data-toggle="modal"><i class="fa fa-exclamation text-info"></i></a></center></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            </form>
        </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>

<script>
    $("#badal").addClass("active");

    $(".modal-catatan").on("click", function(){
        let id = $(this).data("id");

        $.ajax({
            url: "<?= base_url()?>badal/get_catatan_badal_by_id",
            data: {id: id},
            dataType: 'json',
            method: 'POST',
            success: function(data){
                $(".modal-body").html(data.catatan);
            }
        })
    })
</script>