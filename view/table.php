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
		<th>prenom</th>
		<th>nom</th>
		<th>mail</th>
		<th>tel</th>
		<th>id</th>
		</tr>
	</thead>
	<tbody>
	<?php
	if(!empty($students)) { 
		foreach($students as $row ) {
	?>
	  <tr>
		<td><?php echo $row->get_prenom(); ?></td>
		<td><?php echo $row->get_name(); ?></td>
		<td><?php echo $row->get_mail(); ?></td>
		<td><?php echo $row->get_tel(); ?></td>
		<td><?php echo $row->get_id(); ?></td>
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