<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p skip="true" style="text-align: left;"><span style="font-size: 14px;">PT. PERKEBUNAN NUSANTARA V
            <br>KANTOR PUSAT PEKANBARU
        </span></p>
    <table border="1" style="width: 100%;">
        <tbody>
            <tr>
                <td style="width: 30.2926%;">Kepada Yth &nbsp; : <b>Kabag Sekretaris Perusahaan</b>
                    <br>Dari : <b>Urs. Sekretariat</b>
                    <br>Nomor SPP :
                    <br>Tanggal &nbsp; &nbsp; &nbsp; &nbsp; :
                </td>
                <td style="width: 41.8244%; vertical-align: top;">
                    <br>
                    <div style="text-align: center;">SURAT</div>
                    <div style="text-align: center;">PERMINTAAN PEMBAYARAN</div>
                    <div style="text-align: center;">(SPP)</div>
                </td>
                <td style="width: 27.5387%; vertical-align: top;">Dokumen Pendukung :
                    <br>No. &amp; tg. Kwitansi :
                    <br>No. &amp; tg. Faktur :
                    <br>No. &amp; tg. OPL.SPK :
                    <br>No. &amp; tg. Srt.Perj :
                    <br>
                    <br>
                </td>
            </tr>
        </tbody>
    </table>
    <p>
        <br>
    </p>
    <table border="1" style="width: 100%;">
        <tbody>
            <tr>
                <td style="width: 20.0000%;">
                    <div data-empty="true" style="text-align: center;">Dibayarkan Kepada</div>
                </td>
                <td style="width: 8%;">
                    <div data-empty="true" style="text-align: center;">Rekening</div>
                </td>
                <td style="width: 41.4802%;">
                    <div data-empty="true" style="text-align: center;">Uraian</div>
                </td>
                <td style="width: 11.3597%;">
                    <div data-empty="true" style="text-align: center;">Jumlah Rp</div>
                </td>
                <td style="width: 12.3924%;">
                    <div data-empty="true" style="text-align: center;">Tanda tangan</div>
                </td>
            </tr>
            <tr>
                <td style="width: 20.0000%;">
                    <?= $pdl_rombongan[0]['nama_peserta'] ?>
                </td>
                <td style="width: 8%;">
                    <br>
                </td>
                <td style="width: 41.4802%;">
                    Biaya perjalanan dinas ke <?= $spj['tujuan'] ?>
                    Sesuai rincian sebagai berikut:
                    <br>
                    <?php $i = 0;
                    foreach ($pdl_rombongan as $p) : ?>

                        <b><?= $p['nama_peserta'] ?></b>
                        <br>
                        <?= $spj['tanggal_berangkat'] ?> s/d <?= $spj['tanggal_kembali'] ?>
                        <br>
                        <?= $spj['nomor_spj'] ?>
                        <br>
                        Lumpsum 1x Rp.
                        <br>
                        Jumlah
                        <br>

                    <?php endforeach ?>

                </td>
                <td style="width: 11.3597%;">
                    <br>
                </td>
                <td style="width: 12.3924%;">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="width: 76.2478%;">
                    <div data-empty="true" style="text-align: center;">Jumlah di bayar</div>
                    <div style="text-align: center;"></div>
                </td>
                <td style="width: 11.3597%;">
                    <br>
                </td>
                <td style="width: 12.3924%;">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="width: 99.8279%;">&nbsp;Terbilang :
                    <br>
                    <br>
                </td>
            </tr>
        </tbody>
    </table>
    <p>An. SPP</p>
    <p>
        <br>
    </p>
    <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Disetujui oleh &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Diajukan Oleh</p>
    <p>
        <br>
    </p>
    <p>
        <br>
    </p>
    <p>
        <br>
    </p>
    <p>
        <br>
    </p>
    <p>Jujur, Tulus, Ikhlas</p>
</body>

</html>