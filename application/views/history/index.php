<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-12">

            <?= $this->session->flashdata('message') ?>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">No Spj</th>
                        <th scope="col">ٍStatus</th>
                        <th scope="col">Action</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($spj as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['tujuan'] ?></td>
                            <td><?= $s['nomor_spj'] ?></td>

                            <td>
                                <?php if ($s['status'] == 0) {
                                        echo 'Surat Berada Di Atmi';
                                    } elseif ($s['status'] == 1) {
                                        echo 'Surat Masih Di Kabag/Penanggung Jawab';
                                    } elseif ($s['status'] == 2) {
                                        echo 'Surat Masih Di Direktur Utama';
                                    } elseif ($s['status'] == 3) {
                                        echo 'Surat Masih Di Sekretaris Perusahaan';
                                    } elseif ($s['status'] == 4) {
                                        echo 'Surat Masih Di Direksi';
                                    } elseif ($s['status'] == 5) {
                                        echo 'Bukti Perjalanan Belum Di upload';
                                    } elseif ($s['status'] == 6) {
                                        echo 'Surat Belum Di ACC Sekper';
                                    } elseif ($s['status'] == 7) {
                                        echo 'Surat Sudah Di Berikan SPP';
                                    } elseif ($s['status'] == 8) {
                                        echo 'Surat Ditolak Kabag/penanggung Jawab!';
                                    } elseif ($s['status'] == 9) {
                                        echo 'Surat Ditolak Direktur Utama!';
                                    } elseif ($s['status'] == 10) {
                                        echo 'Surat Ditolak Direksi!';
                                    }
                                    ?>
                            </td>

                            <td>
                                <a href="<?= base_url('History/lihatpdl/' . $s['id_pdl']); ?>" class="btn btn-info btn-circle">Detail</a>
                            </td>

                            <td>
                                <?php if ($s['status'] == '5') : ?>

                                    <?php echo form_open_multipart() ?>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_surat_masuk" name="file_surat_masuk">
                                            <label class="custom-file-label" for="file_surat_masuk">Pilih Surat Masuk</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <?php echo form_close() ?>

                                <?php elseif ($s['status'] == '6') : ?>

                                <?php else : ?>
                                    Penginputan Berkas surat hanya bisa <br> dilakukan setelah di Acc oleh Kabag Sekper
                                <?php endif; ?>
                            </td>



                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->