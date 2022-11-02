<div class="mt-3 mb-3">
<table class="table align-middle shadow rounded bg-light">
	<thead class="">
		<tr>
            <th>Name</th>
            <th>Date</th>
            <th>Action</th>
		</tr>
	</thead>
	<tbody class="">
            <?php
        if(!empty($jpo)) { 
		foreach($jpo as $row ) {
            ?>
            <tr>
                <td><?php echo $row->get_name(); ?></td>
                <td><?php echo $row->get_date(); ?></td>
                <td>
                </div>
                    <form class="mb-0" action="controller\jpoDeleteController.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row->get_id(); ?>">
                        <input type="submit" class="btn btn-outline-danger btn-sm" name="delete" value="delete">
                    </form>
                </td>
            </tr>
            <?php
            }
        }
            ?>
  </tbody>
</table>
</div>