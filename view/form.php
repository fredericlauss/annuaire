
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#leModal">
Créer un student
</button>

<!-- Modal -->
<div class="modal fade" id="leModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Créer un student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                
        <form action="controller\StudentCreatController.php" method="POST" class="">
            <div class="mb-3">
                <label for="input1" class="form-label" >Nom</label>
                <input type="text" class="form-control" name="input1" placeholder="Nom" required/>
            </div>
            <div class="mb-3">
            <label for="input2" class="form-label">Prénom</label>
            <input type="text" name="input2" class="form-control" placeholder="Prénom" required/>
            </div>
            <div class="mb-3">
            <label for="input3" class="form-label">E-mail</label>
            <input type="email" name="input3" class="form-control" placeholder="mail" required/>
            </div>
            <div class="mb-3">
            <label for="input4" class="form-label">Telephone</label>
            <input type="tel" pattern="[0-9]{10}" maxlenght="10" name="input4" class="form-control" placeholder="Tel" />
            </div>
            <p>
            <?php
            if(!empty($jpo)) { 
                foreach($jpo as $row ) {
            ?> <div class="mb-3">
                <input type="checkbox" class="form-check-input" name="input5[]" value="<?php echo $row->get_id(); ?>">
                <?php echo $row->get_name(); ?>
                </div>
            <?php
                }
            }
            ?>
            </p>

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" value="submit" />
      </div>
      </form>
    </div>
  </div>
</div>




