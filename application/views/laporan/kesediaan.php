<!-- modal kesediaan -->
    <div class="modal fade" id="modalKesediaan" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title capitalize" id="modalKesediaanTitle"></h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body cus-font">
                <ul class="list-group list-kpq text-sm"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>
<!-- modal kesediaan -->

<div class="content">
    <div class="card shadow mb-4 overflow-auto">
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <tr>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">No</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Waktu</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder all w-1">Ikhwan</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder all w-1">Akhwat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($kesediaan as $kesediaan) :?>
                        <tr>
                            <td><center><?= ++$no?></center></td>
                            <td class="capitalize"><?= $kesediaan['waktu']?></td>
                            <td>
                                <center>
                                    <a href="javascript:void(0)" class="modal-kesediaan" data-bs-target="#modalKesediaan" data-bs-toggle="modal" data-id="<?=$kesediaan['waktu']?>|Pria">
                                        <span class="badge bg-gradient-info">
                                            <?= $kesediaan['pria']?>
                                        </span>
                                    </a>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href="javascript:void(0)" class="modal-kesediaan" data-bs-target="#modalKesediaan" data-bs-toggle="modal" data-id="<?=$kesediaan['waktu']?>|Wanita">
                                        <span class="badge bg-gradient-info">
                                            <?= $kesediaan['wanita']?>
                                        </span>
                                    </a>
                                </center>
                            </td>
                            <!-- <td><center><a href="#modalKesediaan" class="modal-kesediaan" data-toggle="modal" data-id="<?=$kesediaan['waktu']?>|Pria"><?= $kesediaan['pria']?></a></center></td>
                            <td><center><a href="#modalKesediaan" class="modal-kesediaan" data-toggle="modal" data-id="<?=$kesediaan['waktu']?>|Wanita"><?= $kesediaan['wanita']?></a></center></td> -->
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= footer()?>

<script>
    $("#kesediaan").addClass("active")
    
    $('#dataTable').dataTable({
       "bInfo" : false
    });

    $(document).on('click', '.modal-kesediaan', function(){
        let id = $(this).data("id");
        let title = id.split("|");
        $.ajax({
            url : "<?= base_url()?>laporan/get_kesediaan",
            data : {id : id},
            method : "POST",
            dataType : "json",
            async : true,
            success : function(data){
                $("#modalKesediaanTitle").html(title[0]+' '+title[1]);

                let html = '';
                let urut = 1;
                for (let i = 0; i < data.length; i++) {
                    html += '<li class="list-group-item d-flex justify-content-between align-items-center"><span>'+urut+'. '+data[i].nama_kpq+'</span>'+data[i].no_hp+'</li>';
                    urut++;
                }

                $(".list-kpq").html(html);
            }
        })
    })
</script>