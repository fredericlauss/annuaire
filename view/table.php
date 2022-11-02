<?php 
require_once('./controller/StudentReadController.php');
require_once('./manager/TableHelper.php');

?>
<div class="d-flex justify-content-between gap-3 mt-3 mb-3 align-items-center">
	<div class="flex-fill">
		<form class="d-flex justify-content-start gap-1 align-items-center" action="">
			<input type="text" class="form-control" name="q" placeholder="rechercher par prenom" value="<?= htmlentities($_GET['q'] ?? null) ?>">
			<button class="btn btn-outline-secondary">rechercher</button>
		</form>
	</div>
	<div class="d-flex justify-content-end gap-3 align-items-center flex-fill">
		<?php
		foreach($jpo as $rows ) {
		?>
		<form action="">
			<input type="text" name="f" value="<?php echo $rows->get_id(); ?>" hidden>
			<button class="btn 
			<?php
			if (isset($_GET['f'])) {
			if ($_GET['f'] == $rows->get_id()) {
					?>
					btn-outline-success
					<?php
			} else {
				?>
				btn-outline-secondary
				<?php
			}
			} else {
				?>
				btn-outline-secondary
				<?php
			}
			?> btn-sm"><?php echo $rows->get_name(); ?></button>
			
		</form>
		<?php
		}
		if (isset($_GET['f'])) {
			?>
			<a href="http://localhost/annuaire/" class="btn btn-outline-success btn-sm">+</a>
			<?php
		}
		?>
	</div>
</div>

<table class="table align-middle shadow rounded bg-light">
	<thead class="">
		<tr>
		<th><?php echo TableHelper::sort('nom', 'Nom', $_GET) ?></th>
		<th><?php echo TableHelper::sort('prenom', 'Prénom', $_GET) ?></th>
		<th><?php echo TableHelper::sort('mail', 'E-mail', $_GET) ?></th>
		<th>tel</th>
		<th>jpo</th>
		<th>action</th>
		</tr>
	</thead>
	<tbody class="">
	<?php
	if(!empty($students)) { 
		foreach($students as $row ) {
	?>
	<tr>
		<td><?php echo $row->get_name(); ?></td>
		<td><?php echo $row->get_prenom(); ?></td>
		<td><?php echo $row->get_mail(); ?></td>
		<td><?php echo $row->get_tel(); ?></td>
		<td>
		<?php
		$increment = 0;
		foreach ($row->jpo as $key => $value) {
			foreach ($value as $name) {
				$increment++;
			?>
				<p class="badge text-success mb-0 bg-success bg-opacity-10 rounded-pill px-2 py-1"><?php echo $name; ?></p>
		<?php
		}
		}
		?>
		</td>
		<td>
			<div class="d-flex justify-content-start align-items-center gap-3">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="<?php echo "#exampleModal$increment" ?>">
			Update
			</button>

			<!-- Modal -->
			<div class="modal fade" id="<?php echo "exampleModal$increment" ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
					
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form action="controller\StudentUpdateController.php" method="POST">
							<div class="mb-3">
							<label for="input1">Nom</label>
							<input type="hidden" name="id" value="<?php echo $row->get_id(); ?>">
							<input type="text" name="input1" placeholder="<?php echo $row->get_name(); ?>" value="<?php echo $row->get_name(); ?>" required/>
							</div>

							<div class="mb-3">
							<label for="input1">Prénom</label>
							<input type="text" name="input2" placeholder="<?php echo $row->get_prenom(); ?>" value="<?php echo $row->get_prenom(); ?>" required/>
							</div>

							<div class="mb-3">
							<label for="input1">E-mail</label>
							<input type="email" name="input3" placeholder="<?php echo $row->get_mail(); ?>" value="<?php echo $row->get_mail(); ?>" required/>
							</div>

							<div class="mb-3">
							<label for="input1">Telephone</label>
							<input type="tel" name="input4" placeholder="<?php echo $row->get_tel(); ?>" value="<?php echo $row->get_tel(); ?>"/>
							</div>

							<p>
							<?php
							$test = 0;
							if(!empty($jpo)) { 
								foreach($jpo as $rows ) {
									foreach ($row->jpo as $key => $value) {
										foreach ($value as $name) {
											if ($name === $rows->get_name()) {
											$test = 1;
											}
										}
									}
									?>
									<div class="mb-3">
									<input type="checkbox" class="form-check-input" name="input5[]" value="<?php echo $rows->get_id(); ?>"<?php if ($test === 1) { ?>checked<?php } $test = 0; ?>>
									<?php echo $rows->get_name(); ?>
									</div>
									<?php
								}
							}
							?>
							</p>
							
						
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<input type="submit" name="update" class="btn btn-success" value="update">
				</div>
				</form>
				</div>
			</div>
			</div>
			<form class="mb-0" action="controller\StudentDeleteController.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $row->get_id(); ?>">
				<input type="submit" class="btn btn-outline-danger btn-sm" name="delete" value="delete">
			</form>
			<div>
		<td>
	</tr>
    <?php
		}
	} else {
		?>
		<td>il n'y a pas de student !</td>
		<?php
	}
	?>
  </tbody>
</table>
<?php if ($pages  > 1 && $page > 1): ?>
	<a href="?<?= UrlHelper::withParam($_GET, "p", $page - 1) ?>">page précédente</a>
<?php endif?>
<?php if ($pages  > 1 && $page < $pages): ?>
	<a href="?<?= UrlHelper::withParam($_GET, "p", $page + 1) ?>">page suivante</a>
<?php endif?>