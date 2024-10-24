<div class="modal fade" id="modalDetailPesertaReguler" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailPesertaRegulerTitle"></h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>peserta/edit_data_peserta_reguler" method="post">
                    <div class="card-body">
                        <span class="badge bg-gradient-secondary btn-navigation active" data-menu="menu-data-akademik">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                                <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z" />
                                <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z" />
                            </svg>
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-data-peserta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </span>
                        <div class="mb-3"></div>
                        <input type="hidden" name="id_peserta" id="id_peserta">
                        <div class="form-detail menu-navigation" id="menu-data-akademik">
                            <div class="form-group">
                                <label for="program">Program</label>
                                <select name="program" id="program" class="form-control form-control-md">
                                    <option value="">Pilih Program</option>
                                    <?php foreach ($program as $prog) : ?>
                                        <option value="<?= $prog['nama_program'] ?>"><?= $prog['nama_program'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <select name="hari" id="hari" class="form-control form-control-md">
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Ahad">Ahad</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jam">Jam</label>
                                <select name="jam" id="jam" class="form-control form-control-md">
                                    <option value="">Pilih Jam</option>
                                    <option value="08.30-10.00">08.30-10.00</option>
                                    <option value="10.00-11.30">10.00-11.30</option>
                                    <option value="13.00-14.30">13.00-14.30</option>
                                    <option value="15.30-17.00">15.30-17.00</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_masuk">Tgl Masuk</label>
                                <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control form-control-md" readonly>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="javascript:void(0)" class='btn btn-sm btn-success btn-navigation' data-menu="menu-data-peserta" id="btn-next-1">Data Diri</a>
                            </div>
                        </div>
                        <div class="form-detail menu-navigation" id="menu-data-peserta">
                            <div class="form-group">
                                <label for="status">status</label>
                                <select name="status" id="status" class="form-control form-control-md">
                                    <option value="">Pilih status</option>
                                    <option value="aktif">aktif</option>
                                    <option value="nonaktif">nonaktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input class='form-control form-control-md' type="text" name="nama" id="nama">
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No Handphone</label></td>
                                <input class='form-control form-control-md' type="text" name="no_hp" id="no_hp">
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tgl Lahir</label></td>
                                <input class='form-control form-control-md' type="date" name="tgl_lahir" id="tgl_lahir">
                            </div>
                            <div class="form-group">
                                <label for="jk">Gender</label>
                                <select name="jk" id="jk" class='form-control form-control-md'>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat_peserta">Alamat</label>
                                <textarea class='form-control form-control-md' name="alamat" id="alamat_peserta" rows="3"></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="javascript:void(0)" class='btn btn-sm btn-secondary btn-navigation' data-menu="menu-data-akademik" id="btn-back-2">Data Akademik</a>
                                <input type="submit" class="btn btn-sm btn-info" value="Edit Data" id="btn-edit">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- <div class="modal-footer">
                <input type="submit" class="btn btn-sm btn-primary btn-block" value="Update" id="btn-edit">
            </div> -->
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="modalWlReguler" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalWlRegulerTitle">Pindah Waiting List</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info" style="background-image: none">
                            <i class="fa fa-info-circle text-info mr-1"></i> Menu ini untuk memindahkan peserta nonaktif ke waiting list
                        </div>
                        <form action="<?= base_url() ?>peserta/pindah_peserta_reguler_wl" method="post">
                            <input type="hidden" name="id_peserta">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input class='form-control form-control-md' type="text" name="nama" readonly>
                            </div>
                            <div class="form-group">
                                <label for="program">Program</label>
                                <select name="program" class="form-control form-control-md" required>
                                    <option value="">Pilih Program</option>
                                    <?php foreach ($program as $prog) : ?>
                                        <option value="<?= $prog['nama_program'] ?>"><?= $prog['nama_program'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <select name="hari" class="form-control form-control-md" required>
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Ahad">Ahad</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jam">Jam</label>
                                <select name="jam" class="form-control form-control-md" required>
                                    <option value="">Pilih Jam</option>
                                    <option value="08.30-10.00">08.30-10.00</option>
                                    <option value="10.00-11.30">10.00-11.30</option>
                                    <option value="13.00-14.30">13.00-14.30</option>
                                    <option value="15.30-17.00">15.30-17.00</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Pindah WL" class="btn btn-warning" id="pindah-wl">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content">
    <div class="card shadow mb-4 overflow-auto">
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Status</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Nama Peserta</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">No HP</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Program</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Tempat</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Hari</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Jam</th>
                    <?php if ($title == "Peserta Reguler Nonaktif"): ?>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Action</th>
                    <?php else : ?>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Pengajar</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Action</th>
                    <?php endif; ?>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($peserta as $peserta) : ?>
                        <tr>
                            <td><?= $peserta['status'] ?>
                            <td><?= $peserta['nama_peserta'] ?></td>
                            <td><?= $peserta['no_hp'] ?></td>
                            <?php if ($peserta['status'] == "wl" || $peserta['status'] == "nonaktif"): ?>
                                <td><?= $peserta['program_peserta'] ?></td>
                                <td>
                                    <center>-</center>
                                </td>
                                <td><?= $peserta['hari_peserta'] ?></td>
                                <td><?= $peserta['jam_peserta'] ?></td>
                                <td>
                                    <center>
                                        <a href="javascript:void(0)" class="modalWlReguler" data-bs-target="#modalWlReguler" data-bs-toggle="modal" data-id="<?= $peserta['id_peserta'] ?>">
                                            <span class="badge bg-gradient-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="javascript:void(0)" class="modalDetailPesertaReguler" data-bs-toggle="modal" data-bs-target="#modalDetailPesertaReguler" target="_blank" data-id="<?= $peserta['id_peserta'] ?>">
                                            <span class="badge bg-gradient-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                                </svg>
                                            </span>
                                        </a>
                                    </center>
                                </td>
                                <!-- <td><center>-</center></td> -->
                            <?php else : ?>
                                <td><?= $peserta['program'] ?></td>
                                <td><?= $peserta['tempat'] ?></td>
                                <td><?= $peserta['hari'] ?></td>
                                <td><?= $peserta['jam'] ?></td>
                                <td><?= $peserta['nama_kpq'] ?></td>
                                <td>
                                    <center>
                                        <a href="https://peserta.tar-q.com/laporan/peserta/<?= md5($peserta['no_peserta']) ?>" target="_blank">
                                            <span class="badge bg-gradient-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
                                                    <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293z" />
                                                </svg>
                                            </span>
                                        </a>
                                        <a href="javascript:void(0)" class="modalDetailPesertaReguler" data-bs-toggle="modal" data-bs-target="#modalDetailPesertaReguler" target="_blank" data-id="<?= $peserta['id_peserta'] ?>">
                                            <span class="badge bg-gradient-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                                </svg>
                                            </span>
                                        </a>
                                    </center>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= footer() ?>

<script>
    let table = new DataTable('#dataTable');

    <?php if ($this->session->flashdata('pesan')) : ?>
        Toast.fire({
            icon: "success",
            title: "<?= $this->session->flashdata('pesan') ?>"
        });
    <?php endif; ?>

    $("#btn-form-1").addClass("active");

    $("#form-1").show();
    $("#form-2").hide();

    $(document).on("click", ".modalDetailPesertaReguler", function() {
        const id = $(this).data('id');

        $.ajax({
            url: "<?= base_url() ?>peserta/get_detail_peserta",
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                $(".modal-title").html(data.nama_peserta);
                $("#id_peserta").val(data.id_peserta);
                $("#nama").val(data.nama_peserta);
                $("#status").val(data.status);
                $("#no_hp").val(data.no_hp);
                $("#tgl_masuk").val(data.tgl_masuk);
                $("#jk").val(data.jk);
                $("#program").val(data.program);
                $("#hari").val(data.hari);
                $("#jam").val(data.jam);
                $("#alamat_peserta").val(data.alamat);
                $("#tgl_lahir").val(data.tgl_lahir);
            }
        })

        $(".content").hide();

        let data = 'menu-data-akademik';
        // Remove and add classes to navigation buttons
        $(".btn-navigation").removeClass("bg-gradient-info").addClass("bg-gradient-secondary");
        $(`[data-menu='${data}']`).removeClass("bg-gradient-secondary").addClass("bg-gradient-info");

        // Hide all menu-navigation elements and show the one with the specified data-menu
        $(".menu-navigation").hide();
        $("#" + data).show();
    })

    $(document).on('click', '.modalWlReguler', function() {
        const id = $(this).data('id');

        $.ajax({
            url: "<?= base_url() ?>peserta/get_detail_peserta",
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $("input[name='id_peserta']").val(data.id_peserta);
                $("input[name='nama']").val(data.nama_peserta);
                $("select[name='program']").val(data.program);
                $("select[name='hari']").val(data.hari);
                $("select[name='jam']").val(data.jam);
            }
        })

        $(".content").hide();
    })

    var modalDetailPesertaReguler = document.getElementById('modalDetailPesertaReguler')
    modalDetailPesertaReguler.addEventListener('hidden.bs.modal', function(event) {
        $(".content").show();
    })

    var modalWlReguler = document.getElementById('modalWlReguler')
    modalWlReguler.addEventListener('hidden.bs.modal', function(event) {
        $(".content").show();
    })

    $("#btn-form-1, #btn-back-2").click(function() {

        $("#btn-form-1").addClass("active")
        $("#btn-form-2").removeClass("active")

        $("#form-1").show();
        $("#form-2").hide();
    })

    $("#btn-form-2, #btn-next-1").click(function() {

        $("#btn-form-1").removeClass("active")
        $("#btn-form-2").addClass("active")

        $("#form-1").hide();
        $("#form-2").show();
    })

    $("#btn-edit").click(function() {
        var c = confirm('Yakin akan mengedit data?');
        return c;
    })

    $("#pindah-wl").click(function() {
        var c = confirm("Yakin akan memindahkan peserta ke waiting list?");
        return c;
    })


    $(".btn-navigation").on("click", function() {
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
</script>