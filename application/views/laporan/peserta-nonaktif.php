<?php
    $bul = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
?>
  
    <!-- modal nonaktif -->
      <div class="modal fade" id="modalEditHistory" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modalEditHistoryTitle">Edit History</h5>
                      <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <!-- <div class="alert alert-warning">
                          <i class="fa fa-exclamation-circle text-warning mr-1"></i> <strong>Perhatian</strong>! ketika kelas privat dipindahkan ke waiting list maka jadwal dan pengajar dari kelas akan dihapus. Harap mengisi jadwal dan detail peserta pada form catatan
                      </div> -->
                      <form action="<?=base_url()?>Laporan/edit_history_peserta" method="post">
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
                              <input type="submit" name="hapus" value="Hapus" class="btn btn-sm btn-danger me-3" id="btn-hapus">
                              <input type="submit" name="edit" value="Edit" class="btn btn-sm btn-success" id="btn-edit">
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    <!-- modal nonaktif -->

<div class="content">
    <div class="card shadow mb-4 overflow-auto">
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Nama Peserta</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Program</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Pengajar</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Hari</th> 
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Jam</th> 
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Tgl Off</th>
                </thead>
                <tbody>
                <?php 
                      $no = 1;
                      foreach ($history as $history) :?>
                      <tr>
                        <td><center><?= $no++?></center></td>
                        <td><?= $history['nama_peserta']?></td>
                        <td><?= $history['program']?></td>
                        <td><?= $history['nama_kpq']?></td>
                        <td><?= $history['hari']?></td>
                        <td><?= $history['jam']?></td>
                        <td>
                            <a href="javascript:void(0)" class="modal-edit" data-bs-target="#modalEditHistory" data-bs-toggle="modal" data-id="<?= $history['id']?>">
                                <span class="badge bg-gradient-info">
                                    <?= date("d-m-Y", strtotime($history['tgl_history']))?>
                                </span>
                            </a>
                        </td>
                      </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= footer()?>

<script>
    let table = new DataTable('#dataTable');

    <?php if( $this->session->flashdata('pesan') ) : ?>
        Toast.fire({
            icon: "success",
            title: "<?= $this->session->flashdata('pesan')?>"
        });
    <?php endif; ?>

    $(".modal-edit").click(function(){
      var id = $(this).data("id");
      
      $.ajax({
        url : "<?= base_url()?>laporan/history_peserta",
        method : "POST",
        data : {id: id},
        async : true,
        dataType : 'json',
        success : function(data){
          $("input[name='id']").val(data.id);
          $("input[name='koor']").val(data.nama_peserta);
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
