<div class="modal fade" wire:ignore.self id="updateUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <form action="" wire:submit.prevent="update({{$edit_id}})">
         <div class="modal-body">
      <div class="form-group">
        <label for="">Enter First Name</label>
        <input type="text" wire:model.lazy="edit_fname" class="form-control form-control-lg" >
         @error('edit_fname')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Last Name</label>
        <input type="text" wire:model.lazy="edit_lname" class="form-control form-control-lg" >
         @error('edit_lname')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Email</label>
        <input type="text" wire:model.lazy="edit_email" class="form-control form-control-lg" >
         @error('edit_email')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Phone</label>
        <input type="text" wire:model.lazy="edit_phone" class="form-control form-control-lg" >
         @error('edit_phone')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Password</label>
        <input type="password" wire:model.lazy="edit_password" class="form-control" >
         @error('edit_password')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
     </form>
    </div>
  </div>
</div>