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
                    <!-- <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Catatan</th> -->
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Action</th>
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
                            <!-- <td><center><a href="#modalCatatan" class="modal-catatan" data-id="<?= $jadwal['id_kbm']?>" data-toggle="modal"><i class="fa fa-exclamation text-info"></i></a></center></td> -->
                            <td>
                                <a href="javascript:void(0)" class="modal-catatan" data-bs-target="#modalCatatan" data-bs-toggle="modal" data-id="<?= $jadwal['id_kbm']?>">
                                    <span class="badge bg-gradient-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal" viewBox="0 0 16 16">
                                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                        </svg>
                                    </span>
                                </a>
                                <?php if($jadwal['status'] == 'konfirm'):?>
                                    <a href="<?= base_url()?>badal/delete_badal_by_id_kbm/<?= $jadwal['id_kbm']?>" onclick="return confirm('Yakin tidak menyetujui kelas badal ini?')" id="btn-delete">
                                        <span class="badge bg-gradient-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="<?= base_url()?>badal/konfirm_badal/<?= $jadwal['id_kbm']?>" onclick="return confirm('Yakin menyetujui kelas badal ini?')" id="btn-konfirm">
                                        <span class="badge bg-gradient-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                            </svg>
                                        </span>
                                    </a>
                                <?php else :?>
                                    <a href="javascript:void(0)">
                                        <span class="badge bg-gradient-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <span class="badge bg-gradient-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                                            </svg>
                                        </span>
                                    </a>
                                <?php endif;?>
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