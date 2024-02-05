<div class="modal fade" id="modalCatatan" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title capitalize" id="modalCatatanTitle">Catatan KBM</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body cus-font">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="content">
    <div class="card shadow mb-4 overflow-auto">
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Program</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Tipe</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Koor</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Waktu</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Pengajar</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Badal</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Catatan</th>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        foreach ($jadwal as $jadwal) :?>
                        <tr>
                            <td><center><?= ++$no?></center></td>
                            <td><?= $jadwal['program_kbm']?></td>
                            <td><?= $jadwal['tipe_kelas']?></td>
                            <td><?= $jadwal['peserta']?></td>
                            <td><?= $jadwal['hari']?>, <?= date("d-M-Y", strtotime($jadwal['tgl']))?> (<?= $jadwal['jam']?>)</td>
                            <td><?= $jadwal['kpq']?></td>
                            <td><?= $jadwal['kpq_badal']?></td>
                            <td>
                                <center>
                                    <a href="javascript:void(0)" class="modal-catatan" data-bs-target="#modalCatatan" data-bs-toggle="modal" data-id="<?= $jadwal['id_kbm']?>">
                                        <span class="badge bg-gradient-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
                                                <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293z"/>
                                            </svg>
                                        </span>
                                    </a>
                                </center>
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

    $(document).on("click", ".modal-catatan", function(){
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