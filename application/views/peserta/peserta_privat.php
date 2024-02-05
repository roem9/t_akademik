<!-- modal detail peserta -->
    <div class="modal fade" id="modalDetailPesertaPrivat" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailPesertaPrivatTitle"></h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?=base_url()?>peserta/edit_data_peserta_privat" method="post">
                                <input type="hidden" name="id_peserta" id="id_peserta">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input class='form-control form-control-sm' type="text" name="nama" id="nama">
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No Handphone</label></td>
                                    <input class='form-control form-control-sm' type="text" name="no_hp" id="no_hp">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tgl Lahir</label></td>
                                    <input class='form-control form-control-sm' type="date" name="tgl_lahir" id="tgl_lahir">
                                </div>
                                <div class="form-group">
                                    <label for="jk">Gender</label>
                                    <select name="jk" id="jk" class='form-control form-control-sm'>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_peserta">Alamat</label>
                                    <textarea class='form-control form-control-sm' name="alamat" id="alamat_peserta" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_masuk">Tgl Masuk</label>
                                    <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control form-control-sm" readonly>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="submit" class="btn btn-sm btn-success" value="Edit Data" id="btn-edit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- modal detail peserta -->

<div class="content">
    <div class="card shadow mb-4 overflow-auto">
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Status</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Nama Peserta</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">No HP</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Program</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Pengajar</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Action</th>
                </thead>
                <tbody>
                    <?php 
                    $i = 0;
                    foreach ($peserta as $peserta) :?>
                        <tr>
                            <td>
                                <?php 
                                    $background = "";
                                    $msg = "";

                                    if($peserta['status'] == "aktif"){
                                        $background = 'success';
                                        $msg = 'Yakin akan menonaktifkan peserta ini?';
                                        $statusPeserta = 'nonaktif';
                                    } else {
                                        $background = 'warning';
                                        $msg = 'Yakin akan mengaktifkan peserta ini?';
                                        $statusPeserta = 'aktif';
                                    }
                                ?>

                                <a href="<?= base_url()?>peserta/edit_status_peserta/<?= $peserta['id_peserta']?>/<?= $statusPeserta?>" onclick="return confirm('<?= $msg?>')">
                                    <span class="badge bg-gradient-<?= $background?>">
                                        <?= $peserta['status']?>
                                    </span>
                                </a>
                            </td>
                            <td><?= $peserta['nama_peserta']?></td>
                            <td><?= $peserta['no_hp']?></td>
                            <?php if($peserta['nama_kpq'] == ""):?>
                                <td><center>-</center></td> <!-- program-->
                                <td><center>-</center></td> <!-- pengajar-->
                                <td>
                                    <center>
                                        <a href="javascript:void(0)" class="modalDetailPesertaPrivat" data-bs-toggle="modal" data-bs-target="#modalDetailPesertaPrivat" target="_blank" data-id="<?= $peserta['id_peserta']?>">
                                            <span class="badge bg-gradient-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                                </svg>
                                            </span>
                                        </a>
                                    </center>
                                </td>
                            <?php else :?>
                                <td><?= $peserta['program']?></td>
                                <td><?= $peserta['nama_kpq']?></td>
                                <td>
                                    <center>
                                        <?php if($status == "aktif") :?>
                                            <a href="https://peserta.tar-q.com/laporan/peserta/<?= md5($peserta['no_peserta'])?>" target="_blank">
                                                <span class="badge bg-gradient-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
                                                        <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293z"/>
                                                    </svg>
                                                </span>
                                            </a>
                                        <?php endif;?>
                                            <a href="javascript:void(0)" class="modalDetailPesertaPrivat" data-bs-toggle="modal" data-bs-target="#modalDetailPesertaPrivat" target="_blank" data-id="<?= $peserta['id_peserta']?>">
                                                <span class="badge bg-gradient-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                                    </svg>
                                                </span>
                                            </a>
                                    </center>
                                </td>
                            <?php endif;?>
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
    
    $(document).on("click", ".modalDetailPesertaPrivat", function(){
        const id = $(this).data('id');
        
        $.ajax({
            url : "<?=base_url()?>peserta/get_detail_peserta",
            method : "POST",
            data : {id : id},
            async : true,
            dataType : 'json',
            success : function(data){
                $(".modal-title").html(data.nama_peserta);
                $("#id_peserta").val(data.id_peserta);
                $("#nama").val(data.nama_peserta);
                $("#status").val(data.status);
                $("#no_hp").val(data.no_hp);
                $("#tgl_masuk").val(data.tgl_masuk);
                $("#jk").val(data.jk);
                $("#alamat_peserta").val(data.alamat);
                $("#tgl_lahir").val(data.tgl_lahir);
            }
        })

        $(".content").hide();
    })

    var modalDetailPesertaPrivat = document.getElementById('modalDetailPesertaPrivat')
    modalDetailPesertaPrivat.addEventListener('hidden.bs.modal', function (event) {
        $(".content").show();
    })

    // validation
        // $("#btn-form-1").click(function(){

        //     $("#btn-form-1").addClass("active")
        //     $("#btn-form-2").removeClass("active")
            
        //     $("#form-1").show();
        //     $("#form-2").hide();
        // })

        // $("#btn-form-2").click(function(){
            
        //     $("#btn-form-1").removeClass("active")
        //     $("#btn-form-2").addClass("active")
            
        //     $("#form-1").hide();
        //     $("#form-2").show();
        // })

        $("#btn-edit").click(function(){
            var c = confirm('Yakin akan mengedit data?');
            return c;
        })
    // validation
</script>
