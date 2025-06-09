<div class="modal fade" wire:ignore.self id="updateCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     <form action="" wire:submit.prevent="update({{$edit_id}})">
         <div class="modal-body">
      <div class="form-group">
        <label for="">Enter Category Name</label>
        <input type="text" wire:model.lazy="edit_category_name" class="form-control form-control-lg" > 
        @error('edit_category_name')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Description</label>
        <textarea wire:model.lazy="edit_description" cols="30" rows="10" class="form-control"></textarea>
        @error('edit_description')
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
  @if(session()->has('success'))
   <script>

            Command: toastr["success"]("{!! session('success') !!}")

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-full-width",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>
@endif