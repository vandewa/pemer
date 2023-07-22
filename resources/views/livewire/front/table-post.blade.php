<div>
    @if($posts)
    <table class="table table-striped table-bordered" id="example">
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