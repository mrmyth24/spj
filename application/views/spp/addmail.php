<?php
$nama = array();
$i = 0;
if ($karyawan != null) {
    foreach ($karyawan as $a) {
        $nama[$i] = $a['nama'];
        $i++;
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">

        <div class="col-lg-6">

            <?= form_error('nomor', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('nama', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jabatan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tujuan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('keperluan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal_berangkat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal_kembali', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('ditujukan_kepada', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jabatan_penandatanganan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('nomor_spj', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal_spj', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tipe_keperluan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jenis_kendaraan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('no_polis', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('pengemudi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('ditanggung_perusahaan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('lain_lain', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('nomor_spp', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('disetujui_spp', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jabatan_penyetuju', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('diajukan_spp', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jabatan_spp', '<div class="alert alert-danger" role="alert">', '</div>'); ?>


            <div class="card">
                <div class="card-header">
                    Add mail
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <!--						<form method="post" action="--><? //= base_url('surat_masuk/addmail')
                                                                                    ?>
                        <!--" enctype="multipart/form-data">-->
                        <?php echo form_open_multipart() ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nomor" name="nomor" readonly value="<?= $spj[0]['nomor'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tanggal" name="tanggal" readonly value="<?= $spj[0]['tanggal'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tujuan" name="tujuan" readonly value="<?= $spj[0]['tujuan'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="keperluan" name="keperluan" readonly value="<?= $spj[0]['keperluan'] ?>">
                        </div>


                        <!-- <div class="row form-group">

                            <div class="col"><input type="text" class="form tambahForm" id="nama_rombongan" name="nama_rombongan[]" placeholder="Nama Rombongan">
                            </div>
                            <div class="col"><button id="tambahInput" type="button" href="">tambah</button></div>
                            <div class="col"><button type="button" id="resetInput" href="">reset</button></div>

                            <div class="col" id="insert-form"></div>
                            <input type="hidden" id="jumlah-form" value="1">

                        </div> -->

                        <?php $i = 1;
                        $j = 1;
                        foreach ($spj as $dataRombongan) : ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-5">
                                        <input type="text" readonly class="form-control form tambahForm" id="<?php echo ($i == 1 ? 'nama_rombongan' : 'tambahForm' . $i) ?>" placeholder="Cari Nama Rombongan">
                                    </div>
                                    <div class="col">
                                        <select id="show-list<?php echo ($i >= 2 ?  $i : null) ?>" class="form-control show-list" name="nama_rombongan[]">
                                            <option><?= $dataRombongan['nama_peserta'] ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="<?php echo ($i == 1 ? 'jabatan_rombongan' : 'jabatanRombongan' . $i) ?>" name="jabatan_rombongan[]" placeholder="Jabatan Rombongan" readonly value="<?= $dataRombongan['jabatan_rombongan'] ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="biaya[]" readonly value="<?= $dataRombongan['uang_makan'] ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="biaya[]" readonly value="<?= $dataRombongan['makan_pagi'] ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="biaya[]" readonly value="<?= $dataRombongan['makan_siang'] ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="biaya[]" readonly value="<?= $dataRombongan['makan_malam'] ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="biaya[]" readonly value="<?= $dataRombongan['uang_saku'] ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="biaya[]" readonly value="<?= $dataRombongan['uang_cucian'] ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="biaya[]" readonly value="<?= $dataRombongan['penginapan'] ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="golonganRombongan<?php echo ($i >= 2 ?  $i : null) ?>" name="golongan_rombongan[]" placeholder="Golongan Rombongan" readonly value="<?= $dataRombongan['golongan_rombongan'] ?>">
                            </div>
                            <div class="col" id="insert-form"></div>
                            <input type="hidden" id="jumlah-form" value="<?php echo $j += 1; ?>">

                            <?php $i++ ?>
                        <?php endforeach ?>




                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" readonly value="<?= $spj[0]['tanggal_berangkat'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" readonly value="<?= $spj[0]['tanggal_kembali'] ?>">
                        </div>

                        <div class="form-group">
                            <div class="autocomplete">
                                <input class=" form-control" id="myInput2" type="text" name="ditujukan_kepada" readonly value="<?= $spj[0]['ditujukan_kepada'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jabatan_penandatanganan" name="jabatan_penandatanganan" readonly value="<?= $spj[0]['jabatan_penandatanganan'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="nomor_spj" name="nomor_spj" placeholder="Nomor SPJ" value="<?= $spj[0]['nomor_spj'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="date" readonly class="form-control" id="tanggal_spj" name="tanggal_spj" readonly value="<?= date("Y-n-d"); ?>">
                        </div>

                        <div class="form-group">
                            <input class="form-control" readonly id="tipe_keperluan" name="tipe_keperluan" value="<?= $spj[0]['tipe_keperluan'] ?>">
                            </input>
                        </div>

                        <div class="form-group">
                            <input class="form-control" readonly id="jenis_kendaraan" name="jenis_kendaraan" value="<?= $spj[0]['jenis_kendaraan'] ?>">
                            </input>
                        </div>

                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="no_polis" name="no_polis" placeholder="No Polis" value="<?= $spj[0]['no_polis'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="pengemudi" name="pengemudi" placeholder="Pengemudi" value="<?= $spj[0]['pengemudi'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="ditanggung_perusahaan" name="ditanggung_perusahaan" placeholder="Ditanggung Perusahaan" value="<?= $spj[0]['ditanggung_perusahaan'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="lain_lain" name="lain_lain" placeholder="Lain-Lain" value="<?= $spj[0]['lain_lain'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nomor_spp" name="nomor_spp" placeholder="Nomor SPP" value="<?= $spj[0]['nomor_spp'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="disetujui_spp" name="disetujui_spp" placeholder="Disetujui Oleh" value="<?= $spj[0]['disetujui_spp'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jabatan_penyetuju" name="jabatan_penyetuju" placeholder="Jabatan Penyetuju" value="<?= $spj[0]['jabatan_penyetuju'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="diajukan_spp" name="diajukan_spp" placeholder="Diajukan Oleh" value="<?= $spj[0]['diajukan_spp'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jabatan_spp" name="jabatan_spp" placeholder="Jabatan Pengaju" value="<?= $spj[0]['jabatan_spp'] ?>">
                        </div>


                        <button type="submit" class="btn btn-primary">Add</button>
                        <?php echo form_close() ?>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->