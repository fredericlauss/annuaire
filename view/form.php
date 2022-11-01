<h3>Créer un student</h3>
<form action="controller\StudentCreatController.php" method="POST" class="">
    <div class="mb-3">
        <label for="input1" class="form-label" >Nom</label>
        <input type="text" class="form-control" name="input1" placeholder="Nom" />
    </div>
    <label for="input2">Prénom</label>
    <input type="text" name="input2" placeholder="Prénom" />
    <label for="input3">E-mail</label>
    <input type="text" name="input3" placeholder="mail" />
    <label for="input4">Telephone</label>
    <input type="text" name="input4" placeholder="Tel" />
    <p>
    <?php
    if(!empty($jpo)) { 
        foreach($jpo as $row ) {
    ?>
        <input type="checkbox" name="input5[]" value="<?php echo $row->get_id(); ?>"><?php echo $row->get_name(); ?>
    <?php
        }
    }
    ?>
    </p>
    <input type="submit" class="" value="submit" />
</form>



