<div class="modal fade" wire:ignore.self id="addTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Tasks</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form action="" wire:submit.prevent="store">
         <div class="modal-body">
      <div class="form-group">
        <label for="">Enter Title</label>
        <input type="text" wire:model.lazy="title" class="form-control form-control-lg" >
         @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
       <div class="form-group">
        <label for="">Enter Category</label>
        <select wire:model.lazy="cat_id" class="form-control">
            <option value="">Select Category</option>
              @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->category_name}} 

            </option>

           @endforeach
        </select>
         @error('cat_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="">Enter Description</label>
        <textarea wire:model.lazy="description" cols="30" rows="10" class="form-control"></textarea>
         @error('description')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Status</label>
        <select wire:model.lazy="status" class="form-control">
            <option value="Not Started">Not Started</option>
            <option value="Started">Started</option>
            <option value="Complete">Complete</option>
            <option value="Pending">Pending</option>
        </select>
         @error('status')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
       <div class="form-group">
        <label for="">Enter Start Date</label>
        <input type="date" wire:model.lazy="start_date" class="form-control form-control-lg" >
         @error('start_date')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
       <div class="form-group">
        <label for="">Enter End Date</label>
        <input type="date" wire:model.lazy="end_date" class="form-control form-control-lg" >
         @error('end_date')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Users</label>
        <select wire:model.lazy="user_id" class="form-control">
            <option value="">Select User</option>

            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>

           @endforeach
        </select>
         @error('user_id')
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