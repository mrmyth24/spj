<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= $this->session->flashdata('message') ?>

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Perjalanan</th>
                        <th scope="col">Kelompok Golongan</th>
                        <th scope="col">Uang Makan</th>
                        <th scope="col">Makan Pagi</th>
                        <th scope="col">Makan Siang</th>
                        <th scope="col">Makan Malam</th>
                        <th scope="col">Uang Saku</th>
                        <th scope="col">Uang Cucian</th>
                        <th scope="col">Taxi Bandara</th>
                        <th scope="col">Airport Tax</th>
                        <th scope="col">Transport Lokal</th>
                        <th scope="col">Penginapan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tarifspj as $ts) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $ts['jenis_perjalanan'] ?></td>
                            <td><?= $ts['kelompok_golongan'] ?></td>
                            <td><?= $ts['uang_makan'] ?></td>
                            <td><?= $ts['makan_pagi'] ?></td>
                            <td><?= $ts['makan_siang'] ?></td>
                            <td><?= $ts['makan_malam'] ?></td>
                            <td><?= $ts['uang_saku'] ?></td>
                            <td><?= $ts['uang_cucian'] ?></td>
                            <td><?= $ts['taxi_bandara'] ?></td>
                            <td><?= $ts['air_port_tax'] ?></td>
                            <td><?= $ts['transport_lokal'] ?></td>
                            <td><?= $ts['penginapan'] ?></td>

                            <td>
                                <a href="<?= base_url('admin/edittarif/' . $ts['id']); ?>" class="badge badge-success">edit</a>
                                <a href="" class="badge badge-danger">delete</a>
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