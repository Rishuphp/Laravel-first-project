<div class="modal fade" wire:ignore.self  id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form action="" wire:submit.prevent="store"   >
         <div class="modal-body">
      <div class="form-group">
        <label for="">Enter Category Name</label>
        <input type="text" wire:model="category_name" class="form-control form-control-lg" >
      </div>
      <div class="form-group">
        <label for="">Enter Description</label>
        <textarea wire:model="description" cols="30" rows="10" class="form-control"></textarea>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
     </form>
    </div>
  </div>
</div>