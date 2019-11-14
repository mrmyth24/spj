<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-12">

			<?= $this->session->flashdata('message') ?>

			<a href="<?= base_url('surat_masuk/addmail'); ?>" class="btn btn-primary mb-3" >Add New Mail</a><br/>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">File Surat</th>
						<th scope="col">Pengirim</th>
						<th scope="col">No Surat</th>
						<th scope="col">Tanggal Surat</th>
						<th scope="col">Ringkasan</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach ($surat_masuk as $sm) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $sm['file_surat_masuk'] ?></td>
						<td><?= $sm['pengirim'] ?></td>
						<td><?= $sm['no_surat_masuk'] ?></td>
						<td><?= $sm['tgl_surat_masuk'] ?></td>
						<td><?= $sm['ringkasan'] ?></td>
						<td>
							<a href="<?= base_url('surat_masuk/downloadmail/' . $sm['id_surat_masuk']); ?>" class="badge badge-secondary">download</a>
							<a href="<?= base_url('surat_masuk/editmail/' . $sm['id_surat_masuk']); ?>" class="badge badge-success">edit</a>
							<a href="<?= base_url('surat_masuk/deletemail/' . $sm['id_surat_masuk']); ?>" class="badge badge-danger" onclick="return confirm('Yakin Hapus?')">delete</a>
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
