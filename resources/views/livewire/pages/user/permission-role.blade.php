<div>
    <main class="page-content">
        <!--breadcrumb-->
        <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
            <div class="breadcrumb-title pe-3">Permission Role User</div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-6 d-flex">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0">User</h6>
                        </div>
                        <livewire:pages.user.permission-user-list />
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-6 d-flex">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <h6 class="mb-0">Permission</h6>
                        </div>
                        <livewire:pages.user.permission-role-list />
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('livewire.pages.user.modal-permission.edit-user')
    @include('livewire.pages.user.modal-permission.edit-permission')
</div>
@push('script')
<script>
    window.addEventListener('show-modal-permission-user', event => {
        $('#editModalPermissionUser').modal('show');
    });
    Livewire.on('close-modal', event => {
        $('#editModal').modal('hide')
    })

</script>
@endpush
