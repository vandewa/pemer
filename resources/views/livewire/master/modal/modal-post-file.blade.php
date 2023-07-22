<div>
    <div id="modal_title_basic" class="modal fade @if($isShow) show @endif" @if($isShow) style="display: block;" @else style="display: none;" aria-hidden="true" @endif tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="font-weight-semibold modal-title">Lihat PDF</span>
                    <button type="button" class="close" data-dismiss="modal" wire:click='showPostFile'>&times;</button>
                </div>

                <div class="modal-body">
                    <embed src="{{ route('helper.show-picture', ['path' => $path_file]) }}" class="col-12" height="600px" />
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-warning" data-dismiss="modal" wire:click='showPostFile'>Close</button>
                </div>
            </div>
        </div>
    </div>
</div>