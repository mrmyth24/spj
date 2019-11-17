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
                        <th scope="col">Nomor</th>
                        <th scope="col">Tanggal Dibuat</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Keperluan</th>
                        <th scope="col">Action</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($spj as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['nomor'] ?></td>
                            <td><?= $s['tanggal'] ?></td>
                            <td><?= $s['tujuan'] ?></td>
                            <td><?= $s['keperluan'] ?></td>


                            <td>
                                <?php if ($s['status'] == '6') : ?>
                                    <a href="<?= base_url('SPJ/viewbuktisurat/' . $s['id']); ?>" class="badge badge-secondary">Lihat Bukti Perjalanan </a>
                                <?php else : ?>
                                    Berkas Belum Diupload
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('SPJ/addmail/') . $s['id']; ?>" class="btn btn-info btn-circle">SPJ</a>

                                <?php if ($s['status'] == '6') : ?>
                                    <a href="<?= base_url('SPJ/pdlspjbukti/' . $s['id']); ?>" class="btn btn-success btn-circle">
                                        <i class="fas fa-check"></i>
                                    <?php endif; ?>

                                    <?php if ($s['status'] == '3') : ?>
                                        <a href="<?= base_url('SPJ/pdlspj/' . $s['id']); ?>" class="btn btn-success btn-circle">
                                            <i class="fas fa-check"></i>
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