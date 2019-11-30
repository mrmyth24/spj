<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?php
    if ($this->uri->segment(2) == 'cariRombongan') { ?>

        <div class="row">
            <div class="col">
                <a href="<?= base_url('spp') ?>" class="btn btn-primary">
                    <i class="pull-right fa fa-chevron-left"></i>
                    <span class="icon text-white">Kembali Ke Daftar SPP</span>
                </a>
            </div>

            <div class="float-right">
                <a href="<?= base_url('spp/cetakRekap') ?>" class="btn btn-primary">
                    <i class="fa fa-file-download"></i>
                    <span class="icon text-white">Cetak Rekap</span>
                </a>
            </div>
        </div>

    <?php } ?>


    <div class="row mt-2">
        <div class="col">
            <form action="<?= base_url('spp/cariRombongan') ?>" method="post">
                <div class="input-group">
                    <div class="input-group-prepend bg-light">
                        <label class="input-group-text bg-light font-weight-light small" for="kategori">Cari Berdasarkan</label>
                    </div>
                    <select name="kategori" id="kategori" style="width: 100px;" class="custom-select">
                        <option value="Nama Rombongan">Nama Rombongan</option>
                        <option value="Kode Unit">Kode Unit</option>
                    </select>
                    <select name="kodeunit" id="kodeunit" style="width: 10px;" class="custom-select">
                        <option value="cmo">CMO</option>
                        <option value="it">IT</option>
                    </select>
                    <input name="tanggal" id="tanggal" autocomplete="off" type="text" class="w-40 form-control" placeholder="Tanggal" required>
                    <input name="tanggal2" id="tanggal2" autocomplete="off" type="text" class="w-40 form-control" placeholder="Tanggal" required>
                    <input name="keyword" id="keyword" autocomplete="off" type="text" class="w-50 form-control" placeholder="Kata Kunci" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">

            <?= $this->session->flashdata('message') ?>

            <div class="card">
                <div class="table-responsive">

                    <table class="table table-hover table-bordered">
                        <thead style="background: #4e73df;" class="text-light">
                            <tr>
                                <th scope="col" style="text-align: top;" rowspan="2">No.</th>
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
            </div>

            <div class="row mt-3">
                <div class="col">
                    <!--Tampilkan pagination-->
                    <?= isset($pagination) ? $pagination : ''; ?>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->