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
                        <th scope="col">Tanggal</th>
                        <th scope="col">nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Keperluan</th>
                        <th scope="col">Tanggal Berangkat</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Ditujukan Kepada</th>
                        <th scope="col">Action</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pdl as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p['nomor'] ?></td>
                            <td><?= $p['tanggal'] ?></td>
                            <td><?= $p['nama'] ?></td>
                            <td><?= $p['jabatan'] ?></td>
                            <td><?= $p['tujuan'] ?></td>
                            <td><?= $p['keperluan'] ?></td>
                            <td><?= $p['tanggal_berangkat'] ?></td>
                            <td><?= $p['tanggal_kembali'] ?></td>
                            <td><?= $p['ditujukan_kepada'] ?></td>

                            <td> <a href="<?= base_url('User/lihatpdl/' . $id[0]['id']); ?>" class=" btn btn-success btn-circle">Lihat</a>
                            </td>

                            <td>
                                <a href="<?= base_url('User/pdlkabag/' . $id[0]['id']); ?>" class=" btn btn-success btn-circle">
                                    <i class="fas fa-fw fa-check"></i></a>
                                <a href="<?= base_url('User/pdltolakpjs/' . $id[0]['id']); ?>" class=" btn btn-danger btn-circle">
                                    <i class="fas fa-fw fa-times-circle"></i></a>
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