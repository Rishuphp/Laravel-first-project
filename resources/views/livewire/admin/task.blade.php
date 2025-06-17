<div>
   <x-slot:title>
    Tasks
   </x-slot>

   @include('livewire.components.createTask')
 @auth
    @if(Auth::guard('admin')->check())
        {{-- Admin view --}}
        @include('livewire.components.updateTask')
    @else
        {{-- Regular user view --}}
        @include('livewire.components.userUpdateTask')
    @endif
@endauth


   @include('livewire.components.taskExportPDF')
  
   
   @auth
    @if(Auth::guard('admin')->check())
        @include('livewire.components.taskDetails') {{-- For admin --}}
    @else
        @include('livewire.components.userTaskDetails') {{-- For regular user --}}
    @endif
@endauth

  

   <div class="container">
    <div class="card my-4">
        <div class="card-header bg-danger ">
            <div class="d-flex justify-content-between">
                <h3>Tasks List</h3>
               
                @if(Auth::guard('admin')->user())
                <button data-bs-toggle="modal" data-bs-target="#addTask" class="btn btn-secondary">Task</button>

                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex my-2">
    <a href="">
                <button class="btn btn-secondary">PDF</button></a>
              <a href="">
               <button onclick="printSection('printableArea')" class="btn btn-secondary ms-3">Print</button></a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                      
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Asign User</th>
                            <th>Edit</th>
                            
                            
                            @if(Auth::guard('admin')->user())
                            <th>Delete</th>
                            @endif
                            <th>Details</th>
                           
                          
                        </tr>
                    </thead>
                    <tbody>
                      @if(count($tasks))
                      @foreach($tasks as $task)
                        <tr >
                            <td>{{$task->id}}</td>
                            <td>{{$task->title}}</td>
                            <td>{{$task->status }}</td>
                           
                            <td>{{$task->users->fname}} {{$task->users->lname}}</td>
                           
                            <td>
                           
                            <button wire:click="editTask({{$task->id}})" data-bs-toggle="modal" data-bs-target="#updateTask"  class="btn btn-success">    
                            <i class="fa-solid fa-pen-to-square"></i></td></button>
                           
                           
                             @if(Auth::guard('admin')->user())
                            <td>
                                
                            <button  wire:click="deleteTask({{$task->id}})" class="btn btn-danger">    
                            <i class="fa-solid fa-trash "></i></td></button>
                           
                           
                                   
                                       
                          
                           
                           @endif
                            

   <td>
                           
                                    <button wire:click="TaskDetails({{ $task->id }})" data-bs-toggle="modal" data-bs-target="#TaskDetails"class="btn btn-success">
                                <i class="fa-solid fa-eye"></i></td></button>




                           
                           
                        </tr>
                      @endforeach
                      @else
                      <h3>Record Not Found</h3>
                      @endif
                      
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            
        </div>
    </div>
   </div>
   <!-- Button trigger modal -->


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
