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
                        <th scope="col">Tanggal</th>
                        <th scope="col">nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Golongan</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Keperluan</th>
                        <th scope="col">Tanggal Berangkat</th>
                        <th scope="col">Tanggal Kembali</th>
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
                            <td><?= $s['nama'] ?></td>
                            <td><?= $s['jabatan'] ?></td>
                            <td><?= $s['golongan'] ?></td>
                            <td><?= $s['tujuan'] ?></td>
                            <td><?= $s['keperluan'] ?></td>
                            <td><?= $s['tanggal_berangkat'] ?></td>
                            <td><?= $s['tanggal_kembali'] ?></td>
                            <td>
                                <a href="<?= base_url('SPJ/addmail/') . $s['id']; ?>" class="btn btn-info btn-circle">SPJ</a>
                            </td>
                            <td>
                                <a href="<?= base_url('SPJ/pdlspj/' . $s['id']); ?>" class="btn btn-success btn-circle">
                                    <i class="fas fa-check"></i>
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