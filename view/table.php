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
		</tr>
	</thead>
	<tbody>
	<?php
	if(!empty($students)) { 
		foreach($students as $row) {
	?>
	  <tr>
		<td><?php echo $row["prenom"]; ?></td>
		<td><?php echo $row["nom"]; ?></td>
		<td><?php echo $row["mail"]; ?></td>
		<td><?php echo $row["tel"]; ?></td>
	  </tr>
    <?php
		}
	}
	?>
  </tbody>
</table>

<?php if ($page  > 1 ): ?>
	<a href="?p=2">page suivante</a>
<?php endif?>