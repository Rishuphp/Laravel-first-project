<div>
   <x-slot:title>
    Admin Register
   </x-slot>
   @include('livewire.components.createAdmin')

  
  
   <div class="container">
    <div class="card my-4">
        <div class="card-header bg-danger ">
            <div class="d-flex justify-content-between">
                <h3>Admin List</h3>
                <button data-bs-toggle="modal" data-bs-target="#addAdmin" class="btn btn-secondary">Add Admin</button>
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if(count($admins))
                      @foreach($admins as $admin)
                      <tr >
                            <td>{{$admin->id}}</td>
                            <td>{{$admin->username}} </td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->phone}}</td>
                            <td>
                            <button wire:click="update({{$admin->id}})" data-bs-toggle="modal" data-bs-target="#updateProfile"  class="btn btn-success">    
                            <i class="fa-solid fa-pen-to-square"></i></td></button>
                            <td>
                            <button wire:click="deleteUser({{$admin->id}})" class="btn btn-danger">    
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
            {{$admins->links('custom-pagination-links-view')}}
        </div>
    </div>
   </div>
   <!-- Button trigger modal -->


<!-- Modal -->


</div>
