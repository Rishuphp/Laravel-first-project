<div>

   <x-slot:title>
    Categories
   </x-slot>

   @include ('livewire.components.create')
   @include ('livewire.components.updateCategory')

   <div class="container">
    <div class="card my-4">
        <div class="card-header bg-danger ">
            <div class="d-flex justify-content-between">
                <h3>Category List</h3>
                <button data-bs-toggle="modal" data-bs-target="#addCategory" class="btn btn-secondary">Add Category</button>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex my-2">
                @if(Auth::guard('admin')->user())
                <a href="">
                <button class="btn btn-secondary" >PDF</button>
                </a>
                <button class="btn btn-secondary ms-3">Print</button>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if(count($categories))
                      @foreach($categories as $category)
                      <tr >
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>
                            <button wire:click='editCategory({{$category->id}})' data-bs-toggle="modal" data-bs-target="#updateCategory"  class="btn btn-success">    
                            <i class="fa-solid fa-pen-to-square"></i></td></button>
                            <td>
                            <button wire:click='deleteCategory({{$category->id}})' class="btn btn-danger">    
                            <i class="fa-solid fa-trash "></i></td></button>
                        </tr>
                      @endforeach
                       

                        @else
                        <h4>Record Not Found</h4>
                      @endif 
                       
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{$categories->links('custom-pagination-links-view')}}
          
        </div>
    </div>
   </div>
   <!-- Button trigger modal -->

   @if(Session::has('success'))
   <script>
toastr.success("{{Session::get ('success') }}")

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
<!-- Modal -->


</div>
