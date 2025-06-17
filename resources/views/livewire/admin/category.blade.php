<div>

   <x-slot:title>
    Categories
   </x-slot>

   @include ('livewire.components.create')
   @include ('livewire.components.updateCategory')
   @include ('livewire.components.exportPDF')

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
  <button class="btn btn-secondary">PDF</button>
</a>

              
               <button onclick="printSection('printableArea')" class="btn btn-secondary ms-3">Print</button>
             
                @endif
                   <a href="{{ url()->previous() }}" class="btn btn-secondary ms-3 ">
     Back
</a>
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
<script>
    function printSection(divId) {
        var content = document.getElementById(divId).innerHTML;
        var win = window.open('', '', 'height=700,width=900');
        win.document.write('<html><head><title>Print</title>');
        win.document.write('<style>table, th, td { border:1px solid black; border-collapse: collapse; padding:6px; }</style>');
        win.document.write('</head><body >');
        win.document.write(content);
        win.document.write('</body></html>');
        win.document.close();
        win.print();
    }
</script>

</div>
