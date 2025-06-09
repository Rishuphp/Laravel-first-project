<div>
   <x-slot:title>
    User
   </x-slot>
   @include('livewire.components.createUser')
   @include('livewire.components.updateUser')
   <div class="container">
    <div class="card my-4">
        <div class="card-header bg-danger ">
            <div class="d-flex justify-content-between">
                <h3>User List</h3>
                <button data-bs-toggle="modal" data-bs-target="#addUser" class="btn btn-secondary">User</button>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex my-2">
                <a href="{{route('admin.userexportPDF')}}">
                <button class="btn btn-secondary">PDF</button></a>
                <button class="btn btn-secondary ms-3">Print</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAme</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if(count($users))
                      @foreach($users as $user)
                      <tr >
                            <td>{{$user->id}}</td>
                            <td>{{$user->fname}} {{$user->lname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                            <button wire:click="editUser({{$user->id}})" data-bs-toggle="modal" data-bs-target="#updateUser"  class="btn btn-success">    
                            <i class="fa-solid fa-pen-to-square"></i></td></button>
                            <td>
                            <button wire:click="deleteUser({{$user->id}})" class="btn btn-danger">    
                            <i class="fa-solid fa-trash "></i></td></button>
                        </tr>

                      @endforeach

                      @else
                      <h2>Record Not Found</h2>
                      @endif
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{$users->links('custom-pagination-links-view')}}
        </div>
    </div>
   </div>
   <!-- Button trigger modal -->


<!-- Modal -->


</div>
