<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="d-flex justify-content-begin mt-3">
                    <h1 class="h3 mb-0 text-gray-800 mr-3"><?= $title?></h1>
                </div>
            </div>
            <table border=1>
                <tr>
                    <td>Nama Pengajar</td>
                    <td><?= $kpq['nama_kpq']?></td>
                </tr>
                <tr>
                    <td>Program/Level</td>
                    <td><?= $kelas['tipe_kelas'] . "/" . $kelas['program']?></td>
                </tr>
                <?php foreach ($jadwal as $jadwal) :?>
                    <tr>
                        <td>Hari/Jam</td>
                        <td><?= $jadwal['hari']."/".$jadwal['jam']." WIB"?></td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td>Periode</td>
                    <td></td>
                </tr>
            </table>
            <br><br>
            <table border=1>
                <tr>
                    <th>Nama Peserta</th>
                    <th>Periode</th>
                    <th>Nilai</th>
                    <th>keterangan</th>
                </tr>
                <?php foreach ($peserta as $peserta) :?>
                    <?php foreach ($peserta['laporan'] as $laporan) :?>
                        <tr>
                            <td><?= $peserta['nama_peserta']?></td>
                            <td><?= date("M-y", strtotime($laporan['tgl_awal'])) . " s.d " . date("M-y", strtotime($laporan['tgl_akhir']))?></td>
                            <td><?= $laporan['nilai']?></td>
                            <td><?= $laporan['keterangan']?></td>
                        </tr>
                    <?php endforeach;?>
                <?php endforeach;?>
            </table>
        </div>
    </div>
</div>
<script>
    $("#sidebarRekap").addClass("active");
</script>