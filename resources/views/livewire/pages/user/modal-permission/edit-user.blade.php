<div wire:ignore.self class="modal fade" id="editModalPermissionUser" tabindex="-1" aria-labelledby="editModalPermissionUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"><input type="text" class="form-control" id="name" wire:model.lazy="name"></div>
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

</script>
@endpush
