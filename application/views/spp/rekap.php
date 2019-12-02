<style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 5px;
        border-style: solid;
        border-width: 1px;
        overflow: hidden;
        word-break: normal;
        border-color: black;
    }

    .tg .tg-9o1m {
        font-size: 12px;
        border-color: inherit;
        text-align: center;
        vertical-align: middle
    }

    .tg .tg-f4iu {
        font-size: 12px;
        border-color: inherit;
        text-align: center;
        vertical-align: top
    }
</style>
<center>
    <p>
        <b>
            PERHITUNGAN PEMBAYARAN BIAYA DINAS KE KEBUN-KEBUN PTP NUSANTARA
        </b>
    </p>
    <p>
        <b>
            KANTOR PUSAT PTPN-V PEKANBARU
        </b>
    </p>
</center>
<table class="tg" style="undefined; width: 1050px">
    <colgroup>
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
        <col style="width: 10px">
    </colgroup>
    <tr>
        <th class="tg-9o1m" rowspan="2">No.</th>
        <th class="tg-9o1m" rowspan="2">Nama</th>
        <th class="tg-9o1m" rowspan="2">Gol</th>
        <th class="tg-9o1m" colspan="2">Surat Perjalanan Dinas</th>
        <th class="tg-9o1m" rowspan="2">Tujuan</th>
        <th class="tg-f4iu" colspan="2">Tanggal</th>
        <th class="tg-f4iu" rowspan="2">Jumlah Hari</th>
        <th class="tg-f4iu" rowspan="2">Uang Makan</th>
        <th class="tg-f4iu" colspan="3">Uang Makan</th>
        <th class="tg-f4iu" colspan="2">Uang Saku</th>
        <th class="tg-f4iu" rowspan="2">Biaya Lain-lain</th>
        <th class="tg-f4iu" rowspan="2">Total Seluruhnya</th>
        <th class="tg-f4iu" rowspan="2">Tanda Tangan</th>
    </tr>
    <tr>
        <td class="tg-9o1m">Nomor SPJ</td>
        <td class="tg-9o1m">Tanggal</td>
        <td class="tg-f4iu">Berangkat</td>
        <td class="tg-f4iu">Kembali</td>
        <td class="tg-f4iu">Pagi(Rp)</td>
        <td class="tg-f4iu">Siang(Rp)</td>
        <td class="tg-f4iu">Malam(Rp)</td>
        <td class="tg-f4iu">Perhari(Rp)</td>
        <td class="tg-f4iu">Jumlah(Rp)</td>
    </tr>
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
            <td class="tg-f4iu"><?= $i ?></td>
            <td class="tg-f4iu"><?= $p['nama_peserta'] ?></td>
            <td class="tg-f4iu"><?= $p['golongan_rombongan'] ?></td>
            <td class="tg-f4iu"><?= $p['nomor_spj'] ?></td>
            <td class="tg-f4iu"><?= $p['tanggal_spj'] ?></td>
            <td class="tg-f4iu"><?= $p['tujuan'] ?></td>
            <td class="tg-f4iu"><?= $p['tanggal_berangkat'] ?></td>
            <td class="tg-f4iu"><?= $p['tanggal_kembali'] ?></td>
            <td class="tg-f4iu"><?= $days ?></td>
            <td class="tg-f4iu"><?= $p['uang_makans'] ?></td>
            <td class="tg-f4iu"><?= $p['makan_pagis'] ?></td>
            <td class="tg-f4iu"><?= $p['makan_siangs'] ?></td>
            <td class="tg-f4iu"><?= $p['makan_malams'] ?></td>
            <td class="tg-f4iu"><?= $p['uang_sakus'] ?></td>
            <td class="tg-f4iu"><?= $p['uang_sakus'] * $days ?></td>
            <td class="tg-f4iu"></td>
            <td class="tg-f4iu"><?= $p['total'] ?></td>
            <td class="tg-f4iu"></td>
        </tr>

        <?php $i++; ?>
    <?php endforeach; ?>

</table>
<br>
<table>

    <tr>
        <td style="padding-left: 100px; width: 600px">
            Disetujui Oleh
        </td>
        <td>

        </td>
        <td>

        </td>
        <td>
            Diajukan Oleh
        </td>
    </tr>

    <tr>
        <td style="padding-left: 100px; width: 600px">
            <br>
        </td>
        <td>
            <br>
        </td>
        <td>
            <br>
        </td>
        <td>
            <br>
        </td>
    </tr>

    <tr>
        <td style="padding-left: 100px; width: 600px">
            <br>
        </td>
        <td>
            <br>
        </td>
        <td>
            <br>
        </td>
        <td>
            <br>
        </td>
    </tr>

    <tr>
        <td style="padding-left: 100px; width: 600px">
            <b><u>Said Arindra</u></b>
        </td>
        <td>

        </td>
        <td>

        </td>
        <td>
            <b><u>Roberto Tarigan</u></b>
        </td>
    </tr>

    <tr>
        <td style="padding-left: 30px; width: 530px">
            Ka.Sub Bag Sekretariat dan Protokoler
        </td>
        <td>

        </td>
        <td>

        </td>
        <td>
            Staf Sub Bag Protokoler
        </td>
    </tr>

</table>