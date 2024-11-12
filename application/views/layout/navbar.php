<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white"
    id="sidenav-main" data-color="info">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/">
            <img src="<?= base_url() ?>/assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold"></span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto pb-0" id="sidenav-collapse-mai">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?= ($sidebar == "home") ? 'active' : '' ?>" href="
                    <?= base_url('home') ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-check" viewBox="0 0 16 16">
                            <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z" />
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#kelasMenu" class="nav-link <?= ($sidebar == "kelas") ? 'active' : '' ?>" aria-controls="kelasMenu"
                    role="button" aria-expanded="<?= ($sidebar == "kelas") ? 'true' : 'false' ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                            <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                            <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Kelas</span>
                </a>
                <div class="collapse <?= ($sidebar == "kelas") ? 'show' : '' ?>" id="kelasMenu" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "kelas reguler aktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>kelas/reguler/aktif">
                                <span class="sidenav-normal"> Reguler Aktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "kelas reguler nonaktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>kelas/reguler/nonaktif">
                                <span class="sidenav-normal"> Reguler Nonaktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "kelas pv khusus aktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>kelas/pvkhusus/aktif">
                                <span class="sidenav-normal"> PV Khusus Aktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "kelas pv khusus nonaktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>kelas/pvkhusus/nonaktif">
                                <span class="sidenav-normal"> PV Khusus Nonaktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "kelas pv luar aktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>kelas/pvluar/aktif">
                                <span class="sidenav-normal"> PV Luar Aktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "kelas pv luar nonaktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>kelas/pvluar/nonaktif">
                                <span class="sidenav-normal"> PV Luar Nonaktif </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pesertaMenu" class="nav-link <?= ($sidebar == "peserta") ? 'active' : '' ?>" aria-controls="pesertaMenu"
                    role="button" aria-expanded="<?= ($sidebar == "peserta") ? 'true' : 'false' ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Peserta</span>
                </a>
                <div class="collapse <?= ($sidebar == "peserta") ? 'show' : '' ?>" id="pesertaMenu" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "peserta reguler aktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>peserta/reguler/aktif">
                                <span class="sidenav-normal"> Reguler Aktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "peserta reguler nonaktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>peserta/reguler/nonaktif">
                                <span class="sidenav-normal"> Reguler Nonaktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "peserta pv khusus aktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>peserta/pvkhusus/aktif">
                                <span class="sidenav-normal"> PV Khusus Aktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "peserta pv khusus nonaktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>peserta/pvkhusus/nonaktif">
                                <span class="sidenav-normal"> PV Khusus Nonaktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "peserta pv luar aktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>peserta/pvluar/aktif">
                                <span class="sidenav-normal"> PV Luar Aktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "peserta pv luar nonaktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>peserta/pvluar/nonaktif">
                                <span class="sidenav-normal"> PV Luar Nonaktif </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#kbmMenu" class="nav-link <?= ($sidebar == "kbm") ? 'active' : '' ?>" aria-controls="kbmMenu"
                    role="button" aria-expanded="<?= ($sidebar == "kbm") ? 'true' : 'false' ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-date" viewBox="0 0 16 16">
                            <path d="M6.445 12.688V7.354h-.633A13 13 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23" />
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">KBM</span>
                </a>
                <div class="collapse <?= ($sidebar == "kbm") ? 'show' : '' ?>" id="kbmMenu" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "kbm reguler") ? 'active' : '' ?>" href="
                                <?= base_url() ?>kelas/kbm/reguler">
                                <span class="sidenav-normal"> Reguler </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "kbm pv khusus") ? 'active' : '' ?>" href="
                                <?= base_url() ?>kelas/kbm/pvkhusus">
                                <span class="sidenav-normal"> PV Khusus </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "kbm pv luar") ? 'active' : '' ?>" href="
                                <?= base_url() ?>kelas/kbm/pvluar">
                                <span class="sidenav-normal"> PV Luar </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#badalMenu" class="nav-link <?= ($sidebar == "badal") ? 'active' : '' ?>" aria-controls="badalMenu"
                    role="button" aria-expanded="<?= ($sidebar == "badal") ? 'true' : 'false' ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5m14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Badal</span>
                </a>
                <div class="collapse <?= ($sidebar == "badal") ? 'show' : '' ?>" id="badalMenu" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "badal konfirmasi") ? 'active' : '' ?>" href="
                                <?= base_url() ?>badal/konfirmasi">
                                <span class="sidenav-normal"> Konfirmasi </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "badal jadwal") ? 'active' : '' ?>" href="
                                <?= base_url() ?>badal/jadwal">
                                <span class="sidenav-normal"> Jadwal </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "badal rekap") ? 'active' : '' ?>" href="
                                <?= base_url() ?>badal/rekap">
                                <span class="sidenav-normal"> Rekap </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#wlMenu" class="nav-link <?= ($sidebar == "wl") ? 'active' : '' ?>" aria-controls="wlMenu"
                    role="button" aria-expanded="<?= ($sidebar == "wl") ? 'true' : 'false' ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Waiting List</span>
                </a>
                <div class="collapse <?= ($sidebar == "wl") ? 'show' : '' ?>" id="wlMenu" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "wl reguler") ? 'active' : '' ?>" href="
                                <?= base_url() ?>wl/reguler">
                                <span class="sidenav-normal"> Reguler </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "wl privat") ? 'active' : '' ?>" href="
                                <?= base_url() ?>wl/privat">
                                <span class="sidenav-normal"> Privat </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "wl pending") ? 'active' : '' ?>" href="
                                <?= base_url() ?>wl/pending">
                                <span class="sidenav-normal"> Privat Pending </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#laporanMenu" class="nav-link <?= ($sidebar == "laporan") ? 'active' : '' ?>" aria-controls="laporanMenu"
                    role="button" aria-expanded="<?= ($sidebar == "laporan") ? 'true' : 'false' ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                            <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21 21 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21 21 0 0 0 14 7.655V1.222z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Laporan</span>
                </a>
                <div class="collapse <?= ($sidebar == "laporan") ? 'show' : '' ?>" id="laporanMenu" style="">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "rekap kbm") ? 'active' : '' ?>" href="
                                <?= base_url() ?>laporan/rekap">
                                <span class="sidenav-normal"> Rekap KBM </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "kelas nonaktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>laporan/kelasnonaktif">
                                <span class="sidenav-normal"> Kelas Nonaktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "jadwal nonaktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>laporan/jadwalnonaktif">
                                <span class="sidenav-normal"> Jadwal Nonaktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "peserta nonaktif") ? 'active' : '' ?>" href="
                                <?= base_url() ?>laporan/pesertanonaktif">
                                <span class="sidenav-normal"> Peserta Nonaktif </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= ($sidebarDropdown == "download laporan") ? 'active' : '' ?>" href="
                                <?= base_url() ?>laporan">
                                <span class="sidenav-normal"> Download Laporan </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= ($sidebar == "kesediaan") ? 'active' : '' ?>" href="
                    <?= base_url('laporan/kesediaan') ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-airplane" viewBox="0 0 16 16">
                            <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849m.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1s-.458.158-.678.599" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Kesediaan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= ($sidebar == "program") ? 'active' : '' ?>" href="
                    <?= base_url('other/program') ?>">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8" />
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Program</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" onclick="logout()">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                            href="javascript:void(0);">Pages</a></li>
                    <?php if (isset($breadcrumbs)) : ?>
                        <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                                <?= $breadcrumb ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (isset($breadcrumbSelect)) : ?>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                            <select name="moveSelected" id="moveSelected" style="border:none; background-color: inherit">
                                <?php foreach ($breadcrumbSelect as $select) : ?>
                                    <?= $select ?>
                                <?php endforeach; ?>
                            </select>
                        </li>
                    <?php endif; ?>
                </ol>
                <h6 class="font-weight-bolder mb-0">
                    <?= $title ?>
                </h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
                <div
                    class="navbar-nav <?= (isset($searchButton) && $searchButton) ? 'justify-content-between' : 'justify-content-end' ?>">
                    <?php if (isset($searchButton) && $searchButton) : ?>
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group">
                                <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span>
                                <input type="text" class="form-control" placeholder="cari client" id="formSearch">
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->


    <div class="container-fluid py-4">