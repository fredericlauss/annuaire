<?php 
require_once('./controller/StudentReadController.php');

?>

<form action="">
	<input type="text" name="q" placeholder="rechercher par prenom" value="<?= htmlentities($_GET['q'] ?? null) ?>">
	<button>rechercher</button>
</form>
	
<table>
	<thead>
		<tr>
		<th>nom</th>
		<th>prénom</th>
		<th>mail</th>
		<th>tel</th>
		<th>id</th>
		<th>action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	if(!empty($students)) { 
		foreach($students as $row ) {
	?>
	<tr>
		<td><?php echo $row->get_name(); ?></td>
		<td><?php echo $row->get_prenom(); ?></td>
		<td><?php echo $row->get_mail(); ?></td>
		<td><?php echo $row->get_tel(); ?></td>
		<td><?php echo $row->get_id(); ?></td>
		<td>
			<form action="controller\StudentDeleteController.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $row->get_id(); ?>">
				<input type="submit" name="delete" value="delete">
			</form>
		</td>
	  	<td>
			<form action="controller\StudentUpdateController.php" method="POST">
				<label for="input1">Nom</label>
				<input type="hidden" name="id" value="<?php echo $row->get_id(); ?>">
				<input type="text" name="input1" placeholder="<?php echo $row->get_name(); ?>" value="<?php echo $row->get_name(); ?>"/>
    			<input type="text" name="input2" placeholder="<?php echo $row->get_prenom(); ?>" value="<?php echo $row->get_prenom(); ?>"/>
				<input type="text" name="input3" placeholder="<?php echo $row->get_mail(); ?>" value="<?php echo $row->get_mail(); ?>"/>
				<input type="text" name="input4" placeholder="<?php echo $row->get_tel(); ?>" value="<?php echo $row->get_tel(); ?>"/>
				<input type="submit" name="update" value="update">
			</form>
		<td>
	</tr>
    <?php
		}
	}
	?>
  </tbody>
</table>

<?php if ($pages  > 1 ): ?>
	<a href="?p=<?= $page + 1 ?>">page suivante</a>
<?php endif?>