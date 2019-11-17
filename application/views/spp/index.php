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
                        <th scope="col">Tujuan</th>
                        <th scope="col">Keperluan</th>
                        <th scope="col">Tanggal Berangkat</th>
                        <th scope="col">Tanggal Kembali</th>
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
                            <td><?= $p['tujuan'] ?></td>
                            <td><?= $p['keperluan'] ?></td>
                            <td><?= $p['tanggal_berangkat'] ?></td>
                            <td><?= $p['tanggal_kembali'] ?></td>
                            <td>
                                <a href="<?= base_url('SPP/laporan_spp/') . $p['id']; ?>" class=" badge badge-secondary" target="_blank">Download Surat SPP</a>
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