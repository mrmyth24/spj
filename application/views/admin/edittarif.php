<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <?= form_error('jenis_perjalanan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('kelompok_golongan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('uang_makan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('makan_pagi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('makan_siang', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('makan_malam', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('uang_saku', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('uang_cucian', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('taxi_bandara', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('air_port_tax', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('transport_lokal', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('penginapan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <div class="card">
                <div class="card-header">
                    Edit tarif
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <form method="post" action="<?= base_url('admin/edittarif/' . $tarifspj['id']); ?>">



                            <div class="form-group">
                                <select name="jenis_perjalanan" id="jenis_perjalanan" class="form-control">
                                    <option value="Dalam Wilayah">Dalam Wilayah</option>
                                    <option value="Luar Wilayah">Luar Wilayah</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="kelompok_golongan" name="kelompok_golongan" value="<?= $tarifspj['kelompok_golongan'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="uang_makan" name="uang_makan" value="<?= $tarifspj['uang_makan'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="makan_pagi" name="makan_pagi" value="<?= $tarifspj['makan_pagi'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="makan_siang" name="makan_siang" value="<?= $tarifspj['makan_siang'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="makan_malam" name="makan_malam" value="<?= $tarifspj['makan_malam'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="uang_saku" name="uang_saku" value="<?= $tarifspj['uang_saku'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="uang_cucian" name="uang_cucian" value="<?= $tarifspj['uang_cucian'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="taxi_bandara" name="taxi_bandara" value="<?= $tarifspj['taxi_bandara'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="air_port_tax" name="air_port_tax" value="<?= $tarifspj['air_port_tax'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="transport_lokal" name="transport_lokal" value="<?= $tarifspj['transport_lokal'] ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="penginapan" name="penginapan" value="<?= $tarifspj['penginapan'] ?>">
                            </div>


                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

</div>