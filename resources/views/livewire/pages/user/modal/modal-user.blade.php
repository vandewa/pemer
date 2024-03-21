<div wire:ignore.self class="modal fade" id="show-view-modal-user" tabindex="-1" aria-labelledby="show-view-modal-user" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="col-lg-4 col-form-label">Nama :</label>
                <input type="text" class="form-control" id="name" wire:model.lazy="name" placeholder="Nama">
                <label class="col-lg-4 col-form-label">Email :</label>
                <input type="email" class="form-control" id="email" wire:model.lazy="email" placeholder="Email">
                <label class="form-label">Lembaga :</label>
                {!! Form::select('id', get_instansi(), null, ['class'=> 'form-control',
                'placeholder' => 'Pilih Lembaga', 'wire:model.lazy' => 'instansi_id']); !!}
                <label class="form-label">No Handphone :</label>
                <input type="text" class="form-control" wire:model.lazy="no_hp" placeholder="Masukan Nomor Handphone">
                <label class="form-label">Password :</label>
                <input placeholder="Password" id="flogin_password" type="text" wire:model.lazy="password" class="form-control">
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
    window.addEventListener('kirim_id', event => {
        var terima_id = event.detail.kirim_id;
        Livewire.emitTo('pages.user.modal.modal-user', 'triggerEvent', {
            tampung_id: terima_id
        });
    });
</script>
@endpush
