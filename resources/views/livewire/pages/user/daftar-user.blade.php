<div>
    <main class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">Data User</div>
        <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="p-0 mb-0 breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">List Data User</li>
            </ol>
        </nav>
        </div>
    </div>
    <div class="mt-4 mb-3">
        <a href="{{ route('user') }}"><button class="px-5 btn btn-primary radius-30"><i class="mr-1 bx bx-plus-circle"></i>Add Data</button></a>
  </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center">
          </div>
          <livewire:pages.user.list-user />
        </div>
      </div>
    </main>
</div>