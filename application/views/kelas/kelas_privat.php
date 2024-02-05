<!-- modal kelas privat -->
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
                            <a href="#" class='nav-link' id="btn-form-3"><i class="fas fa-user-slash"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-4"><i class="fas fa-clock"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-5"><i class="fas fa-exchange-alt"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-6">tambah jadwal</a>
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
                        <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-peserta-aktif">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                            </svg>
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-peserta-nonaktif">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-slash" viewBox="0 0 16 16">
                                <path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465m-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                            </svg>
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-jadwal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                            </svg>
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-pindah">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5m14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5"/>
                            </svg>
                        </span>
                        <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-tambah-jadwal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-plus-fill" viewBox="0 0 16 16">
                                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2M8.5 8.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5a.5.5 0 0 1 1 0"/>
                            </svg>
                        </span>

                        <div class="mb-3"></div>
                        <form action="<?= base_url()?>kelas/edit_kelas_privat" method="post" class="menu-navigation" id="menu-data-kelas">
                            <input type="hidden" name="id" id="id-edit">
                            <!-- <div class="form-group">
                            <label for="status-edit">Status</label>
                            <select name="status" id="status-edit" class="form-control form-control-md" required>
                                <option value="">Pilih Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                                <option value="wl">WL</option>
                                <option value="konfirm">Konfirm</option>
                            </select>
                            </div> -->
                            <div class="form-group">
                            <label for="nip-edit">Pengajar</label>
                            <select name="nip" id="nip-edit" class="form-control form-control-md">
                                <option value="">Pilih Pengajar</option>
                                <?php foreach ($kpq as $kpq) :?>
                                <option value="<?= $kpq['nip']?>"><?= $kpq['nama_kpq']?></option>
                                <?php endforeach;?>
                            </select>
                            </div>
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

                        <form action="<?= base_url()?>kelas/nonaktif_peserta" method="post" class="menu-navigation" id="menu-peserta-aktif">
                            <div class="alert alert-info" style="background-image: none"><i class="fa fa-info-circle mr-1 text-info"></i> menu ini berisi list peserta aktif. pilih peserta kemudian pilih tombol nonaktif untuk menonaktifkan peserta</div>
                            <ul class="list-group list-peserta-aktif"></ul>
                            <input type="hidden" name="id_kelas">
                            <div class="d-flex justify-content-end mt-3">
                            <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger" id="btn-nonaktif-peserta">
                            </div>
                        </form>
                        
                        <form action="<?= base_url()?>kelas/aktifkan_peserta" method="post" class="menu-navigation" id="menu-peserta-nonaktif">
                            <div class="alert alert-info" style="background-image: none"><i class="fa fa-info-circle mr-1 text-info"></i> menu ini untuk mengaktifkan kembali peserta. pilih peserta kemudian pilih tombol aktifkan untuk mengaktifkan peserta</div>
                            <ul class="list-group list-peserta-nonaktif"></ul>

                            <div class="d-flex justify-content-end mt-3">
                            <input type="submit" value="Aktifkan" class="btn btn-sm btn-success" id="btn-aktif-peserta">
                            </div>
                        </form>

                        <form action="<?= base_url()?>kelas/nonaktif_jadwal" method="post" class="menu-navigation" id="menu-jadwal">
                            <input type="hidden" name="id_kelas">
                            <ul class="list-group list-jadwal-nonaktif"></ul>
                            <div class="form-group mt-3">
                                <label for="tgl_history">Tgl Nonaktif</label>
                                <input type="date" name="tgl_history" class="form-control form-control-md" required>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger mt-3" id="btn-nonaktif-jadwal">
                            </div>
                        </form>

                        <form action="<?= base_url()?>kelas/pindah_peserta_privat" method="post" class="menu-navigation" id="menu-pindah">
                            <div class="alert alert-info" style="background-image: none"><i class="fa fa-info-circle mr-1 text-info"></i> menu ini untuk memindahkan peserta ke kelas lain</div>
                            <ul class="list-group list-peserta-pindah"></ul>
                            <div class="form-group mt-1">
                                <label for="tipe_kelas">Tipe Kelas</label>
                                <select name="tipe_kelas" id="tipe_kelas" class="form-control form-control-md">
                                    <option value="">Pilih Tipe Kelas</option>
                                    <option value="pv khusus">Privat Khusus</option>
                                    <option value="pv luar">Privat Luar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_kelas_pindah">Koordinator</label>
                                <select name="id_kelas_pindah" id="id_kelas_pindah" class="form-control form-control-md">
                                </select>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <input type="submit" value="Pindah" class="btn btn-sm btn-success" id="btn-pindah-peserta">
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
<!-- modal kelas privat -->

<!-- modal pindah wl -->
    <div class="modal fade" id="modalPindahWl" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPindahWlTitle">Pindah Ke Waiting List</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" style="background-image: none">
                        <i class="fa fa-exclamation-circle text-warning mr-1"></i> <strong>Perhatian</strong>! ketika kelas privat dipindahkan ke waiting list maka jadwal dan pengajar dari kelas akan dihapus. Harap mengisi jadwal dan detail peserta pada form catatan
                    </div>
                    <form action="<?=base_url()?>kelas/pindah_wl" method="post">
                        <input type="hidden" name="id_kelas" id="id_kelas">
                        <div class="form-group">
                            <label for="koor">Koordinator</label>
                            <input type="text" name="koor" id="p_koor" class="form-control form-control-md" readonly>
                        </div>
                        <div class="form-group">
                            <label for="p_catatan">Catatan</label>
                            <textarea name="catatan" id="p_catatan" class="form-control form-control-md" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="p_tempat">Tempat</label>
                            <textarea name="tempat" id="p_tempat" class="form-control form-control-md" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Pindah WL" class="btn btn-sm btn-warning" id="pindah-wl">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- modal pindah wl -->

<!-- modal nonaktif -->
    <div class="modal fade" id="modalNonaktif" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNonaktifTitle">Nonaktifkan Kelas</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="alert alert-warning">
                        <i class="fa fa-exclamation-circle text-warning mr-1"></i> <strong>Perhatian</strong>! ketika kelas privat dipindahkan ke waiting list maka jadwal dan pengajar dari kelas akan dihapus. Harap mengisi jadwal dan detail peserta pada form catatan
                    </div> -->
                    <form action="<?=base_url()?>kelas/nonaktif_kelas_privat" method="post">
                        <input type="hidden" name="id_kelas">
                        <div class="form-group">
                            <label for="koor">Koordinator</label>
                            <input type="text" name="koor" class="form-control form-control-md" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_history">Tgl Nonaktif</label>
                            <input type="date" name="tgl_history" class="form-control form-control-md" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger" id="nonaktif">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- modal nonaktif -->

<div class="content">
    <div class="card shadow mb-4 overflow-auto">
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Status</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Koor</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">No HP</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Program</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder">Pengajar</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Peserta</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Action</th>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        foreach ($kelas as $kelas) :?>
                        <tr>
                            <td>
                                <?php if($kelas['data']['status'] == "aktif"):?>
                                    <a href="javascript:void(0)" data-id="<?= $kelas['data']['id_kelas'] . "|" . $kelas['data']['nama_peserta']?>" class="nonaktif-kelas" data-bs-toggle="modal" data-bs-target="#modalNonaktif">
                                        <span class="badge bg-gradient-success">
                                            aktif
                                        </span>
                                    </a>
                                <?php elseif($kelas['data']['status'] == "nonaktif") :?>
                                    <a href="<?= base_url()?>kelas/editstatus/<?= $kelas['data']['id_kelas']?>/aktif" onclick="return confirm('Yakin akan mengaktifkan kelas ini?')">
                                        <span class="badge bg-gradient-warning">
                                            nonaktif
                                        </span>
                                    </a>
                                <?php endif;?>
                            </td>
                            <td><?= $kelas['data']['nama_peserta']?></td>
                            <td><?= $kelas['data']['no_hp']?>
                            <td><?= $kelas['data']['program']?>
                            <td><?= $kelas['data']['nama_kpq']?>
                            <td><center><?= $kelas['peserta']?></center></td>
                            <td>
                                <center>
                                    <?php if($status == "aktif") :?>
                                        <?php if($kelas['data']['program'] == "Tahfidz Anak" || $kelas['data']['program'] == "Tahfidz Remaja" || $kelas['data']['program'] == "Tahfidz Dewasa") :?>
                                            <a href="javascript:void(0)">
                                                <span class="badge bg-gradient-secondary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
                                                        <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293z"/>
                                                    </svg>
                                                </span>
                                            </a>
                                        <?php elseif($kelas['data']['program'] == "Pra Tahsin 1" || $kelas['data']['program'] == "Pra Tahsin 2" || $kelas['data']['program'] == "Pra Tahsin 3" || $kelas['data']['program'] == "Tahsin 1" || $kelas['data']['program'] == "Tahsin 2" || $kelas['data']['program'] == "Tahsin 3" || $kelas['data']['program'] == "Tahsin 4" || $kelas['data']['program'] == "Tahsin Lanjutan") : ?>
                                            <a target="_blank" href="<?= base_url()?>laporan/tahsin/<?= md5($kelas['data']['id_kelas'])?>">
                                                <span class="badge bg-gradient-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
                                                        <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293z"/>
                                                    </svg>
                                                </span>
                                            </a>
                                        <?php elseif($kelas['data']['program'] == "Bahasa Arab 1" || $kelas['data']['program'] == "Bahasa Arab 2" || $kelas['data']['program'] == "Bahasa Arab 3" || $kelas['data']['program'] == "Bahasa Arab 4" || $kelas['data']['program'] == "Bahasa Arab Lanjutan") : ?>
                                            <a target="_blank" href="<?= base_url()?>laporan/b_arab/<?= md5($kelas['data']['id_kelas'])?>">
                                                <span class="badge bg-gradient-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
                                                        <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293z"/>
                                                    </svg>
                                                </span>
                                            </a>
                                        <?php endif;?>
                                    <?php endif;?>

                                    <a href="javascript:void(0)" class="modalKelasPrivat" data-bs-target="#modalKelasPrivat" data-bs-toggle="modal" data-id="<?= $kelas['data']['id_kelas']?>|<?= $kelas['data']['id_peserta']?>">
                                        <span class="badge bg-gradient-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                            </svg>
                                        </span>
                                    </a>

                                    <a href="javascript:void(0)" class="modalPindahWl" data-bs-target="#modalPindahWl" data-bs-toggle="modal" data-id="<?= $kelas['data']['id_kelas']?>|<?= $kelas['data']['nama_peserta']?>">
                                        <span class="badge bg-gradient-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
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

    // nonaktifkan kelas
    $(document).on("click", ".nonaktif-kelas", function(){
        let data = $(this).data("id");
        data = data.split("|");
        let id = data[0];
        let nama_peserta = data[1];

        $("input[name='id_kelas']").val(id);
        $("input[name='koor']").val(nama_peserta);

        $(".content").hide();
    })

    $(document).on("click", ".modalPindahWl", function(){
        let data = $(this).data("id");
        data = data.split("|");
        let id = data[0];
        let nama_peserta = data[1];

        $.ajax({
            url : "<?= base_url()?>kelas/get_data_kelas_privat",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                $("#id_kelas").val(data.id_kelas);
                $("#p_catatan").val(data.catatan);
                $("#p_tempat").val(data.tempat);
                $("#p_koor").val(nama_peserta);
            }
        })

        $(".content").hide();
    })

    $(document).on("click", ".modalKelasPrivat", function(){
        $("#koor-edit").val()
        
        let data = $(this).data("id");
        data = data.split("|");
        let id = data[0];
        let id_peserta = data[1];

        $("input[name='id_kelas']").val(id);
        
        $.ajax({
            url : "<?= base_url()?>kelas/get_peserta_aktif_by_kelas",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                let html = `<label for="koor-edit">Koordinator</label>
                            <select name="id_peserta" id="koor-edit" class="form-control form-control-md" required>
                            <option value="">Pilih Koordinator</option>`;
                let html2 = '';
                
                for (let i = 0; i < data.length; i++) {
                    if(data[i].id_peserta == id_peserta){
                        html += '<option value="'+data[i].id_peserta+'" selected>'+data[i].nama_peserta+'</option>';
                    } else {
                        html += '<option value="'+data[i].id_peserta+'">'+data[i].nama_peserta+'</option>';
                    }
                }

                html += '</select>';

                $("#koor-form").html(html);
                
                for (let i = 0; i < data.length; i++) {
                    html2 += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="'+i+'">'+
                                '<label class="form-check-label" for="'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }

                $(".list-peserta-aktif").html(html2);
                
                html2 = "";
                for (let i = 0; i < data.length; i++) {
                    html2 += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="p'+i+'">'+
                                '<label class="form-check-label" for="p'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }

                $(".list-peserta-pindah").html(html2);
            }
        })
        
        $.ajax({
            url : "<?= base_url()?>kelas/get_peserta_nonaktif_by_kelas",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                let html = '';
                
                for (let i = 0; i < data.length; i++) {
                    html += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="a'+i+'">'+
                                '<label class="form-check-label" for="a'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }

                $(".list-peserta-nonaktif").html(html);
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

        let navigation = 'menu-data-kelas';
        // Remove and add classes to navigation buttons
        $(".btn-navigation").removeClass("bg-gradient-info").addClass("bg-gradient-secondary");
        $(`[data-menu='${navigation}']`).removeClass("bg-gradient-secondary").addClass("bg-gradient-info");

        // Hide all menu-navigation elements and show the one with the specified data-menu
        $(".menu-navigation").hide();
        $("#" + navigation).show();

        $(".content").hide();
    })

    var modalKelasPrivat = document.getElementById('modalKelasPrivat')
    modalKelasPrivat.addEventListener('hidden.bs.modal', function (event) {
        $(".content").show();
    })

    var modalPindahWl = document.getElementById('modalPindahWl')
    modalPindahWl.addEventListener('hidden.bs.modal', function (event) {
        $(".content").show();
    })

    var modalNonaktif = document.getElementById('modalNonaktif')
    modalNonaktif.addEventListener('hidden.bs.modal', function (event) {
        $(".content").show();
    })

    $("#btn-edit").click(function(){
        var c = confirm("Yakin akan mengubah data kelas?");
        return c;
    })
    
    $("#btn-nonaktif-peserta").click(function(){
        var c = confirm("Yakin akan menonaktifkan peserta?");
        return c;
    })
    
    $("#btn-aktif-peserta").click(function(){
        var c = confirm("Yakin akan mengaktifkan kembali peserta?");
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

    $("#pindah-wl").click(function(){
        var c = confirm("Yakin akan memindahkan kelas ini ke waiting list?");
        return c;
    })

    $("#nonaktif").click(function(){
        var c = confirm("Yakin akan menonaktifkan kelas ini?")
        return c;
    })
    
    $("#btn-pindah-peserta").click(function(){
        var c = confirm("Yakin akan memindahkan peserta?")
        return c;
    })
    
    // generate peserta 
        $("#tipe_kelas").change(function(){
            let tipe = $(this).val();

            $.ajax({
                url: "<?= base_url()?>kelas/get_koor_kelas",
                dataType: "JSON",
                data: {tipe: tipe},
                method: "POST",
                success: function(result){
                    // console.log(result)
                    html = "";
                    result.kelas.forEach(kelas => {
                        html += `<option value="`+kelas.id_kelas+`">`+kelas.peserta+`</option>`
                    });
                    $("#id_kelas_pindah").html(html);
                }
            })
        })
        
        $("#btnGenerate").click(function(){
            let id_peserta = $("#id_generate").val();

            $.ajax({
                url: "<?= base_url()?>peserta/get_detail_peserta",
                dataType: "JSON",
                data: {id: id_peserta},
                method: "POST",
                success: function(data){
                    // console.log(data);
                    if(data.diri != null){
                        $("#nama_peserta").val(data.diri.nama_peserta)
                        $("#no_hp").val(data.diri.no_hp)
                        $("#t4_lahir").val(data.diri.t4_lahir)
                        $("#tgl_lahir").val(data.diri.tgl_lahir)
                        $("#tgl_masuk").val(data.diri.tgl_masuk)
                        $("#umur").val(data.diri.umur)
                        $("#jk").val(data.diri.jk)
                        $("#pendidikan").val(data.diri.pendidikan)
                        $("#status_nikah").val(data.diri.status_nikah)
                        $("#info").val(data.diri.info);
                        
                        var info = ["Teman", "Spanduk", "Media Elektronik", "Civitas Tar-Q", "Brosur", "Peserta", "Event"]
                        if(data.diri.info == "" || data.diri.info == null){
                            $("#info").val("");
                            $("#civitas").attr("disabled", true);
                            $("#civitas").val("");
                        } else if(info.includes(data.diri.info) == false){
                            $("#info").val("Lainnya");
                            $("#civitas").attr("disabled", false);
                            $("#civitas").val(data.diri.info);
                        } else {
                            $("#info").val(data.diri.info);
                            $("#civitas").attr("disabled", true);
                            $("#civitas").val("");
                        }

                        // data alamat
                        $("#alamat").val(data.alamat.alamat)
                        $("#kel").val(data.alamat.kel)
                        $("#kd_pos").val(data.alamat.kd_pos)
                        $("#kec").val(data.alamat.kec)
                        $("#kab_kota").val(data.alamat.kab_kota)
                        $("#provinsi").val(data.alamat.provinsi)
                        $("#no_telp").val(data.alamat.no_telp)
                        $("#email").val(data.alamat.email)

                        // data pekerjaan
                        $("#nama_perusahaan").val(data.pekerjaan.nama_perusahaan)
                        $("#alamat_perusahaan").val(data.pekerjaan.alamat_perusahaan)
                        $("#no_telp_perusahaan").val(data.pekerjaan.no_telp_perusahaan)
                        
                        var pekerjaan = ["Pelajar", "Mahasiswa", "Swasta", "PNS/BUMN", "TNI/POLRI"]
                        if(data.pekerjaan.pekerjaan == "" || data.pekerjaan.pekerjaan == null){
                            $("#pekerjaan").val(data.pekerjaan.pekerjaan)
                            $("#pekerjaan_lainnya").attr("disabled", true);
                            $("#pekerjaan_lainnya").val("");
                        } else if(pekerjaan.includes(data.pekerjaan.pekerjaan) == false){
                            $("#pekerjaan").val("Lainnya");
                            $("#pekerjaan_lainnya").attr("disabled", false);
                            $("#pekerjaan_lainnya").val(data.pekerjaan.pekerjaan);
                        } else {
                            $("#pekerjaan").val(data.pekerjaan.pekerjaan);
                            $("#pekerjaan_lainnya").attr("disabled", true);
                            $("#pekerjaan_lainnya").val("");
                        }

                        // data ortu
                        $("#nama_ibu").val(data.ortu.nama_ibu)
                        $("#t4_lahir_ibu").val(data.ortu.t4_lahir_ibu)
                        $("#tgl_lahir_ibu").val(data.ortu.tgl_lahir_ibu)
                        $("#nama_ayah").val(data.ortu.nama_ayah)
                        $("#t4_lahir_ayah").val(data.ortu.t4_lahir_ayah)
                        $("#tgl_lahir_ayah").val(data.ortu.tgl_lahir_ayah)

                        $(".msg-generate").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengenerate data `+data.diri.nama_peserta+`<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>`)
                    } else {
                        $("#formPendaftaran").trigger("reset");
                        $(".msg-generate").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal mengenerate data<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>`)
                    }
                    
                }
            })
        })
    // generate peserta 

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
</script>