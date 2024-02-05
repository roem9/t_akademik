<div class="modal fade" id="modalJadwalBadal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title capitalize" id="modalJadwalBadalTitle"></h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body cus-font">
        <ul class="list-group list-badal"></ul>
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
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Waktu</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">R</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">PK</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">PL</th>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($jadwal as $jadwal) :?>
                        <tr class="<?php echo ($jadwal['tgl'] == date('Y-m-d') ? 'bg-info' : '')?>">
                            <td><center><?= ++$no?></center></td>
                            <td><?= $jadwal['hari']?> <?= date("d-M-Y", strtotime($jadwal['tgl']))?></td>
                            <td>
                              <center>
                                <a href="javascript:void(0)" class="modal-jadwal-badal" data-bs-target="#modalJadwalBadal" data-bs-toggle="modal" data-hari="<?= $jadwal['hari']?>" data-id="<?= $jadwal['tgl']?>|Reguler">
                                    <span class="badge bg-gradient-success">
                                      <?= $jadwal['r']?>
                                    </span>
                                </a>
                              </center>
                            </td>
                            <td>
                              <center>
                                <a href="javascript:void(0)" class="modal-jadwal-badal" data-bs-target="#modalJadwalBadal" data-bs-toggle="modal" data-hari="<?= $jadwal['hari']?>" data-id="<?= $jadwal['tgl']?>|Pv Khusus">
                                    <span class="badge bg-gradient-success">
                                      <?= $jadwal['pk']?>
                                    </span>
                                </a>
                              </center>
                            </td>
                            <td>
                              <center>
                                <a href="javascript:void(0)" class="modal-jadwal-badal" data-bs-target="#modalJadwalBadal" data-bs-toggle="modal" data-hari="<?= $jadwal['hari']?>" data-id="<?= $jadwal['tgl']?>|Pv Luar">
                                    <span class="badge bg-gradient-success">
                                      <?= $jadwal['pl']?>
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

    $(document).on("click", ".modal-jadwal-badal", function(){
        let id = $(this).data("id");
        let hari = $(this).data("hari");
        let title = id.split("|");
        let tgl = title[0];
        tgl = tgl.split("-");
        tgl = tgl[2]+"-"+tgl[1]+"-"+tgl[0];
        let tipe = title[1];
        $("#modalJadwalBadalTitle").html("Badal "+tipe+" "+hari+" "+tgl);
        $.ajax({
            url : "<?= base_url()?>badal/get_jadwal_badal_kelas_by_tipe_by_tgl",
            data : {id : id},
            method : "POST",
            dataType : "json",
            async : true,
            success : function(data){
                let html = "";
                for (let i = 0; i < data.length; i++) {
                    html += '<ul class="list-group mb-3 text-sm">'+
                                '<li class="list-group-item list-group-item-warning d-flex justify-content-between"><span>'+data[i].jam+'</span>'+data[i].peserta+' <b>'+data[i].program_kbm+'</b></li>'+
                                '<li class="list-group-item d-flex justify-content-between"><span>'+data[i].kpq+'</span><span><i class="fa fa-long-arrow-alt-right"></i></span><span>'+data[i].kpq_badal+'</span></li>'+
                                '<li class="list-group-item">Tempat : '+data[i].tempat+'</li>'+
                            '</ul>';
                }
                
                $(".list-badal").html(html);
            }
        })
    })
</script>