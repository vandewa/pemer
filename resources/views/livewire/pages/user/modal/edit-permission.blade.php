<div wire:ignore.self class="modal fade" id="edit-permission" tabindex="-1" aria-labelledby="edit-permission" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="col-lg-4 col-form-label">Nama Permission :</label>
                <input type="text" class="form-control" id="name" wire:model.lazy="name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="simpan_p" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    window.addEventListener('kirim_id', event => {
        var terima_id = event.detail.kirim_id;
        Livewire.emitTo('pages.user.modal.edit-permission', 'triggerEvent', {
            tampung_id: terima_id
        });
    });
</script>
@endpush