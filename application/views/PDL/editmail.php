<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <?= form_error('nomor', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tujuan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jenis_perjalanan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('keperluan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal_berangkat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tanggal_kembali', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('ditujukan_kepada', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('jabatan_penandatanganan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <div class="card">
                <div class="card-header">
                    Edit PDL
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <!--" enctype="multipart/form-data">-->
                        <?php echo form_open_multipart() ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $pdl['nomor'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tanggal" name="tanggal" readonly value="<?= date("Y-n-d"); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= $pdl['tujuan'] ?>">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="jenis_perjalanan" name="jenis_perjalanan">
                                <option value="Luar Daerah">Luar Daerah</option>
                                <option value="Dalam Daerah Dalam Mes">Dalam Daerah Dalam Mes</option>
                                <option value="Dalam Daerah Luar Mes">Dalam Daerah Luar Mes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?= $pdl['keperluan'] ?>">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary add_field_button">Tambah Rombongan</button>
                        </div>

                        <?php
                        $i = 1;
                        $j = 1;
                        foreach ($pdl_rombongan as $dataRombongan) : ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-5">
                                        <!-- id="<?php //echo ($i == 1 ? 'nama_rombongan' : 'tambahForm' . $i) 
                                                        ?>" -->
                                        <input type="text" class="form-control form tambahForm" placeholder="Cari Nama Rombongan" readonly>
                                    </div>
                                    <div class="col">
                                        <select id="show-list<?php echo ($i >= 2 ?  $i : null) ?>" class="form-control show-list" name="nama_rombongan[]" disabled>
                                            <option><?= $dataRombongan['nama_peserta'] ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="<?php echo ($i == 1 ? 'jabatan_rombongan' : 'jabatanRombongan' . $i) ?>" name="jabatan_rombongan[]" placeholder="Jabatan Rombongan" readonly value="<?= $dataRombongan['jabatan_rombongan'] ?>">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" id="<?php echo ($i == 1 ? 'golongan_rombongan' : 'golonganRombongan' . $i) ?>" name="golongan_rombongan[]" placeholder="Golongan Rombongan" readonly value="<?= $dataRombongan['golongan_rombongan'] ?>">
                                <a href="<?= base_url('PDL/deleterombongan/' . $dataRombongan['id']); ?>" class="badge badge-danger deleteRombongan" onclick="return confirm('Yakin Hapus?')">delete Rombongan</a>
                            </div>
                            <div class="col" id="insert-form"></div>

                            <?php $i++ ?>
                        <?php endforeach ?>

                        <div class="col" id="insert-form">
                            <input type="hidden" id="id_pdl" value="<?= $pdl['id'] ?>">
                        </div>

                        <div class="col" id="insert-form">
                            <input type="hidden" id="jumlah-form" value="<?= $i - 1 ?>">
                        </div>

                        <div class="input_fields_wrap form-group">
                        </div>


                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" value="<?= $pdl['tanggal_berangkat'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?= $pdl['tanggal_kembali'] ?>">
                        </div>

                        <div class="form-group">
                            <div class="autocomplete">
                                <input class=" form-control" id="myInput2" type="text" name="ditujukan_kepada" value="<?= $pdl['ditujukan_kepada'] ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control" id="jabatan_penandatanganan" name="jabatan_penandatanganan" value="<?= $pdl['jabatan_penandatanganan'] ?>">
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