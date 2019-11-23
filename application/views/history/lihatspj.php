<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <?= form_error('nomor', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tujuan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('keperluan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal_berangkat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal_kembali', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('ditujukan_kepada', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jabatan_penandatanganan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <div class="card">
                <div class="card-header">
                    Lihat Surat
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <!--" enctype="multipart/form-data">-->
                        <?php echo form_open_multipart() ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nomor" name="nomor" readonly value="<?= $spj['nomor'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tanggal" name="tanggal" readonly value="<?= $spj['tanggal'] ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" class="form-control" id="tujuan" name="tujuan" readonly value="<?= $spj['tujuan'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="keperluan" name="keperluan" readonly value="<?= $spj['keperluan'] ?>">
                            </div>


                            <!-- <div class="row form-group tambahan">

                            <div class="col"><input type="text" class="form tambahForm" id="nama_rombongan" name="nama_rombongan[]" placeholder="Nama Rombongan">
                            </div>
                            <div class="col"><button id="tambahInput" type="button" href="">tambah</button></div>
                            <div class="col"><button type="button" id="resetInput" href="">reset</button></div>

                            <div class="col" id="insert-form"></div>
                            <input type="hidden" id="jumlah-form" value="1">

                        </div> -->

                            <?php $i = 1;
                            $j = 1;
                            foreach ($pdl_rombongan as $dataRombongan) : ?>
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
                                    <input class="form-control" type="text" id="golonganRombongan<?php echo ($i >= 2 ?  $i : null) ?>" name="golongan_rombongan[]" placeholder="Golongan Rombongan" readonly value="<?= $dataRombongan['golongan_rombongan'] ?>">
                                </div>
                                <div class="col" id="insert-form"></div>
                                <input type="hidden" id="jumlah-form" value="<?php echo $j += 1; ?>">

                                <?php $i++ ?>
                            <?php endforeach ?>

                            <div class="form-group">
                                <input type="date" class="form-control" id="tanggal_berangkat" readonly name="tanggal_berangkat" value="<?= $spj['tanggal_berangkat'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="tanggal_kembali" readonly name="tanggal_kembali" value="<?= $spj['tanggal_kembali'] ?>">
                            </div>

                            <div class="form-group">
                                <div class="autocomplete">
                                    <input class=" form-control" id="myInput2" type="text" readonly name="ditujukan_kepada" value="<?= $spj['ditujukan_kepada'] ?>">
                                </div>
                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control" id="jabatan_penandatanganan" readonly name="jabatan_penandatanganan" value="<?= $spj['jabatan_penandatanganan'] ?>">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" readonly id="nomor_spj" name="nomor_spj" placeholder="Nomor SPJ" value="<?= $spj['nomor_spj'] ?>">
                            </div>

                            <div class="form-group">
                                <input type="date" class="form-control" readonly id="tanggal_spj" name="tanggal_spj" readonly value="<?= $spj['tanggal_spj'] ?>">
                            </div>

                            <div class="form-group">
                                <input class="form-control" readonly id="tipe_keperluan" name="tipe_keperluan" placeholder="Tipe Keperlan" value="<?= $spj['tipe_keperluan'] ?>">
                            </div>

                            <div class="form-group">
                                <input class="form-control" readonly id="jenis_kendaraan" name="jenis_kendaraan" value="<?= $spj['jenis_kendaraan'] ?>" placeholder="Jenis Kendaraan">
                            </div>

                            <div class="form-group">
                                <input type="text" readonly class="form-control" id="no_polis" name="no_polis" placeholder="No Polis" value="<?= $spj['no_polis'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" readonly class="form-control" id="pengemudi" name="pengemudi" placeholder="Pengemudi" value="<?= $spj['pengemudi'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" readonly class="form-control" id="ditanggung_perusahaan" name="ditanggung_perusahaan" placeholder="Ditanggung Perusahaan" value="<?= $spj['ditanggung_perusahaan'] ?>">
                            </div>

                            <div class="form-group">
                                <input type="text" readonly class="form-control" id="lain_lain" name="lain_lain" placeholder="Lain-Lain" value="<?= $spj['lain_lain'] ?>">
                            </div>



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