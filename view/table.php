<?php 

require_once('./controller/StudentReadController.php');

?>
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
	$students = new BaseManager();
	$students->getAll();
    $students = $students->resultat;
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