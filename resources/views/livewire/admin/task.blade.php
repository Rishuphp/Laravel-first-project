<div>
   <x-slot:title>
    Tasks
   </x-slot>

   @include('livewire.components.createTask')
   @auth
   @include('livewire.components.userUpdateTask')
   @endauth
   @guest
   @include('livewire.components.updateTask')
   @endguest
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
                <button class="btn btn-secondary ms-3">Print</button>
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
                        </tr>
                    </thead>
                    <tbody>
                      @if(count($tasks))
                      @foreach($tasks as $task)
                        <tr >
                            <td>{{$task->id}}</td>
                            <td>{{$task->title}}</td>
                            <td>{{$task->status == 0 ? 'Not Started' : ''}}
                              {{$task->status == 1 ? 'Started' : ''}}
                              {{$task->status == 2 ? 'Complete' : ''}}
                              {{$task->status == 3 ? 'Pending' : ''}}
                            </td>
                           
                            <td>{{$task->users->fname}} {{$task->users->lname}}</td>
                           
                            <td>
                            <button wire:click="editTask({{$task->id}})" data-bs-toggle="modal" data-bs-target="#updateTask"  class="btn btn-success">    
                            <i class="fa-solid fa-pen-to-square"></i></td></button>
                             @if(Auth::guard('admin')->user())
                            <td>
                            <button  wire:click="deleteTask({{$task->id}})" class="btn btn-danger">    
                            <i class="fa-solid fa-trash "></i></td></button>
                           @endif
                        </tr>
                      @endforeach
                      @else
                      <h3>Record Not Found</h3>
                      @endif
                      
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-body">
             {{$tasks->links('custom-pagination-links-view')}}
        </div>
    </div>
   </div>
   <!-- Button trigger modal -->


<!-- Modal -->


</div>
