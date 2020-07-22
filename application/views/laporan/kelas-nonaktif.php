<?php
    $bul = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
?>
  
    <!-- modal nonaktif -->
      <div class="modal fade" id="modalEditHistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modalEditHistoryTitle">Edit History</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <!-- <div class="alert alert-warning">
                          <i class="fa fa-exclamation-circle text-warning mr-1"></i> <strong>Perhatian</strong>! ketika kelas privat dipindahkan ke waiting list maka jadwal dan pengajar dari kelas akan dihapus. Harap mengisi jadwal dan detail peserta pada form catatan
                      </div> -->
                      <form action="<?=base_url()?>Laporan/edit_history" method="post">
                          <input type="hidden" name="id">
                          <div class="form-group">
                              <label for="koor">Koordinator</label>
                              <input type="text" name="koor" class="form-control form-control-sm" readonly>
                          </div>
                          <div class="form-group">
                              <label for="hari">Hari</label>
                              <input type="text" name="hari" class="form-control form-control-sm" readonly>
                          </div>
                          <div class="form-group">
                              <label for="jam">Jam</label>
                              <input type="text" name="jam" class="form-control form-control-sm" readonly>
                          </div>
                          <div class="form-group">
                              <label for="tgl_history">Tgl Nonaktif</label>
                              <input type="date" name="tgl_history" class="form-control form-control-sm" required>
                          </div>
                          <div class="d-flex justify-content-end">
                              <input type="submit" name="hapus" value="Hapus" class="btn btn-sm btn-danger mr-3" id="btn-hapus">
                              <input type="submit" name="edit" value="Edit" class="btn btn-sm btn-success" id="btn-edit">
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    <!-- modal nonaktif -->
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
          
          <!-- berhasil memindahkan peserta -->
          <?php if( $this->session->flashdata('pesan') ) : ?>
              <div class="row">
                  <div class="col-6">
                      <?= $this->session->flashdata('pesan');?>
                      </div>
              </div>
          <?php endif; ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                  <thead>
                    <th style="width: 5%">No</th>
                    <th style="width: 10%">Tipe</th>
                    <th>Koordinator</th>
                    <th>Pengajar</th>
                    <th style="width: 7%">Hari</th>
                    <th style="width: 10%">Jam</th>
                    <th>Alamat</th> 
                    <th style="width: 7%">Tgl Off</th>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      foreach ($history as $history) :?>
                      <tr>
                        <td><center><?= $no++?></center></td>
                        <td><?= $history['tipe']?></td>
                        <td><?= $history['koordinator']?></td>
                        <td><?= $history['nama_kpq']?></td>
                        <td><?= $history['hari']?></td>
                        <td><?= $history['jam']?></td>
                        <td><?= $history['alamat']?></td>
                        <td><a href="#modalEditHistory" data-toggle="modal" class="modal-edit btn btn-sm btn-outline-info" data-id="<?= $history['id']?>"><?= date("d-m-Y", strtotime($history['tgl_history']))?></a></td>
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

    $(".modal-edit").click(function(){
      var id = $(this).data("id");
      
      $.ajax({
        url : "<?= base_url()?>laporan/get_history",
        method : "POST",
        data : {id: id},
        async : true,
        dataType : 'json',
        success : function(data){
          $("input[name='id']").val(data.id);
          $("input[name='koor']").val(data.koordinator);
          $("input[name='hari']").val(data.hari);
          $("input[name='jam']").val(data.jam);
          $("input[name='tgl_history']").val(data.tgl_history);
        }
      })
    })

    $("#btn-edit").click(function(){
      var c = confirm("Yakin akan mengubah data history?")
      return c;
    })
    
    $("#btn-hapus").click(function(){
      var c = confirm("Yakin akan menghapus data history?")
      return c;
    })
</script>
