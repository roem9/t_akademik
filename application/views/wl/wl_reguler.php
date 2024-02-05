<!-- modal wl reguler -->
    <div class="modal fade" id="modalWlReguler" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalWlRegulerTitle"></h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-pindah-kelas">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5m14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5"/>
                    </svg>
                </span>
                <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-nonaktif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-x" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
                    </svg>
                </span>
                <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-pindah-wl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                    </svg>
                </span>

                <div class="mb-3"></div>

                <form action="<?= base_url()?>kelas/pindah_kelas_reguler" method="post" class='menu-navigation' id="menu-pindah-kelas">
                    <div class="alert alert-info" style="background-image: none"><i class="fa fa-info-circle mr-1 text-info"></i> Menu ini untuk memindahkan peserta reguler ke kelas reguler</div>
                    <ul class="list-group list-peserta-pindah"></ul>

                    <div class="form-group mt-3">
                    <label for="id-pindah">Pindah Ke Kelas?</label>
                    <select name="id" id="id-pindah" class="form-control form-control-md" required>
                        <option value="">Pilih Kelas</option>
                        <?php foreach ($kelas_reg as $kelas) :?>
                        <option value="<?= $kelas['data']['id_kelas']?>"><?= $kelas['data']['program'] . " [" . $kelas['peserta'] . "] - " . $kelas['data']['nama_kpq'] . " - " . $kelas['data']['hari'] . " (" . $kelas['data']['jam'] . ")"?></option>
                        <?php endforeach;?>
                    </select>
                    </div>
                    <div class="d-flex justify-content-end">
                    <input type="submit" value="Pindah" class="btn btn-sm btn-success" id="btn-pindah">
                    </div>
                </form>

                <form action="<?= base_url()?>kelas/nonaktif_peserta" method="post" class='menu-navigation' id="menu-nonaktif">
                    <div class="alert alert-info" style="background-image: none"><i class="fa fa-info-circle mr-1 text-info"></i> Menu ini untuk menonaktifkan peserta reguler</div>
                    <ul class="list-group list-peserta-nonaktif"></ul>
                    <div class="d-flex justify-content-end">
                    <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger mt-3" id="btn-nonaktif">
                    </div>
                </form>
                    
                <form action="<?= base_url()?>kelas/pindah_peserta_reguler_wl" method="post" class='menu-navigation' id="menu-pindah-wl">
                    <div class="alert alert-info" style="background-image: none"><i class="fa fa-info-circle mr-1 text-info"></i> Menu ini untuk mengubah waktu atau program dari waiting list peserta reguler</div>
                    <ul class="list-group list-peserta-wl"></ul>
                    <div class="form-group mt-3">
                    <label for="program-wl">Program</label>
                    <select name="program" id="program-wl" class="form-control form-control-md" required> 
                        <option value="">Pilih Program</option>
                        <?php foreach ($program as $prog) :?>
                        <option value="<?= $prog['nama_program']?>"><?= $prog['nama_program']?></option>
                        <?php endforeach;?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="hari-wl">Hari</label>
                    <select name="hari" id="hari-wl" class="form-control form-control-md" required>
                        <option value="">Pilih Hari</option>
                        <option value="Ahad">Ahad</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="jam-wl">Waktu</label>
                    <select name="jam" id="jam-wl" class="form-control form-control-md" required>
                        <option value="">Pilih Waktu</option>
                        <option value="08.30-10.00">08.30-10.00</option>
                        <option value="10.00-11.30">10.00-11.30</option>
                        <option value="13.00-14.30">13.00-14.30</option>
                        <option value="15.30-17.00">15.30-17.00</option>
                    </select>
                    </div>
                    <div class="d-flex justify-content-end">
                    <input type="submit" value="Pindah WL" class="btn btn-sm btn-warning mt-3" id="btn-wl">
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
<!-- modal wl reguler -->

<div class="content">
    <div class="card shadow mb-4 overflow-auto">
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Kategori</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Ikhwan</th> 
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Akhwat</th>
                </thead>
                <tbody>
                    <?php 
                    $i = 0;
                    foreach ($wl as $wl) :?>
                        <tr>
                            <td><center><?= ++$i?></center></td>
                            <td><?= $wl['kategori']?></td>
                            <td>
                                <center>
                                    <a href="javascript:void(0)" class="modalWlReguler" data-bs-target="#modalWlReguler" data-bs-toggle="modal" data-id="<?=$wl['kategori']?>|Pria">
                                        <span class="badge bg-gradient-info">
                                            <?= $wl['pria']?>
                                        </span>
                                    </a>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href="javascript:void(0)" class="modalWlReguler" data-bs-target="#modalWlReguler" data-bs-toggle="modal" data-id="<?=$wl['kategori']?>|Wanita">
                                        <span class="badge bg-gradient-info">
                                            <?= $wl['wanita']?>
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
            icon: "info",
            title: "<?= $this->session->flashdata('pesan')?>"
        });
    <?php endif; ?>

    $(document).on("click", ".modalWlReguler", function(){
        let navigation = 'menu-pindah-kelas';
        // Remove and add classes to navigation buttons
        $(".btn-navigation").removeClass("bg-gradient-info").addClass("bg-gradient-secondary");
        $(`[data-menu='${navigation}']`).removeClass("bg-gradient-secondary").addClass("bg-gradient-info");

        // Hide all menu-navigation elements and show the one with the specified data-menu
        $(".menu-navigation").hide();
        $("#" + navigation).show();


        let id = $(this).data("id");
        let data = id.split("|");
        $("#modalWlRegulerTitle").html(data[0]+" "+data[1]);

        $.ajax({
            url : "<?= $link?>",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                let html = '';
                let html1 = '';
                let html2 = '';
                let j = 0;

                for (let i = 0; i < data.length; i++) {
                    html += '<li class="list-group-item d-flex justify-content-between"><span><div class="form-check">'+
                                '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="'+i+'">'+
                                '<label class="form-check-label" for="'+i+'">'+
                                    data[i].nama_peserta + 
                                '</label>'+
                            '</div></span></li>'+
                            '<li class="list-group-item list-group-item-secondary d-flex justify-content-between text-sm">'+
                                '<span><strong>Daftar</strong> : '+ data[i].tgl +'</span>'+
                                '<span><strong>TL</strong> : '+ data[i].tgl_lahir +'</span>'+
                                '<span><strong>No. Hp</strong> : '+ data[i].no_hp +'</span>'+
                            '</li>';
                }
                $(".list-peserta-pindah").html(html);
                
                for (let i = 0; i < data.length; i++) {
                    html1 += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="i'+i+'">'+
                                '<label class="form-check-label" for="i'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }
                $(".list-peserta-nonaktif").html(html1);
                
                for (let i = 0; i < data.length; i++) {
                    html2 += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="j'+i+'">'+
                                '<label class="form-check-label" for="j'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }
                $(".list-peserta-wl").html(html2);
            }
        })

        $(".content").hide();
    })
    
    var modalWlReguler = document.getElementById('modalWlReguler')
    modalWlReguler.addEventListener('hidden.bs.modal', function (event) {
        $(".content").show();
    })

    $(".btn-navigation").on("click", function(){
      $(".alert-error").hide();

      let data = $(this).data("menu");

      $(".btn-navigation").removeClass("bg-gradient-info");
      $(".btn-navigation").removeClass("bg-gradient-secondary");
      $(".btn-navigation").addClass("bg-gradient-secondary");

      $(`[data-menu='${data}']`).removeClass("bg-gradient-secondary");
      $(`[data-menu='${data}']`).addClass("bg-gradient-info");

      $(".menu-navigation").hide();
      $("#" + data).show();
    })
    
    $("#btn-pindah").click(function(){
        var c = confirm("Yakin akan memindahkan peserta?");
        return c;
    })
    
    $("#btn-nonaktif").click(function(){
        var c = confirm("Yakin akan menonaktifkan peserta?");
        return c;
    })

    $("#btn-wl").click(function(){
        var c = confirm("Yakin akan memindahkan peserta ke waiting list?")
        return c;
    })
</script>
