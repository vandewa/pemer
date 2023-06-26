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

                <div wire:ignore>
                    {!! Form::select('permission_user', get_permission_user(), null, [
                    'id' => 'permission_user',
                    'multiple' => 'multiple',
                    'class' => 'multiple-select permission_user',
                    'data-dropdown-parent' => '#editModalPermissionUser',
                    'style' => 'width: 100%;',
                    'wire:model.lazy' => 'permission_user',
                    ]) !!}
                </div>

            </div>
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
        window.addEventListener('select2untukroleuser', event => {
            $('.multiple-select permission_user').select2();

            $('#permission_user').on('change', function(e) {
                var data = $('#permission_user').select2("val");
                @this.set('permission_user', data);
            });
        });

    });
</script>
<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

@endpush