<!-- modal wl kelas pv -->
    <div class="modal fade" id="modalKelasPrivat" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKelasPrivatTitle">Detail Kelas Privat</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <!-- <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                            <a href="#" class='nav-link active' id="btn-form-1"><i class="fas fa-book"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-2"><i class="fas fa-user"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-3"><i class="fas fa-clock"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-4">tambah jadwal</a>
                            </li>
                        </ul>
                    </div> -->
                    <div class="card-body cus-font">
                        <span class="badge bg-gradient-secondary btn-navigation active" data-menu="menu-data-kelas">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                                <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
                                <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/>
                            </svg>
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-peserta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-jadwal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                            </svg>
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-tambah-jadwal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16">
                                <path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                            </svg>
                        </span>
                        
                        <div class="mt-3"></div>

                        <form action="<?= base_url()?>kelas/edit_kelas_privat" method="post" class="menu-navigation" id="menu-data-kelas">
                            <input type="hidden" name="id" id="id-edit">
                            <div class="form-group">
                                <label for="pengajar-edit">Tipe Pengajar</label>
                                <select name="pengajar" id="pengajar-edit" class="form-control form-control-md" required>
                                    <option value="">Pilih Tipe Pengajar</option>
                                    <option value="Pria">Ikhwan</option>
                                    <option value="Wanita">Akhwat</option>
                                    <option value="Pria&Wanita">Ikhwan & Akhwat</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="program-edit">Program</label>
                            <select name="program" id="program-edit" class="form-control form-control-md" required>
                                <option value="">Pilih Program</option>
                                <?php foreach ($program as $program) :?>
                                <option value="<?= $program['nama_program']?>"><?= $program['nama_program']?></option>
                                <?php endforeach;?>

                            </select>
                            </div>
                            <div class="form-group" id="koor-form">
                            </div>
                            <div class="form-group">
                            <label for="catatan-edit">Catatan</label>
                            <textarea name="catatan" id="catatan-edit" class="form-control form-control-md"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-success" id="btn-edit">Edit</button>
                            </div>
                        </form>

                        <form action="<?= base_url()?>kelas/nonaktif_peserta" method="post" class="menu-navigation" id="menu-peserta">
                            <div class="alert alert-info" style="background-image: none"><i class="fa fa-info-circle mr-1 text-info"></i> menu ini berisi list peserta aktif</div>
                            <ul class="list-group list-peserta-aktif"></ul>

                            <div class="d-flex justify-content-end mt-3">
                            <!-- <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger" id="btn-nonaktif-peserta"> -->
                            </div>
                        </form>

                        <form action="<?= base_url()?>kelas/nonaktif_jadwal" method="post" class="menu-navigation" id="menu-jadwal">
                            <ul class="list-group list-jadwal-nonaktif"></ul>
                            <div class="d-flex justify-content-end">
                            <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger mt-3" id="btn-nonaktif-jadwal">
                            </div>
                        </form>

                        <form action="<?= base_url()?>kelas/add_jadwal" method="post" class="menu-navigation" id="menu-tambah-jadwal">
                            <input type="hidden" name="id" id="id-add">
                            <div class="form-group">
                            <label for="hari">Hari</label>
                            <select name="hari" id="hari" class="form-control form-control-md" required>
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
                            <label for="jam">Jam</label>
                            <select name="jam" id="jam" class="form-control form-control-md" required>
                                <option value="">Pilih Jam</option>
                                <option value="05.00-06.30|3">05.00-06.30</option>
                                <option value="06.00-07.30|3">06.00-07.30</option>
                                <option value="07.00-08.30|2">07.00-08.30</option>
                                <option value="08.30-10.00|0">08.30-10.00</option>
                                <option value="10.00-11.30|0">10.00-11.30</option>
                                <option value="13.00-14.30|0">13.00-14.30</option>
                                <option value="15.30-17.00|0">15.30-17.00</option>
                                <option value="16.00-17.30|1">16.00-17.30</option>
                                <option value="17.00-18.30|3">17.00-18.30</option>
                                <option value="18.30-20.00|3">18.30-20.00</option>
                                <option value="19.30-21.00|3">19.30-21.00</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="tempat">Tempat</label>
                                <select name="tempat" id="tempat-pv-khusus" class="form-control form-control-md" required>
                                <option value="">Pilih Ruangan</option>
                                <?php foreach ($ruangan as $tempat) :?>
                                    <option value="<?= $tempat['nama_ruangan']?>"><?= $tempat['nama_ruangan']?></option>
                                <?php endforeach;?>
                                </select>
                                <textarea name="tempat" id="tempat-pv-luar" class="form-control form-control-md" required></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                            <input type="submit" value="Tambah" class="btn btn-sm btn-success" id="btn-tambah-jadwal">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<!-- modal wl kelas pv -->

<!-- modal wl kelas pv -->
    <div class="modal fade" id="modalStatus" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalStatusTitle">Ubah Status Kelas Privat</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body cus-font">
                            <form action="<?= base_url()?>wl/edit_status_privat" method="post" id="form-1">
                                <input type="hidden" name="id_kelas">
                                <div class="form-group">
                                    <label for="koor">Koordinator</label>
                                    <input type="text" name="koor" class="form-control form-control-md" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control form-control-md" required>
                                        <option value="">Pilih Status</option>
                                        <?php if($tabs == "pending"):?>
                                            <option value="nonaktif">Nonaktif</option>
                                            <option value="wl">Waiting List</option>
                                        <?php else :?>
                                            <option value="nonaktif">Nonaktif</option>
                                            <option value="pending">Pending</option>
                                        <?php endif;?>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="submit" value="Ubah Status" class="btn btn-sm btn-success" id="ubah-status">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- modal wl kelas pv -->

<div class="content">
    <div class="card shadow mb-4 overflow-auto">
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Status</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Tipe</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Koor</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">No HP</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Program</th>
                    <?php if($tabs != "pending"):?>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Pengajar</th>
                    <?php endif;?>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Peserta</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Action</th>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        foreach ($kelas as $kelas) :?>
                        <tr>
                            <td><center><?=++$no?></center></td>
                            <td>
                                <?php 
                                    $background = "";

                                    switch ($background) {
                                        case $kelas['data']['status'] == "wl":
                                            $background = 'warning';
                                            break;
                                        case $kelas['data']['status'] == "konfirm":
                                            $background = 'success';
                                            break;
                                        case $kelas['data']['status'] == "pending":
                                            $background = 'secondary';
                                            break;
                                        default:
                                            # code...
                                            break;
                                    }
                                ?>

                                <a href="javascript:void(0)" class="modalStatus" data-bs-target="#modalStatus" data-bs-toggle="modal" data-id="<?= $kelas['data']['id_kelas'] . '|' . $kelas['data']['nama_peserta']?>">
                                    <span class="badge bg-gradient-<?= $background?>">
                                        <?= $kelas['data']['status']?>
                                    </span>
                                </a>
                            </td>
                            <td><?= $kelas['data']['tipe_kelas']?></td>
                            <td><?= $kelas['data']['nama_peserta']?></td>
                            <td><?= $kelas['data']['no_hp']?>
                            <td><?= $kelas['data']['program']?>
                            <?php if($tabs != "pending"):?>
                                <td>
                                    <center>
                                        <?php if($kelas['data']['nama_kpq'] != NULL):?>
                                            <a href="javascript:void(0)" class="modalKelasPrivat" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php if($kelas['data']['hp_kpq'] != NULL || $kelas['data']['hp_kpq'] != ""){echo $kelas['data']['hp_kpq'];}else{echo "no hp kosong";}?>">
                                                <!-- <span class="badge bg-gradient-info"> -->
                                                    <?= $kelas['data']['nama_kpq']?>
                                                <!-- </span> -->
                                            </a>
                                        <?php else :?>
                                            -
                                        <?php endif;?>
                                    </center>
                                </td>
                            <?php endif;?>
                            <td><center><?= $kelas['peserta']?></center></td>
                            <td>
                                <a href="javascript:void(0)" class="modalKelasPrivat" data-bs-target="#modalKelasPrivat" data-bs-toggle="modal" data-id="<?= $kelas['data']['id_kelas']?>">
                                    <span class="badge bg-gradient-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                        </svg>
                                    </span>
                                </a>
                                <!-- <center><a href="#modalKelasPrivat" class="btn btn-info btn-sm modalKelasPrivat" data-toggle="modal" data-id="<?= $kelas['data']['id_kelas']?>">detail</a></center> -->
                                <?php if($tabs != "pending"):?>
                                    <?php if($kelas['data']['nama_kpq'] != ''):?>
                                        <a href="<?= base_url()?>wl/batal_wl/<?= $kelas['data']['id_kelas']?>" onclick="return confirm('Yakin tidak menyetujui kelas waiting list ini?')" id="btn-delete">
                                            <span class="badge bg-gradient-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="<?= base_url()?>wl/konfirm_wl/<?= $kelas['data']['id_kelas']?>" onclick="return confirm('Yakin menyetujui kelas waiting list ini?')" id="btn-konfirm">
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

    $(document).on("click", ".modalStatus", function(){
        let data = $(this).data("id");
        data = data.split("|");

        $("input[name='id_kelas']").val(data[0])
        $("input[name='koor']").val(data[1])
    })

    $(document).on("click", ".modalKelasPrivat", function(){
        let data = 'menu-data-kelas';
        // Remove and add classes to navigation buttons
        $(".btn-navigation").removeClass("bg-gradient-info").addClass("bg-gradient-secondary");
        $(`[data-menu='${data}']`).removeClass("bg-gradient-secondary").addClass("bg-gradient-info");

        // Hide all menu-navigation elements and show the one with the specified data-menu
        $(".menu-navigation").hide();
        $("#" + data).show();

        $("#koor-edit").val()
        
        let id = $(this).data("id");
        
        $.ajax({
            url : "<?= base_url()?>kelas/get_peserta_aktif_by_kelas",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                let html = '<option value="">Pilih Koordinator</option>';
                let html2 = '';
                
                for (let i = 0; i < data.length; i++) {
                    html += '<option value="'+data[i].id_peserta+'">'+data[i].nama_peserta+'</option>';
                }

                $("#koor-edit").html(html);
                
                for (let i = 0; i < data.length; i++) {
                    html2 += '<li class="list-group-item"><div class="form-check">'+
                                // '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="'+i+'">'+
                                '<label class="form-check-label" for="'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }

                $(".list-peserta-aktif").html(html2);
            }
        })

        $.ajax({
            url : "<?= base_url()?>kelas/get_data_kelas_privat",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                $("#id-add").val(data.id_kelas);
                $("#id-edit").val(data.id_kelas);
                $("#status-edit").val(data.status);
                $("#nip-edit").val(data.nip);
                $("#pengajar-edit").val(data.pengajar);
                $("#program-edit").val(data.program);
                $("#koor-edit").val(data.id_peserta);
                $("#catatan-edit").val(data.catatan);
                if(data.tipe_kelas == 'pv khusus'){
                    $("#tempat-pv-khusus").show();
                    $("#tempat-pv-khusus").attr("name", "tempat");
                    $("#tempat-pv-khusus").attr("required", "");
                    $("#tempat-pv-luar").hide();
                    $("#tempat-pv-luar").attr("name", "");
                    $("#tempat-pv-luar").removeAttr("required");
                } else {
                    $("#tempat-pv-khusus").hide();
                    $("#tempat-pv-khusus").attr("name", "");
                    $("#tempat-pv-khusus").removeAttr("required");
                    $("#tempat-pv-luar").show();
                    $("#tempat-pv-luar").attr("name", "tempat");
                    $("#tempat-pv-luar").attr("required", "");
                }
            }
        })
        
        $.ajax({
            url : "<?= base_url()?>kelas/get_data_jadwal_aktif_by_kelas",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                let html = '';
                for (let i = 0; i < data.length; i++) {
                    html += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_jadwal['+i+']" type="checkbox" value="'+data[i].id_jadwal+'" id="j'+i+'">'+
                                '<label class="form-check-label" for="j'+i+'">' +data[i].hari+ ' ' +data[i].jam+ ' [' +data[i].ot * 30+ '] '+
                                    data[i].tempat+
                                '</label>'+
                            '</div></li>';
                }

                $(".list-jadwal-nonaktif").html(html)
            }
        })
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

    $("#btn-edit").click(function(){
        var c = confirm("Yakin akan mengubah data kelas?");
        return c;
    })
    
    $("#btn-nonaktif-peserta").click(function(){
        var c = confirm("Yakin akan menonaktifkan peserta?");
        return c;
    })
    
    $("#btn-nonaktif-jadwal").click(function(){
        var c = confirm("Yakin akan menonaktifkan jadwal?");
        return c;
    })
    
    $("#btn-tambah-jadwal").click(function(){
        var c = confirm("Yakin akan menambahkan jadwal?");
        return c;
    })

    $("#ubah-status").click(function(){
        var c = confirm("Yakin akan mengubah status kelas?");
        return c;
    })

    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>