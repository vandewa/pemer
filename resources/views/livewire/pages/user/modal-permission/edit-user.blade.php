<div wire:ignore.self class="modal fade" id="editModalPermissionUser" tabindex="-1" aria-labelledby="editModalPermissionUserLabel" aria-hidden="true">
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
                <div wire:ignore>
                    {!! Form::select('permission_user', get_permission_user(), null, [
                    'id' => 'permission_user',
                    'multiple' => 'multiple',
                    'class' => 'form-control permission_user',
                    'wire:model.lazy' => 'permission_user',
                    ]) !!}
                </div>
                <select multiple data-role="tagsinput">
                    <option value="Amsterdam">Amsterdam</option>
                    <option value="Washington">Washington</option>
                    <option value="Sydney">Sydney</option>
                    <option value="Beijing">Beijing</option>
                    <option value="Cairo">Cairo</option>
                </select>
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
        console.log(data.name);
    })
    $(document).ready(function() {
        window.addEventListener('select2untukroleuser', event => {
            $('.permission_user').select2();

            $('#permission_user').on('change', function(e) {
                var data = $('#permission_user').select2("val");
                @this.set('permission_user', data);
            });
        });
    });
</script>
<script src="{{ asset('snacked/ltr/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
@endpush