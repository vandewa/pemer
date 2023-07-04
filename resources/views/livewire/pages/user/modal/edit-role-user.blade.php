@push('css')
    <style>
        .abc {
            color: black;
        }
    </style>
@endpush
<div wire:ignore.self class="modal fade" id="edit-role-user" tabindex="-1" aria-labelledby="edit-role-user"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Role Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="col-lg-4 col-form-label">Nama Role :</label>
                <input type="text" class="form-control" id="name" wire:model.lazy="name">
                <label class="col-lg-4 col-form-label">Role Permission :</label>
                <div wire:ignore class="abc">
                    {!! Form::select('permission_user', get_permission_user(), null, [
                        'id' => 'permission_user',
                        'multiple' => 'multiple',
                        'class' => 'form-control multiple-select permission_user',
                        'wire:model.lazy' => 'permission_user',
                        'style' => 'width: 100%;',
                    ]) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('user_id', event => {
            var user_id = event.detail.user_id;
            Livewire.emitTo('pages.user.modal.edit-role-user', 'triggerEvent', {
                data: user_id
            });
        });
        $(document).ready(function() {
            $('.permission_user').select2({
                dropdownParent: $('#edit-role-user')
            });

            $('#permission_user').on('change', function(e) {
                var data = $('#permission_user').select2("val");
                @this.set('permission_user', data);
            });
        });
        window.addEventListener('select2untukroleuser', event => {
            $('.permission_user').select2({
                dropdownParent: $('#edit-role-user')
            });
        });
    </script>
    <!-- CSS -->
    <link href="{{ asset('snacked/ltr/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('snacked/ltr/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <script src="{{ asset('snacked/ltr/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('snacked/ltr/assets/js/form-select2.js') }}"></script>
@endpush
