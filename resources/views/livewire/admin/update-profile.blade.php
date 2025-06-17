<div>
   <x-slot:title>
    Update Profile
   </x-slot>

   <div class="container">
    <div class="card my-4">
        <div class="card-header">
            <h3>Edit Profile</h3>
            <a href="{{ url()->previous() }}" class="btn btn-primary lg-6 ms-2 ">
        Back
   </a>
        </div>
       <div class="card-body">
          <form action="" wire:submit.prevent="update">
         <div class="modal-body">
      <div class="form-group">
        <label for="">Enter Company Name</label>
        <input type="text" wire:model.lazy="c_name" class="form-control form-control-lg" >
         @error('c_name')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Full Name</label>
        <input type="text" wire:model.lazy="fullname" class="form-control form-control-lg" >
         @error('fullname')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Enter Email</label>
        <input type="text" wire:model.lazy="email" class="form-control form-control-lg" >
         @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="">Enter Phone</label>
        <input type="text" wire:model.lazy="phone" class="form-control form-control-lg" >
         @error('phone')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
       <div class="form-group">
        <label for="">Enter Address</label>
        <input type="text" wire:model.lazy="address" class="form-control form-control-lg" >
         @error('address')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
       <div class="form-group">
        <label for="">Enter Username</label>
        <input type="text" wire:model.lazy="username" class="form-control form-control-lg" >
         @error('username')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
     
      </div>
      <div class="modal-footer">
       
        <button type="submit" class="btn btn-primary lg-6 ms-2 ">Update Profile</button>
      </div>
     </form>
       </div>
    </div>
   </div>
   <!-- Button trigger modal -->

 @if(session()->has('success'))
   <script>
command:toastr['success']("{!! session('success') !!}}")

toastr.options = {
  "closeButton": false,
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
