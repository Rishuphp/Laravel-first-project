
<div>
    <x-slot:title>
Login
    </x-slot>
    <div class="container py-5 ">
        <div class=" justify-content-center py-3 ">
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-12">
                    <img src="logo.png" width="120px">
              
             
                <div class="card">
                    <div class="card-header bg-danger">
                        <h2>User Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="" wire:submit.prevent="login">
                            <div class="form-group">
                            <label for="">Enter Email</label>
                            <input type="email" wire:model.lazy="email" class="form-control">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Enter Password</label>
                            <input type="password" wire:model.lazy="password" class="form-control">
                              @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group py-2">
                            <button type="submit" class="btn btn-danger">Login</button>
                        </div>
                    </form>
                    <a href="">
                    <button type="submit" class="btn btn-danger">Resister</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
