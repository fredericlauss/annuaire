<?php 

require_once('./controller/Studentcontroller.php');
$studentController->read(); 

?>
<thead>
	<tr>
	  <th width="25%">prenom</th>
	  <th width="25%">nom</th>
	  <th width="25%">mail</th>
	  <th width="25%">tel</th>
	</tr>
  </thead>
  <tbody>

	<?php
    echo $resultat;
	if(!empty($resultat)) { 
		foreach($resultat as $row) {
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