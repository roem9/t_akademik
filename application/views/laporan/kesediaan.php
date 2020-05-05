<!-- modal kesediaan -->
    <div class="modal fade" id="modalKesediaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title capitalize" id="modalKesediaanTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body cus-font">
                <ul class="list-group list-kpq"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>
<!-- modal kesediaan -->

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
                    <th width=15%>Ikhwan</th>
                    <th width=15%>Akhwat</th>
                </thead>
                <tbody id="tbod">
                    <?php 
                        $no = 0;
                        foreach ($kesediaan as $kesediaan) :?>
                        <tr>
                            <td><center><?= ++$no?></center></td>
                            <td class="capitalize"><?= $kesediaan['waktu']?></td>
                            <td><center><a href="#modalKesediaan" class="modal-kesediaan" data-toggle="modal" data-id="<?=$kesediaan['waktu']?>|Pria"><?= $kesediaan['pria']?></a></center></td>
                            <td><center><a href="#modalKesediaan" class="modal-kesediaan" data-toggle="modal" data-id="<?=$kesediaan['waktu']?>|Wanita"><?= $kesediaan['wanita']?></a></center></td>
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

<script>
    $("#kesediaan").addClass("active")
    
    $('#dataTable').dataTable({
       "bInfo" : false
    });

    $("#tbod").on('click', '.modal-kesediaan', function(){
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