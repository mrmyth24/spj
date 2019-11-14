<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg">

			<?= $this->session->flashdata('message') ?>

			<a href="<?= base_url('menu/addsubmenu'); ?>" class="btn btn-primary mb-3" >Add New SubMenu</a>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">title</th>
						<th scope="col">menu</th>
						<th scope="col">url</th>
						<th scope="col">icon</th>
						<th scope="col">active</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					<?php foreach ($submenu as $sm) : ?>
					<tr>
						<th scope="row"><?= $i; ?></th>
						<td><?= $sm['title'] ?></td>
						<td><?= $sm['menu'] ?></td>
						<td><?= $sm['url'] ?></td>
						<td><?= $sm['icon'] ?></td>
						<td><?= $sm['is_active'] ?></td>
						<td>
							<a href="<?= base_url('menu/editsubmenu/' . $sm['id'] ); ?>" class="badge badge-success">edit</a>
							<a href="<?= base_url('menu/deletesubmenu/' . $sm['id']); ?>" class="badge badge-danger" onclick="return confirm('Yakin Hapus?')">delete</a>
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
