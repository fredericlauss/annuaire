
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Modal">
Créer un jpo
</button>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Créer un jpo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="controller\JpoCreatController.php" method="POST" class="">
      <div class="mb-3">
    <label class="form-label" for="input1">Nom</label>
    <input type="text" class="form-control" name="input1" placeholder="Nom" required/>
    </div>
    <div class="mb-3">
    <label class="form-label" for="input2">Date</label>
    <input type="date" class="form-control" name="input2" placeholder="Date" required/>
    </div>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" value="submit" />
      </div>
      </form>
    </div>
  </div>
</div>