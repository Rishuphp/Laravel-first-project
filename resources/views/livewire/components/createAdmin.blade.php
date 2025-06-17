<div class="modal fade" wire:ignore.self id="addAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form action="" wire:submit.prevent="store">
         <div class="modal-body">
      <div class="form-group">
        <label for="">Enter Company Name</label>
        <input type="text" wire:model.lazy="c_name"  class="form-control" >
        @error('c_name')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Full Name</label>
        <input type="text" wire:model.lazy="fullname" class="form-control" >
         @error('fullname')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Email</label>
        <input type="email" wire:model.lazy="email" class="form-control" >
         @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Phone</label>
        <input type="number" wire:model.lazy="phone" class="form-control" >
         @error('phone')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Address</label>
        <input type="text" wire:model.lazy="address" class="form-control" >
         @error('address')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Username</label>
        <input type="text" wire:model.lazy="username" class="form-control" >
         @error('username')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Password</label>
        <input type="password" wire:model.lazy="password" class="form-control" >
         @error('password')
        <span class="text-danger">{{$message}}</span>
        @enderror
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