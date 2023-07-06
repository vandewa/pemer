 <div wire:ignore.self class="modal fade" id="viewModalSuratStudiKelayakan" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Informasi Detail</h5>
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             </div>
             <div class="modal-body">
                 <div>
                     <embed src="{{ route('helper.show-picture', ['path' => $path_file]) }}" class="col-12" height="600px" />
                 </div>
             </div>
         </div>
     </div>
 </div>
 @push('script')
 <script>
     window.addEventListener('path_surat_studi_kak', event => {
         var data = event.detail.path_surat_studi_kak;
         Livewire.emitTo('pages.permohonan.modal.show-surat-studi-kelayakan', 'SuratStudiKelayakanEvent', {
             tampung_id: data
         });
     });
 </script>
 @endpush