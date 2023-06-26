<div>
    <button type="button" wire:click="$emit('openModal')">Buka Modal</button>

    <div x-data="{ open: @entangle('modalOpen') }" x-show="open" @keydown.escape.window="open = false">
        <div>
            <h2>Pilih Item</h2>
            <select multiple wire:model="selectedItems" id="select2" style="width: 100%;">
                <option value="1">Item 1</option>
                <option value="2">Item 2</option>
                <option value="3">Item 3</option>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
            <button type="button" wire:click="saveItems">Simpan</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        $('#select2').select2();

        Livewire.on('openModal', function() {
            $('#select2').val([]).trigger('change');
            $('.select2-container').css('width', '100%');

            $('#select2').on('change', function(e) {
                var data = $(this).val();
                @this.set('selectedItems', data);
            });

            $('#select2').select2('open');
        });
    });
</script>