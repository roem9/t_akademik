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
                    <td style="padding: 10px">Nama Pengajar</td>
                    <td style="padding: 10px"><?= $kpq['nama_kpq']?></td>
                </tr>
                <tr>
                    <td style="padding: 10px">Program/Level</td>
                    <td style="padding: 10px"><?= $kelas['tipe_kelas'] . "/" . $kelas['program']?></td>
                </tr>
                <?php foreach ($jadwal as $jadwal) :?>
                    <tr>
                        <td style="padding: 10px">Hari/Jam</td>
                        <td style="padding: 10px"><?= $jadwal['hari']."/".$jadwal['jam']." WIB"?></td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td style="padding: 10px">Periode</td>
                    <td style="padding: 10px"></td>
                </tr>
            </table>
            <br><br>
            <table border=1>
                <tr>
                    <th style="padding: 10px">Nama Peserta</th>
                    <th style="padding: 10px">Periode</th>
                    <th style="padding: 10px">Tilawah</th>
                    <th style="padding: 10px">Materi</th>
                    <th style="padding: 10px">keterangan</th>
                </tr>
                <?php foreach ($peserta as $peserta) :?>
                    <?php foreach ($peserta['laporan'] as $laporan) :?>
                        <tr>
                            <td style="padding: 10px"><?= $peserta['nama_peserta']?></td>
                            <td style="padding: 10px"><?= date("M-y", strtotime($laporan['tgl_awal'])) . " s.d " . date("M-y", strtotime($laporan['tgl_akhir']))?></td>
                            <td style="padding: 10px"><?= $laporan['tilawah']?></td>
                            <td style="padding: 10px"><?= $laporan['materi']?></td>
                            <td style="padding: 10px"><?= $laporan['keterangan']?></td>
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