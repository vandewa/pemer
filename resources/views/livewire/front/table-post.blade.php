@push('css')
<!--plugins-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush
<div>
    @if($posts)
    <table class="table table-striped" id="example">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th>Judul</th>
                <th style="width: 10%;">File</th>
            </tr>
        </thead>
        <tbody>
            @php
            $a = 1;
            @endphp
            @foreach ($posts as $item)
            <tr>
                <th scope="row">{{ $a++ }}</th>
                <td>{{ $item->judul }}</td>
                <td><a href="javascript:;" class="btn btn-sm btn-info" wire:click="$emit('showPostFile', {{ $item->id}})">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@push('script')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    new DataTable('#example');

</script>
@endpush
