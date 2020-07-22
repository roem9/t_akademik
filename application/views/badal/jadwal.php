<div class="modal fade" id="modalJadwalBadal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title capitalize" id="modalJadwalBadalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body cus-font">
        <ul class="list-group list-badal"></ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

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
        <div class="card shadow mb-4" style="max-width: 520px">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                <thead>
                    <th width=10%>No</th>
                    <th>Waktu</th>
                    <th>R</th>
                    <th>PK</th>
                    <th>PL</th>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($jadwal as $jadwal) :?>
                        <tr class="<?php echo ($jadwal['tgl'] == date('Y-m-d') ? 'bg-info' : '')?>">
                            <td width=10%><center><?= ++$no?></center></td>
                            <td><?= $jadwal['hari']?> <?= date("d-M-Y", strtotime($jadwal['tgl']))?></td>
                            <td width=10%><center><a href="#modalJadwalBadal" class="modal-jadwal-badal" data-toggle="modal" data-hari="<?= $jadwal['hari']?>" data-id="<?= $jadwal['tgl']?>|Reguler"><?= $jadwal['r']?></a></center></td>
                            <td width=10%><center><a href="#modalJadwalBadal" class="modal-jadwal-badal" data-toggle="modal" data-hari="<?= $jadwal['hari']?>" data-id="<?= $jadwal['tgl']?>|Pv Khusus"><?= $jadwal['pk']?></a></center></td>
                            <td width=10%><center><a href="#modalJadwalBadal" class="modal-jadwal-badal" data-toggle="modal" data-hari="<?= $jadwal['hari']?>" data-id="<?= $jadwal['tgl']?>|Pv Luar"><?= $jadwal['pl']?></a></center></td>
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
</div>
<!-- End of Content Wrapper -->

<script>
    $("#badal").addClass("active")

    $(".modal-jadwal-badal").click(function(){
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
                    html += '<ul class="list-group mb-3">'+
                                '<li class="list-group-item list-group-item-warning d-flex justify-content-between"><span>'+data[i].jam+'</span>'+data[i].peserta+' <b>'+data[i].program_kbm+'</b></li>'+
                                '<li class="list-group-item d-flex justify-content-between"><span>'+data[i].kpq+'</span><span><i class="fa fa-long-arrow-alt-right"></i></span><span>'+data[i].kpq_badal+'</span></li>'+
                            '</ul>';
                }
                
                $(".list-badal").html(html);
            }
        })
    })
</script>