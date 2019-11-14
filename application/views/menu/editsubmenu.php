<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

	<div class="row">
		<div class="col-lg-6">
			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			<?php endif; ?>
			<div class="card">
				<div class="card-header">
					Edit sub menu
				</div>
				<div class="card-body">
					<blockquote class="blockquote mb-0">
						<form method="post" action="<?= base_url('menu/editsubmenu/' . $submenu['id']); ?>">
							<div class="form-group">
								<input type="text" class="form-control" id="title" name="title"
									   value="<?= $submenu['title']; ?>">
							</div>
							<div class="form-group">
								<select name="menu_id" id="menu_id" class="form-control">
									<option value="<?= $submenu['menu_id']; ?>"> <?= $submenu['menu']; ?> </option>
									<?php foreach ($menu as $m) : ?>

									<?php
										if ($m['menu'] == $submenu['menu']){
											continue;
										}
									?>
										<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
									<?php endforeach; ?>
								</select>

							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="url" name="url"
									   value="<?= $submenu['url']; ?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="icon" name="icon"
									   value="<?= $submenu['icon']; ?>">
							</div>
							<div class="form-group">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="1" id="is_active"
										   name="is_active" checked>
									<label class="form-check-label" for="is_active">
										Active?
									</label>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Edit</button>
						</form>
					</blockquote>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newmenumodal" tabindex="-1" role="dialog" aria-labelledby="newmenumodalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newmenumodalLabel">Add New Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('menu/addmenu'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>
