<div class="modal fade" wire:ignore.self id="updateTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Tasks</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form action="" wire:submit.prevent="update({{$edit_id}})" >
         <div class="modal-body">
           <div class="form-group">
        <label for="">Enter Title</label>
        <input type="text" disabled wire:model.lazy="edit_title" class="form-control" >
         @error('edit_title')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Category Name</label>
        <select disabled wire:model.lazy="edit_cat_id" class="form-control " >
        <option value="">Select Category</option>
              @foreach($categories as $category)
            <option value="{{$category->id}}">
              {{$category->category_name}} 
            </option>
            @endforeach
          </select>
          @error('edit_cat_id')
     <span class="text-danger">{{$message}}</span>
     @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Description</label>
        <textarea disabled wire:model.lazy="edit_description" cols="30" rows="5" class="form-control"></textarea>
         @error('edit_description')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
       <div class="form-group">
        <label for="">Enter Status</label>
        <select  wire:model.lazy="edit_status" class="form-control">
            <option value="0">Not Started</option>
            <option value="1">Started</option>
            <option value="2">Complete</option>
            <option value="3">Pending</option>
        </select>
         @error('edit_status')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
       <div class="form-group">
        <label for="">Enter Start Date</label>
        <input type="date" disabled wire:model.lazy="edit_start_date" class="form-control form-control-lg" >
         @error('edit_start_date')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
       <div class="form-group">
        <label for="">Enter End Date</label>
        <input type="date" disabled wire:model.lazy="edit_end_date" class="form-control form-control-lg" >
         @error('edit_end_date')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Users</label>
        <select disabled wire:model.lazy="edit_user_id" class="form-control">
          <option value="">Select User</option>
          @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
          @endforeach
        </select>
        @error('edit_user_id')
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