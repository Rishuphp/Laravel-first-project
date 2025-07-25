<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@if(!Auth::guard('admin')->user())
            User
            @else
            Admin
            @endif
          
        </title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" >
                <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
                   
        @livewireStyles
    </head>
    <body class="sb-nav-fixed">
          @livewire('components.navbar')
       
        <div id="layoutSidenav">
          @livewire('components.sidebar')
            <div id="layoutSidenav_content">
                <main>
                   {{ $slot }}
                </main>
                <footer class="py-4 bg-danger mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <a href="https://www.bytosoft.com" style="text-decoration: none;">
                                <div class="text-muted " >Developed By BYTOSOFT</div>
                            </a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
         
         <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
                 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"crossorigin="anonymous"></script>

                   @livewireScripts
               <script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.livewire) {
            const hideModal = (modalId) => {
                const modal = document.getElementById(modalId);
                if (modal) {
                    // Bootstrap 5 modal hide
                    const modalInstance = bootstrap.Modal.getInstance(modal);
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                }
            };

            window.livewire.on('addCategory', () => hideModal('addCategory'));
            window.livewire.on('updateCategory', () => hideModal('updateCategory'));
            window.livewire.on('addUser', () => hideModal('addUser'));
            window.livewire.on('updateUser', () => hideModal('updateUser'));
            window.livewire.on('addTask', () => hideModal('addTask'));
            window.livewire.on('updateTask', () => hideModal('updateTask'));
            window.livewire.on('addAdmin', () => hideModal('addAdmin'));
            window.livewire.on('TaskDetails', () => hideModal('TaskDetails'));
            window.livewire.on('userTaskDetails', () => hideModal('userTaskDetails'));
        }
    });
      window.livewire.on('TaskDetails', () => {
        $('#TaskDetails').modal('show');
    });
     window.livewire.on('userTaskDetails', () => {
        $('#userTaskDetails').modal('show');
    });
    document.addEventListener('livewire:load', function () {
        window.livewire.on('showTaskDetailsModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('TaskDetails'));
            modal.show();
        });
    });
 document.addEventListener('livewire:load', function () {
        window.livewire.on('showTaskDetailsModal', () => {
            const modal = new bootstrap.Modal(document.getElementById('userTaskDetails'));
            modal.show();
        });
    });

</script>

  
      
</body>
</html>
       
