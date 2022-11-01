<?php 
require_once('./controller/StudentReadController.php');
require_once('./manager/TableHelper.php');

?>

<form action="">
	<input type="text" name="q" placeholder="rechercher par prenom" value="<?= htmlentities($_GET['q'] ?? null) ?>">
	<button>rechercher</button>
</form>
<?php
foreach($jpo as $rows ) {
?>
<form action="">
	<input type="text" name="f" value="<?php echo $rows->get_id(); ?>" hidden>
	<button><?php echo $rows->get_name(); ?></button>
</form>
<?php
}
?>
<table class="table table-striped table-hover table-sm align-middle">
	<thead>
		<tr>
		<th><?php echo TableHelper::sort('nom', 'Nom', $_GET) ?></th>
		<th><?php echo TableHelper::sort('prenom', 'Prénom', $_GET) ?></th>
		<th><?php echo TableHelper::sort('mail', 'E-mail', $_GET) ?></th>
		<th>tel</th>
		<th>jpo</th>
		<th>action</th>
		</tr>
	</thead>
	<tbody class="table-group-divider">
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
		foreach ($row->jpo as $key => $value) {
			foreach ($value as $name) {
			?>
				<p><?php echo $name; ?></p>
		<?php
		}
		}
		?>
		</td>
		<td>
			<form action="controller\StudentDeleteController.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $row->get_id(); ?>">
				<input type="submit" name="delete" value="delete">
			</form>
		</td>
	  	<td>
			<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
		
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form action="controller\StudentUpdateController.php" method="POST">
				<label for="input1">Nom</label>
				<input type="hidden" name="id" value="<?php echo $row->get_id(); ?>">
				<input type="text" name="input1" placeholder="<?php echo $row->get_name(); ?>" value="<?php echo $row->get_name(); ?>"/>
    			<input type="text" name="input2" placeholder="<?php echo $row->get_prenom(); ?>" value="<?php echo $row->get_prenom(); ?>"/>
				<input type="text" name="input3" placeholder="<?php echo $row->get_mail(); ?>" value="<?php echo $row->get_mail(); ?>"/>
				<input type="text" name="input4" placeholder="<?php echo $row->get_tel(); ?>" value="<?php echo $row->get_tel(); ?>"/>
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
						<input type="checkbox" name="input5[]" value="<?php echo $rows->get_id(); ?>"<?php if ($test === 1) { ?>checked<?php } $test = 0; ?>><?php echo $rows->get_name(); ?>
						<?php
					}
				}
				?>
				</p>
				
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="update" class="btn btn-primary" value="update">
      </div>
	  </form>
    </div>
  </div>
</div>
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