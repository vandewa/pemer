<div wire:ignore.self class="modal fade" id="editModalPermissionUser" tabindex="-1" aria-labelledby="editModalPermissionUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Role Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="id" wire:model.lazy="id_user">
                <label class="col-lg-4 col-form-label">Nama Role :</label>
                <input type="text" class="form-control" id="name" wire:model.lazy="name">
                <label class="col-lg-4 col-form-label">Role Permission :</label>
                <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple">
                    <option value="United States" selected>United States</option>
                    <option value="United Kingdom" selected>United Kingdom</option>
                    <option value="Afghanistan" selected>Afghanistan</option>
                    <option value="Aland Islands">Aland Islands</option>
                    <option value="Albania">Albania</option>
                </select>
            </div>
            {{ $permission_user}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    window.addEventListener('data', event => {
        var data = event.detail.data;
        $('#name').val(data.name);
        $('#id').val(data.id);
        console.log(data.name);
    });
    window.addEventListener('permission_user', event => {
        var data2 = event.detail.permission_user;
        $('#permission_user2').val(data2);
        console.log(data2);
    });
    $(document).ready(function() {
        // Initialize Select2 inside the modal
        $('#editModalPermissionUser').on('shown.bs.modal', function() {
            $('.multiple-select').select2({
                placeholder: 'Choose anything'
                , multiple: true
            });
        });
    });
</script>
<link href="{{ asset('snacked/ltr/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('snacked/ltr/assets/plugins/select2/js/select2.min.js') }}"></script>
@endpush
