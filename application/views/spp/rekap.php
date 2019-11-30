<table class="table table-hover table-bordered">
    <thead style="background: #4e73df;" class="text-light">
        <tr>
            <th scope="col" style="text-align: top;" rowspan="2"><?= $pdl['nama_peserta'] ?></th>
            <th scope="col" style="text-align: center;" rowspan="2">Nama</th>
            <th scope="col" style="text-align: center;" rowspan="2">Gol</th>
            <th scope="col" style="text-align: center;" colspan="2">Surat Perjalanan Dinas</th>
            <th scope="col" style="text-align: center;" rowspan="2">Tujuan</th>
            <th scope="col" style="text-align: center;" colspan="2">tanggal</th>
            <th scope="col" style="text-align: center;" rowspan="2">Jumlah Hari</th>
            <th scope="col" style="text-align: center;" rowspan="2">Uang Makan</th>
            <th scope="col" style="text-align: center;" colspan="3">Uang Makan</th>
            <th scope="col" style="text-align: center;" colspan="2">Uang Saku</th>
            <th scope="col" style="text-align: center;" rowspan="2">Biaya lain-lain</th>
            <th scope="col" style="text-align: center;" rowspan="2">Total Seluruhnya</th>
            <th scope="col" style="text-align: center;" rowspan="2">Tanda Tangan</th>
            <th scope="col" style="text-align: center;" rowspan="2">ِAction</th>
        </tr>
        <tr>
            <td>Nomor SPJ</td>
            <td>Tanggal</td>
            <td>Berangkat</td>
            <td>Kembali</td>
            <td>Pagi(Rp)</td>
            <td>Siang(Rp)</td>
            <td>Malam(Rp)</td>
            <td>Perhari(Rp)</td>
            <td>Jumlah(Rp)</td>
        </tr>
    </thead>
    <tbody>

        <?php $i = 1; ?>
        <?php foreach ($pdl as $p) : ?>
            <?php
                $date1 = strtotime($p['tanggal_berangkat']);
                $date2 = strtotime($p['tanggal_kembali']);
                if ($date1 > $date2) {
                    $days = 0;
                    $denda = 0;
                } else {


                    // Formulate the Difference between two dates
                    $diff = abs($date2 - $date1);
                    // To get the year divide the resultant date into
                    // total seconds in a year (365*60*60*24)
                    $years = floor($diff / (365 * 60 * 60 * 24));
                    // To get the month, subtract it with years and
                    // divide the resultant date into
                    // total seconds in a month (30*60*60*24)
                    $months = floor(($diff - $years * 365 * 60 * 60 * 24)
                        / (30 * 60 * 60 * 24));
                    // To get the day, subtract it with years and
                    // months and divide the resultant date into
                    // total seconds in a days (60*60*24)
                    $days = floor(($diff - $years * 365 * 60 * 60 * 24 -
                        $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                    $denda = (int) $days;
                }
                ?>

            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $p['nama_peserta'] ?></td>
                <td><?= $p['golongan_rombongan'] ?></td>
                <td><?= $p['nomor_spj'] ?></td>
                <td><?= $p['tanggal_spj'] ?></td>
                <td><?= $p['tujuan'] ?></td>
                <td><?= $p['tanggal_berangkat'] ?></td>
                <td><?= $p['tanggal_kembali'] ?></td>
                <td><?= $days ?></td>
                <td><?= $p['uang_makans'] ?></td>
                <td><?= $p['makan_pagis'] ?></td>
                <td><?= $p['makan_siangs'] ?></td>
                <td><?= $p['makan_malams'] ?></td>
                <td><?= $p['uang_sakus'] ?></td>
                <td><?= $p['uang_sakus'] * $days ?></td>
                <td></td>
                <td><?= $p['total'] ?></td>
                <td></td>
                <td>
                    <a href="<?= base_url('SPP/addmail/') . $p['id']; ?>" class="btn btn-info btn-circle">SPP</a>
                    <a href="<?= base_url('SPP/laporan_spp/') . $p['id']; ?>" class=" badge badge-secondary" target="_blank">Download Surat SPP</a>
                </td>

            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>


</table>
</div>