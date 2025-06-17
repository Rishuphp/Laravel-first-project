 <nav class="sb-topnav navbar navbar-expand navbar-dark bg-danger">
     <!-- Navbar Brand-->
     <a class="navbar-brand ps-3" href="">Task Management System</a>
     <!-- Sidebar Toggle-->
     <button class="btn btn-link btn-sm order-1  " id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
     <!-- Navbar Search-->

     <!-- Navbar-->
     <ul class="navbar-nav ms-auto ">
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                  @if(Auth::guard('admin')->user())
                        {{(Auth::guard('admin')->user()->username)}}
                       
                        @else
                        {{Auth::user()->fname}}
                        {{Auth::user()->lname}}
                         @endif
                        
          </a>
             <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                 @if(Auth::guard('admin')->user())
                 <li><a class="dropdown-item" href="{{route('admin.changePassword')}}">Change Password</a></li>
                 <li><a class="dropdown-item" href="{{route('admin.updateProfile')}}">Update Profile</a></li>
             
                 @endif

                 <li>
                     <hr class="dropdown-divider" />
                 </li>
                 @if(!Auth::guard('admin')->user())
                 @livewire('user.auth.logout')
                 @else
                 @livewire('admin.auth.logout')
                  
                 @endif
                

                
             </ul>
         </li>
     </ul>
 </nav>